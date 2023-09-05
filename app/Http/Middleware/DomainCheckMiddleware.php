<?php

namespace App\Http\Middleware;

use App\Models\Institution;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class DomainCheckMiddleware
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


        $currentUrl = str_replace('www.','',$_SERVER['HTTP_HOST']);
        // dd($currentUrl);

        $institute = Institution::where('domain',$currentUrl)->first();

        if($institute){
            if(@Auth::user()->institute->domain != $institute->domain )
            {
                Session::flush();
                Auth::logout();
                //notification
                $notification = array(
                    'message' =>'You are not authorized',
                    'alert-type' =>'warning'
                );
                return redirect()->back()->with($notification);
            }else{
                return $next($request);
            }
        }
        else{
            Session::flush();
            Auth::logout();
            return redirect()->route('pay-now');
        }

        // return $next($request);


    }
}
