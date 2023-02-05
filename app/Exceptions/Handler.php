<?php

namespace Azuriom\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\ViewErrorBag;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
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
        //
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
        } catch (Throwable) {
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
        } catch (Throwable) {
            // Even the fallback rendering failed, we will just render with Symfony
            return $this->convertExceptionToResponse($e);
        }
    }
}
