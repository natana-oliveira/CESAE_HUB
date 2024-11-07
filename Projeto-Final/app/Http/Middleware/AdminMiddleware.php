<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Verifica se o usuário está autenticado e é um formador
        if (Auth::check() && Auth::user()->user_type === 1) {
            return $next($request);
        }

        // Se não for um formador, redirecione para a página inicial ou retorne uma resposta de erro
        return redirect()->route('home');
    }
}
