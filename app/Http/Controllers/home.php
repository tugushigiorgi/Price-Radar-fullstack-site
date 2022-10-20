<?php

namespace App\Http\Controllers;

use App\Models\item_favourites;
use App\Models\User;
use App\scraping\current_data;
use App\scraping\fetcher;
use App\scraping\item_modal;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class home extends Controller
{

function delete_all_item()
{
    $value = session('logged');
    $user = User::where("id", "=", $value)->first();
    $databas = DB::table("item_favourites")
        ->join('users', 'users.id', '=', 'item_favourites.user_id')
        ->select('item_favourites.*')
        ->where('user_id', '=', $value)
        ->get();

    item_favourites::where('user_id', session('logged'))->delete();
 return Response::json(["data"=>$databas]);




}









    function delete_item($id){

        item_favourites::where('id', $id)->delete() ;




        return Response::json(["succes"=>$id]);

    }




function  main(){


    $obj = new fetcher();

    $obj->fetch_mobile_category();
    $data = $obj->maindata;
    foreach ($data  as $item) {
        $check = item_favourites::where("detailed_link", "=", $item->getDetailedLink())->first();

        if ($check ) {
            $item->setIsSaved(true);

        }

    }

    session()->put('data',  $data);


    return view('home', ["data" => $data]);




    }






function save( $id){

   $value= session('logged');

    $tab=new item_favourites;





    $data=session('data');

    foreach ($data as $item){
        if((int)$item->getId()==(int)$id){




            $tab->title=$item->getTitle();
            $tab->image=$item->getImage();
            $tab->price=$item ->getPrice();
            $tab->user_id= $value;
            $tab->website_picture=$item->getWebsitePicture();
            $tab->detailed_link=$item->getDetailedLink();

            $tab->save();





            return    Response::json(["succes"=>"წარმატებით დაემატა ფავორიტებში"]);
        }


    }





    return    Response::json(["error"=>"დაფიქსირდა შეცდომა"]);

}

function category(String $req){
    if($req=="mobile"){

        $obj = new fetcher();

        $obj->fetch_mobile_category();
        $data = $obj->maindata;
        $current=$obj->maindata;
        foreach ($data  as $item) {
            $check = item_favourites::where("detailed_link", "=", $item->getDetailedLink())->first();

            if ($check ) {
                $item->setIsSaved(true);

            }

        }
        session()->put('data',  $data);
        return view('home',["data"=>$data]);
    }
    if($req=="laptop"){



        $obj = new fetcher();

        $obj->fetch_laptops_category();
        $data = $obj->maindata;
        foreach ($data  as $item) {
            $check = item_favourites::where("detailed_link", "=", $item->getDetailedLink())->first();

            if ($check ) {
                $item->setIsSaved(true);

            }

        }
        session()->put('data',  $data);
        return view('home',["data"=>$data]);

    }
    if($req=="tv"){


        $obj = new fetcher();

        $obj->fetch_tv_category();
        $data = $obj->maindata;
        foreach ($data  as $item) {
            $check = item_favourites::where("detailed_link", "=", $item->getDetailedLink())->first();

            if ($check ) {
                $item->setIsSaved(true);

            }

        }
        session()->put('data',  $data);
        return view('home',["data"=>$data]);
    }

    $data=[];
    return view('home',["data"=>$data]);




}


function search ( Request $request){


$inputed_data=$request->get("search_input");
if($inputed_data!=null){




    $obj = new fetcher();

    $obj->fetch_with_search($inputed_data);
    $data = $obj->maindata;
    foreach ($data  as $item) {
        $check = item_favourites::where("detailed_link", "=", $item->getDetailedLink())->first();

        if ($check ) {
            $item->setIsSaved(true);

        }

    }
    session()->put('data',  $data);
}
else{
    $data =[];
}

    return view('home',["data"=>$data]);
}

}
