<?php

namespace App\Http\Controllers\Student;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\StudentUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAuthController extends Controller
{
    public function login(Request $request){

        $idNo = $request->id_no;
        $admin = User::where('email',$request->id_no)->first();

        if($admin){

            if(Auth::attempt(['email' => $idNo, 'password' => $request->password])){
                return redirect('/dashboard');
            }
            else{
                $notification = array(
                    'message' =>'Password Not matched!',
                    'alert-type' =>'error'
                );
                return redirect()->back()->with($notification);
            }

        }else{
            $user = StudentUser::where('id_no',$idNo)->first();
            if(!$user){

                $notification = array(
                    'message' =>'User Not Found!',
                    'alert-type' =>'error'
                );
                return redirect()->back()->with($notification);
            }
            else{

                if($user->institute_id != Helper::getInstituteId()){
                    $notification = array(
                        'message' =>'You Are Not Authorize!',
                        'alert-type' =>'warning'
                    );
                    return redirect()->back()->with($notification);
                }
                else{

                    if(Auth::guard('student')->attempt(['id_no' => $idNo, 'password' => $request->password])){
                        return redirect('/student-portal');
                    }
                    else{
                        $notification = array(
                            'message' =>'Password Not matched!',
                            'alert-type' =>'error'
                        );
                        return redirect()->back()->with($notification);
                    }
                }
            }
        }

    }
}
