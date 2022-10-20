<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class login extends Controller
{
function password_reset_page(){

    return view('reset');

}

function delete_acc(){

    $user = User::find(session("logged"));
    $user->delete();
    session()->flush();
    return redirect('/')->with("success","მომხმარებლის პროფილი წაიშალა წარმატებით");

}



    function password_reset(Request $request)
    {
        $current_user_id = session('logged');
        $usr = User::where("id", "=", $current_user_id)->first();
        $data = $request->validate(['old_password'
        => ['required', 'min:6'],
            'new_password'
            => ['required', 'min:6'],

        ]);


        if (!Hash::check( $request->get('old_password'),$usr->password)) {

            return redirect()->back()->with("reset_fail", "შეყვანილი მიმდინარე პაროლი არასწორია ! ");
        }


          elseif (Hash::check($request->get('new_password'),$usr->password )) {

                return redirect()->back()->with("reset_fail", "შეიყვანეთ ძველისგან განსხავებული პაროლი");
            }
            else{

                    $usr->password = Hash::make($request->new_password);
                    $usr->update();
                    return redirect('/')->with('success', "პაროლი წარმატებით განახლდა");
                }
            }







    function logout(Request $request){

        $request->session()->flush();
    return redirect('/login');
    }


    function main(){


        return view('login');
    }

    function login(Request $request){

        $data=$request->validate(
           [
               'email'=>['required'],
               'password'=>['required']
           ] );

        $usr_check=User::where("email","=",$request->email )->first();


        if( $usr_check){

            if( Hash::check($request->get("password"),$usr_check->password)){
                  $request->session()->put('logged',$usr_check->id);
                return redirect('/');
            }if(!Hash::check($request->get('password'),$usr_check->password))
            {
                return back()->with('login_fail',"პაროლი არასწორია");
            }






        }
        else{

            return back()->with('login_fail',"მომხმარებელი ვერ მოიძებნა");




        }




            return redirect('/');








    }




}
