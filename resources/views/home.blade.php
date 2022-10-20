@extends('layouts.layout')

@section('content')

    <div class="main">


        <div class="main-search-input-wrap">


            <form action="/" method="post">
                @if(Session::get("success"))
                    <center><div class="message">{{Session::get("success")}}</div></center>
                @endif


                    @csrf
                    <div class="main-search-input fl-wrap">
                <div class="main-search-input-item">
                    <input type="text"    placeholder="Search Product..." name="search_input" value="{{old("search_input")}}">
                </div>

                <button class="main-search-button" href="" type="submit">Search</button>
            </div>
            </form>
        </div>




        <div class="category_wrapper">
            <ul class="category_ul">
                <li class="category_li"  >
                    <a class="category_ab">კატეგორიები : </a>


                </li>
                <li class="category_li">
                    <a href="/category/mobile" class="category_a">Mobile </a>
                </li>
                <li class="category_li">
                    <a href="/category/laptop"  class="category_a">Laptops</a>
                </li>
                <li class="category_li" >
                    <a href="/category/tv" class="category_a">Tv</a>

                </li>

            </ul>

        </div>






        <div class="list_view">




            <center>


                <ul  class="lisitview_ul">@if(count($data)!=0)

                        @for($i=0;$i<count($data);$i++)

                    <li class="container_li">

                        <div id="ITEM_CONTAINER">


                                @if(session()->has("logged"))
                                     <div  >



                                         @if($data[$i]->getIsSaved())
                                             <button id="favourite_item_add_btn"  style=" color: rgba(29, 231, 131, 1)"  >Saved</button>
                                         @endif
                                             @if($data[$i]->getIsSaved()==false)
                                                 <button id="favourite_item_add_btn"  class="{{$data[$i]->getId()}}"  onclick="add_item({{$data[$i]->getId()}})">Save</button>

                                             @endif





                                     </div>
                                  @endif
                                    <a  class="detailed_a" href="{{$data[$i]->getDetailedLink()}}"   target="_blank" >
                            <image id="company_logo_tag" src="{{$data[$i]->getWebsitePicture()}}"></image>

                             <image class="item_picture"src="{{$data[$i]->getImage()}}"></image>

                            <ul class="item_specification">

                              <li class="item_name_tag">{{substr($data[$i]->getTitle(),0,18)}} </li>
                             <li  class="item_price_tag">{{$data[$i]->getPrice()}}₾ </li>

                            </ul>
                                    </a>


    </div> </li>


        @endfor
                    @endif
                </ul>
            </center>



        </div>


        <script  >
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function add_item(id){





            $(document).ready(function (){
                $(`.${id}`).text("Saved") ;
                $(`.${id}`).css("color","rgba(29, 231, 131, 1)")

                $(`.${id}`).prop("onclick", null).off("click");
                    $.ajax({
                        url:"{{url('/save')}}/"+id,
                        method:"get",

                        success: function(response ){
                            console.log(response );



                        },

                    });
                })


            }




        </script>










@endsection
