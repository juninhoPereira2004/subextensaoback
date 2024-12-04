<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Illuminate\Http\Request;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            // Verifica e autentica o token
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return response()->json(['message' => 'Token inválido'], 401);
            } elseif ($e instanceof TokenExpiredException) {
                return response()->json(['message' => 'Token expirado'], 401);
            } else {
                return response()->json(['message' => 'Token de autorização não encontrado'], 401);
            }
        }

        return $next($request);
    }
}
