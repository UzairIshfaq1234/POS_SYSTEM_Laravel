<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



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
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // public function render($request, Throwable $exception)
    // {

    //     //when a model doesnt exist or not found
    //     // Handle ModelNotFoundException (e.g., 404 Not Found)

    //     if ($exception instanceof ModelNotFoundException) {

    //         $Page = "POS-DATABASE ERROR";
    //         $Error = "DATA BASE MODEL ! PLEASE CONTACT DEVELOPER";

    //         return response()->view('Error_Pages.Error_500_Page', compact('Page', 'Error'), 500);
    //     }


    //     // Handle database connection error (e.g., target machine actively refused it)
    //     if ($exception instanceof QueryException) {

    //         $Page = "POS-DATABASE ERROR";
    //         $Error = "DATA BASE APCHE ERROR ! PLEASE CONTACT DEVELOPER";

    //         return response()->view('Error_Pages.Error_500_Page', compact('Page', 'Error'), 500);
    //     }


    //     // Handle NotFoundHttpException (e.g., 404 Not Found)
    //     if ($exception instanceof NotFoundHttpException) {

    //         $Page = "POS-DATABASE ERROR";
    //         $Error = "DATA BASE QUERY ERROR ! PLEASE CONTACT DEVELOPER";

    //         return response()->view('Error_Pages.Error_500_Page', compact('Page', 'Error'), 500);
    //     }


    //     return parent::render($request, $exception);
    // }
}
