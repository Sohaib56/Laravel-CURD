<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    public function handle($request, Closure $next, $permission)
    {
        // dd('here');
        if (Auth::check() && Auth::user()->hasPermissionTo($permission)) {
            return $next($request);
        }

        // User does not have the required permission, handle accordingly.
        return abort(403, 'Unauthorized action.');
    }
}
