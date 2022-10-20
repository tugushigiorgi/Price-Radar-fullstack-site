<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class register extends Controller
{





    function main(){

        return view('register');

    }






    function register(Request $request){

        $data=$request->validate(
            ['email'=>"required|email " ,
                 'name'=>['required','min:3'],
                 'password'=>['required','min:6' ]


            ]  );


              $usr=new User;
          $usr->name=$request->get("name");
          $usr->email=$request->get("email");
           $usr->password = Hash::make( $request->get("password")) ;

        $ans=$usr->save();

        if($ans ){

            return redirect('/')->with("success",'რეგისტრაცია წარმატებით დასრულდა , გაიარეთ ავტორიზაცია ');
        }
        else{
            return back()->with('error','რეგისტრაციისას წარმოიშვა პრობლემა ');

        }

















    }








}
