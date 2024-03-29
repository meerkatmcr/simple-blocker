<?php

namespace MeerkatMcr\SimpleBlocker\Middleware;

use Closure;

class CheckUserBlocked
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
        $u = $request->user();
        if ($u && $u->isBlocked()) {
            abort(403, config('simple-blocker.message'));
        }
        return $next($request);
    }
}
