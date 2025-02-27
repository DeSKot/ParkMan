<?php

namespace App\Exceptions;

use App\Exceptions\Garage\NotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use \App\Trait\Response;

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
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e): JsonResponse
    {
        switch (true) {
            case $e instanceof NotFoundHttpException:
                return $this->generateResponse(
                    'Route not found',
                    false,
                    Response::HTTP_NOT_FOUND
                );
            case $e instanceof ValidationException:
                return $this->generateResponse(
                    config('app.debug') ? $e->getMessage() . ' in file ' . $e->getFile() . ' line ' . $e->getLine() : 'Server error',
                    false,
                    Response::HTTP_UNPROCESSABLE_ENTITY,
                );
            case $e instanceof NotFoundException:
                return $this->generateResponse(
                    config('app.debug') ? $e->getMessage() . ' in file ' . $e->getFile() . ' line ' . $e->getLine() : 'Server error',
                    false,
                    Response::HTTP_NOT_FOUND
                );
            // no break
            default:
                $message = $e->getMessage() . ' in file ' . $e->getFile() . ' : ' . $e->getLine();
                Log::alert($message);
                return $this->generateResponse(
                    config('app.debug') ? $e->getMessage() . ' in file ' . $e->getFile() . ' line ' . $e->getLine() : 'Server error',
                    false,
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
        }
    }
}
