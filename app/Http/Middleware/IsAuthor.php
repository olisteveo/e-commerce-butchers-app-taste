<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;

class IsAuthor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $is_author = (auth()->user() && in_array(auth()->user()->roles_id, [Role::AUTHOR_ROLE, Role::SITE_ADMIN_ROLE]));
        if(!$is_author) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()
                    ->back()
                    ->with('message', '<div style="background-color: #eddad4; padding: 10px; border-radius: 10px;">Unauthorized!</div>'); // @todo redirect back with an unauthorized access session message
            }
        }
        return $next($request);
    }
}
