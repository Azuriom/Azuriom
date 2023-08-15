<?php

namespace Azuriom\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\ViewErrorBag;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface as HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        //
    }

    /**
     * Render the given HttpException.
     */
    protected function renderHttpException(HttpException $e): Response
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

    protected function fallbackRenderHttpException(HttpException $e): Response
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
