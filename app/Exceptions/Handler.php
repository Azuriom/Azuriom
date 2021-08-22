<?php

namespace Azuriom\Exceptions;

use Azuriom\Azuriom;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ViewErrorBag;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Exception $e) {
            $this->reportException($e);
        });
    }

    /**
     * Render the given HttpException.
     *
     * @param  \Symfony\Component\HttpKernel\Exception\HttpExceptionInterface  $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderHttpException(HttpExceptionInterface $e)
    {
        try {
            // Try to render the error view with the current theme.
            // Should work for most errors, but can fail for errors 500
            // caused by a database problem, and it will fail to get
            // the current user, and will fail so render the view.
            // In this case, the catch will render a simple error page
            // without any database interactions or complex mechanics

            $this->registerErrorViewPaths();

            if (view()->exists($view = "errors::{$e->getStatusCode()}")) {
                return response()->view($view, [
                    'errors' => new ViewErrorBag(),
                    'exception' => $e,
                ], $e->getStatusCode(), $e->getHeaders());
            }
        } catch (Throwable $t) {
            //
        }

        return $this->fallbackRenderHttpException($e);
    }

    /**
     * Fallback the render the given HttpException.
     *
     * @param  \Symfony\Component\HttpKernel\Exception\HttpExceptionInterface  $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function fallbackRenderHttpException(HttpExceptionInterface $e)
    {
        try {
            return response()->view('errors::fallback', [
                'errors' => new ViewErrorBag(),
                'exception' => $e,
                'code' => $e->getStatusCode(),
            ], $e->getStatusCode(), $e->getHeaders());
        } catch (Throwable $t) {
            // Even the fallback rendering failed, we will just render with Symfony
            return $this->convertExceptionToResponse($e);
        }
    }

    /**
     * Report the exception to Azuriom to provide quick fix of errors.
     *
     * @param  \Throwable  $exception
     */
    protected function reportException(Throwable $exception)
    {
        if (config('app.debug') || app()->runningInConsole()) {
            return;
        }

        try {
            if (RateLimiter::tooManyAttempts('errors', 1)) {
                return;
            }

            RateLimiter::hit('errors');

            $data = [
                'version' => Azuriom::version(),
                'php_version' => PHP_VERSION,
                'url' => request()->url(),
                'method' => request()->method(),
                'exceptions' => $this->getExceptionReport($exception),
            ];

            Http::post('https://market.azuriom.com/api/errors/report', $data);
        } catch (Throwable $t) {
            //
        }
    }

    protected function getExceptionReport(Throwable $exception)
    {
        $exceptions = collect([]);

        do {
            $exceptions->push([
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'trace' => $exception->getTraceAsString(),
                'class' => get_class($exception),
            ]);
        } while ($exception = $exception->getPrevious());

        return $exceptions;
    }
}
