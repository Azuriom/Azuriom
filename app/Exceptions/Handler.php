<?php

namespace Azuriom\Exceptions;

use Azuriom\Azuriom;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);

        $this->reportException($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
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
     * @param  Exception  $exception
     */
    protected function reportException(Exception $exception)
    {
        if (! config('app.debug')) {
            return;
        }

        try {
            $exceptions = collect([]);

            $ex = $exception;

            do {
                $exceptions->push([
                    'message' => $ex->getMessage(),
                    'file' => $ex->getFile(),
                    'line' => $ex->getLine(),
                    'trace' => $ex->getTraceAsString()
                ]);
            } while (($ex = $ex->getPrevious()));

            $data = json_encode([
                'version' => Azuriom::version(),
                'php' => phpversion(),
                'request' => [
                    'url' => request()->url(),
                    'method' => request()->method(),
                ],
                'exceptions' => $exceptions,
            ]);

            $client = new \GuzzleHttp\Client(['timeout' => 5]);

            $client->post('https://azuriom.com/api/errors/report', ['body' => $data,]);
        } catch (Throwable $t) {
            //
        }
    }
}
