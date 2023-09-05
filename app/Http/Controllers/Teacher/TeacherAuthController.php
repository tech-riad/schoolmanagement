<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

use App\Helper\Helper;
use App\Models\TeacherUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAuthController extends Controller
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
        }
        else{
            $user = TeacherUser::where('id_no',$idNo)->first();
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

                    if(Auth::guard('teacher')->attempt(['id_no' => $idNo, 'password' => $request->password])){
                        return redirect('/teacherpanel');
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
