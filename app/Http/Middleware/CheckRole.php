<?php

namespace App\Http\Middleware;

use Closure;
  use App\User;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

$roles= explode("|", $role);

        if( $role != null) {
            if (!$request->user()-> hasAnyRole( $roles)) {
                abort(403);
            }
        }
return $next($request);

    }
}
