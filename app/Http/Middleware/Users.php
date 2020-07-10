<?php

namespace App\Http\Middleware;

use Closure;

class Users
{
    /**
     * @var \App\Users $users
     */
    public static $userSession;

    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists(\Config::get('web.session'))) {
            $users = $request->cookie(\Config::get('web.cookie'));
            if($users != null && $users->id > 0){
                $users = \App\Users::find($users->id);
                if(!$users) {
                    return redirect('/');
                }
                session([\Config::get('web.session') => $users ]);
            } else {
                return $next($request);
            }
        }

        Users::$userSession = $request->session()->get(\Config::get('web.session'));
        return $next($request);

    }
}
