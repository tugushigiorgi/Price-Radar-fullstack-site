<!DOCTYPE html>
<html lang="en">
<head>
    @stack('css')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    body {
        overflow-x: hidden;
    }

</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link  href="./css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />



</head>

<body>

@if(session()->has("logged"))

<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <a href="/"> <label class="logo">Product Radar</label></a>
    <ul>



        <li><a  href="/" class="nav_a"   >Home</a></li>
        <li><a href="/profile" class="nav_a" id="activation" >Profile</a></li>

        <li><a href="/logout" class="nav_a">Log out</a></li>

    </ul>
</nav>
<main style="margin: 10px">

    <div id="Profile_info_wrapper">
        <ul>
                     <span class="material-symbols-outlined" id="profile_photo_avatar">
                      account_box
                            </span>
            <center>


                <li class="profile_info_li" style="color: white; font-weight: bold; margin-bottom: 10px;">{{$user->name}} </li>

                <li class="profile_info_li" ><a href="/reset" class="profile_info_btn_change" id="btn_change">Change password</a></li>
                <li class="profile_info_li"> <a   class="profile_info_btn_delete"  id="btn_delete"  href="/userdelete">Delete account</a></li>

            </center>
        </ul>
    </div>





    <div class="user_favourite_container">
        <center> <span style="font-size: 45px; color:white;  ">შენახული პროდუქტები  </span><br>


        </center>

        <div class="container_listview">

            <div class="list_view">




                @if(count($data)!=0)
                    <center>
                         <button id="btn_delete_all" class="delete_all_btn" onclick="deleteall()"  >ყველას წაშლა</button>




                    </center>


                <center>


                            <ul  class="lisitview_ul">
                                @for($i=0;$i<count($data);$i++)



                                    <li class="container_li" id="{{$data[$i]->id}}">

                                        <div id="ITEM_CONTAINER">
                                            <div  >

                                                     <button   id="favourite_item_add_btn"  onclick="delete_item({{$data[$i]->id}})"  > Delete</button>

                                            </div>
                                                <a class="detailed_a" href="{{$data[$i]->detailed_link}}"   target="_blank" >


                                            <image id="company_logo_tag" src="{{$data[$i]->website_picture}}"></image>

                                            <image class="item_picture" src="{{$data[$i]->image}}"></image>
                                            <ul class="item_specification">

                                                <li class="item_name_tag">{{substr($data[$i]->title,0,18)}} </li>
                                                <li  class="item_price_tag">{{$data[$i]->price}}₾ </li>

                                            </ul>
                                            </a>   </div>


                                    </li>








                                @endfor
                            </ul>





                </center>
                @endif



                @if(count($data)==0)
                    <center style="color: white" id="notfound_title">დამახსოვრებული პროდუქები არ მოიძებნა</center>
                @endif
                    <center style="color: white ; display: none" id="notfound_title">დამახსოვრებული პროდუქები არ მოიძებნა</center>

            </div>








        </div>









    </div>








</main>



@endif

@if(!session()->has("logged"))
    <h1>Log in to see there </h1>
@endif()




<script  >
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function  deleteall(){

        $(document).ready(function (){
            $(".lisitview_ul").empty();
            $("#btn_delete_all").hide();
            $("#notfound_title").show();
            $.ajax({
                url:"{{url('/deleteallfavouriteitems')}}",
                method:"get",
                success: function( data ){
                    console.log( data );

                },

            });


        })

    }

    function delete_item(id){
      //  $(`.${id}`).delete() ;
        if ( $("ul").children('li').length === 6 ) {
            $("#btn_delete_all").hide();
            $("#notfound_title").show();

        }
        $(`#${id}`).remove()



        $(document).ready(function (){

            $.ajax({
                url:"{{url('/itemdelete')}}/"+id,
                method:"get",


            });


        })



    }





</script>












</body>
</html>

























