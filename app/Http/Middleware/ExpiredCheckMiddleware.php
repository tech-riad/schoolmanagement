<?php

namespace App\Http\Middleware;

use App\Models\Institution;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExpiredCheckMiddleware
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
        if(@$_SERVER['HTTP_HOST']){
            $currentUrl = str_replace('www.','',$_SERVER['HTTP_HOST']);
        }else{
            $currentUrl='127.0.0.1:8000';
        }
        $exist = Institution::where('domain', $currentUrl)->first();



        if (!empty($exist)) {

            if ($exist->status != 'active') {
                $msg = "YOUR APPLICATION IS UNDER REVIEW<br>
                        Please be with us, we will get back soon
                        (Please Contact with Administrator)";
                // Session::flash('message', $msg);
                return redirect()->route('under-review');
            }




                $today   = date('Y-m-d');
                $expire_date = Institution::where('domain', $currentUrl)->selectRaw('GREATEST(`expire_date`,`trial_period_end`) as expire')->first();


                if($expire_date->expire > $today){

                    return $next($request);
                }
                else{
                    $msg = "YOUR PAYMENT DATE IS EXPIRED<br>
                            Please pay as soon as possible to continue your website & application";
                    // Session::flash('message', $msg);
                    return redirect()->route('expired');
                }



        } else {
            $msg = "Your Domain Not Found";
            Session::flash('message', $msg);
            return redirect()->route('expired');
        }
    }
}
