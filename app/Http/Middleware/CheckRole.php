<?php

namespace App\Http\Middleware;

use App\Models\Resource;
use App\Utils\AuthWrapper;
use App\Utils\Globals\AppGlobal;
use Closure;
use Illuminate\Support\Facades\Route;

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
        $user = null;
        $actions = null;
        $roles = null;
        $errorAjaxResponse = ['success'=>false,'error'=>true,'errorCode'=>402,'message'=>''];

        if(AuthWrapper::check()){
            $user = AuthWrapper::loggedInUser();
            $actions = $request->route()->getName();
            $roles = $user->roles;
            $resource = Resource::where('route', $actions)->first();

            if (!$resource) {
                return $next($request);
            }else {
                foreach ($roles as $role) {
                    if ($role->id == AppGlobal::SUPER_ADMIN) {
                        return $next($request);
                    } else {
                        if ($role->hasAnyResource($actions)) {
                            return $next($request);
                        }
                    }
                }
            }
        }else{
            if($request->ajax()){
                return response($errorAjaxResponse);
            }
            return redirect()->route('error', 401);
        }
        if($request->ajax()){
            return response($errorAjaxResponse);
        }
        return redirect()->route('error', 401);
    }
}
