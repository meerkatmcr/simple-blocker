<?php

namespace MeerkatMcr\SimpleBlocker\Middleware;

use Closure;
use MeerkatMcr\SimpleBlocker\Traits\Blockable;

class CheckUnblocked
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
        if ($request->user()->isBlocked()) {
            abort(403, config('simple-blocker.message'));
        }
        return $next($request);
    }
}
