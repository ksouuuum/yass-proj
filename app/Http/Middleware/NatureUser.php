<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NatureUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response    
    {
        if ($request->user()->groupe->lib == $role) {
            return $next($request);
        }
        return redirect(route('lressource'))->with('success', 'Vous n avez pas assez de droit pour realiser cette action');

    }
}
