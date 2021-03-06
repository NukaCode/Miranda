<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
        ModelNotFoundException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception               $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        // Send the response in json for ajax requests.
        if ($request->ajax()) {
            $error = $e->getMessage() . ' on ' . $e->getLine() . ' of ' . $e->getFile();

            return response()->json(['error' => $error], 500);
        }

        // Is in debug mode, show the full whoops page.
        if (config('app.debug')) {
            return $this->renderExceptionWithWhoops($e);
        }

        // Try to send the error to a custom view page.
        $code = $e->getCode();
        if (view()->exists("errors.{$code}")) {
            return response()->view("errors.{$code}", [], $code);
        }

        // If its an HTTP exception it will have a status code.
        //  Use that status code to render a custom view.
        if ($this->isHttpException($e)) {
            $code = $e->getStatusCode();
            if (view()->exists("errors.{$code}")) {
                return response()->view("errors.{$code}", [], $code);
            }

            return $this->renderHttpException($e);
        }

        // Render it with the default laravel settings.
        return parent::render($request, $e);
    }

    /**
     * Render an exception using Whoops.
     *
     * @param  \Exception $e
     *
     * @return Response
     */
    protected function renderExceptionWithWhoops(Exception $e)
    {
        $whoops = new Run;
        $whoops->pushHandler(new PrettyPageHandler());

        return new Response(
            $whoops->handleException($e),
            $e->getStatusCode(),
            $e->getHeaders()
        );
    }
}
