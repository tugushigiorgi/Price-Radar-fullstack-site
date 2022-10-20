<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class profile extends Controller
{



    function main(Request $request){

        $value= session('logged');
        $user=User::where("id","=",$value)->first();
        $databas=DB::table("item_favourites")
            ->join('users','users.id','=','item_favourites.user_id')
            ->select('item_favourites.*')
            ->where('user_id','=', $value)
            ->get();



        return view('userprofile',["user"=>$user,"data"=>$databas]);




    }
}
