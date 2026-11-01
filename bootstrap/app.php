<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Database\QueryException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [\App\Http\Middleware\SecurityHeaders::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (AccessDeniedHttpException $exception, Request $request) {
            return response()->view('errors.403', [], 403);
        });

        $exceptions->render(function (NotFoundHttpException $exception, Request $request) {
            return response()->view('errors.404', [], 404);
        });

        $exceptions->render(function (RouteNotFoundException $exception, Request $request) {
            return response()->view('errors.404', [], 404);
        });

        $exceptions->render(function (TokenMismatchException $exception, Request $request) {
            return response()->view('errors.419', [], 419);
        });

        // Garde le vrai code HTTP (429 trop de requêtes, 405…) au lieu de tout transformer en 500
        $exceptions->render(function (HttpException $exception, Request $request) {
            $code = $exception->getStatusCode();
            $vue = view()->exists("errors.$code") ? "errors.$code" : 'errors.500';

            return response()->view($vue, [], $code, $exception->getHeaders());
        });

        $exceptions->render(function (ServiceUnavailableHttpException $exception, Request $request) {
            return response()->view('errors.503', [], 503);
        });

        $exceptions->render(function (QueryException $exception, Request $request) {
            if ($exception->getCode() === '23000') {
                return response()->view('errors.404', [], 400);
            } elseif ($exception->getCode() === 'HY000') {
                return response()->view('errors.504', [], 504);
            } else {
                return response()->view('errors.500', [], 500);
            }
        });
        $exceptions->render(function (\ErrorException $exception, Request $request) { 
            if (strpos($exception->getMessage(), 'Undefined variable') !== false) { 
                return response()->view('errors.500', ['error' => 'Variable non définie : ' . $exception->getMessage()], 500); } 
                return response()->view('errors.500', [], 500); });
    })->create();
