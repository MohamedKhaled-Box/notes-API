<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

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
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return response()->json([
                'errors' => $exception->errors(),
                'message' => $exception->getMessage()
            ], 422);
        }

        if ($exception instanceof HttpResponseException) {
            return $exception->getResponse();
        }

        if ($exception instanceof ModelNotFoundException) {
            return response()->json(['message' => 'Resource not found'], 404);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->json(['message' => 'Endpoint not found'], 404);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json(['message' => 'Method not allowed'], 405);
        }

        if ($exception instanceof QueryException) {
            // Handle SQL exceptions such as unique constraint violations
            if ($exception->errorInfo[1] == 1062) {
                return response()->json([
                    'message' => 'Duplicate entry detected'
                ], 409);
            }
        }

        return parent::render($request, $exception);
    }
}
