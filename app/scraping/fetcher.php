<?php

namespace App\scraping;




require  'C:\Users\GIORGI TUGHUSHI\Desktop\price_radar\priceRadar\vendor\autoload.php';
use Goutte\Client;
use InvalidArgumentException;
use Symfony\Component\HttpClient\HttpClient;


class fetcher{


    public $maindata = [];


    function megatechnica_products_list_view_from_link($link): void
    {

        try {

            $client = new Client(  );
            $crawler = $client->request('GET', $link);
            $contianer = $crawler->filter("div.products")->filter("ul");
            $contianer->children()->each(function ($node) {


                $detailed_link = $node->filter("a")->attr("href");
                $title = $node->filter("a.link")->text();
                $price = $node->filter("span.price")->text();

                $tt = $node->filter("li>img")->attr("src");
                $image = "https://www.megatechnica.ge$tt";
                $web="https://cdn.onoff.ge/media/thumbs/051/0514379_megateqnika_450.png";

                $this->maindata[] = new item_modal($title, $image, $price, $web, $detailed_link);


            });


        } catch (InvalidArgumentException $e) {
            echo "was not fount any item in megatechnica web data";
        }


    }

    function megatechnica_SEARCH($query)
    {
        $link = "https://www.megatechnica.ge/ge/all?title=$query";

        $this->megatechnica_products_list_view_from_link($link);


    }


    function allmarket_products_list_view_from_link($link): void
    {

        try {

            $client = new \Goutte\Client(HttpClient::create(array(
                'headers' => array(
                    'user-agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:73.0) Gecko/20100101 Firefox/73.0', // will be forced using 'Symfony BrowserKit' in executing
                    'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                    'Accept-Language' => 'en-US,en;q=0.5',
                    'Referer' => "$link",
                    'Upgrade-Insecure-Requests' => '1',
                    'Save-Data' => 'on',
                    'Pragma' => 'no-cache',
                    'Cache-Control' => 'no-cache',
                ),
            )));
            $crawler = $client->request('GET', $link);
            $maincontainer = $crawler->filter("div#content")->filter("div.products-category")
                ->filter("div.products-list");

            $maincontainer->filter("div.product-layouts")->each(function ($node) {
                $leftblock = $node->filter("div.product-item-container")->filter("div.left-block")
                    ->filter("div.product-image-container");
                $detailed_link = $leftblock->filter("a")->attr("href");
                $image = $leftblock->filter("img")->attr("data-src");
                $pr = $node->filter("div.product-item-container")->filter("div.right-block")->filter("div.price")
                    ->filter("span")->text();

                $name = $node->filter("div.product-item-container")->filter("div.right-block")
                    ->filter("h4")->filter("a")->attr("title");
                $image = str_replace(' ', '%20', $image);
                $web = "https://allmarket.ge/r/images/logo.png";
                    $pr=floatval($pr);
                $this->maindata[] = new item_modal($name, $image, $pr , $web, $detailed_link);
                echo $image;

            });


        } catch (InvalidArgumentException $e) {
            echo "";
        }

    }


    function allmarket_search($query)
    {
        $link = "https://allmarket.ge/searchresult?category_id=-1&keyword=$query&search=";
        $this->allmarket_products_list_view_from_link($link);


    }


    function ZOOMER_products_list_view_from_link($link, $type): void
    { try {
        $exep1 = "lg_9";
        $exep2 = "lg_3";

        if ($type == "search") {
            $exep1 = "lg_12";
            $exep2 = "col_5";
        }


            $client = new Client(HttpClient::create(array(
                'headers' => array(
                    'user-agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:73.0) Gecko/20100101 Firefox/73.0', // will be forced using 'Symfony BrowserKit' in executing
                    'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                    'Accept-Language' => 'en-US,en;q=0.5',
                    'Referer' => "$link",
                    'Upgrade-Insecure-Requests' => '1',
                    'Save-Data' => 'on',
                    'Pragma' => 'no-cache',
                    'Cache-Control' => 'no-cache',
                ),
            )));
            $crawler = $client->request('GET', $link);
            $main_container = $crawler->filter("div.$exep1")->filter("div.js-product-items")->
            filter("div.$exep2");
            $main_container->each(function ($node) use ($exep2) {

                $pricee = $node->filter("div.$exep2")->filter("div.product_blocks")->filter("div.product_bottom_div")
                    ->filter("div.product_prices")->filter("div.product_new_price")->text();



                $pricee= (trim($pricee,'₾'));











                $container = $node->filter("div.$exep2")->filter("div.product_blocks")->filter(".product_top_div");

                $name = $container->filter(".product_link")->filter("h4")->text();
                $detailed_link_attr = $container->filter(".product_link")->attr("href");
                $detailed_link = "https://zoommer.ge/$detailed_link_attr";
                $image = $container->filter("div.carousel")->filter(".carousel-item")->filter("img")->attr("data-src");
                $web = "https://static.hr.ge/public/logo/16557/42d9db7f-0196-41e3-97a4-f110428a4f86.png";
                $modal = new item_modal($name, $image, $pricee, $web, $detailed_link);
                $this->maindata[] = $modal;


            });
        } catch (InvalidArgumentException $e) {

        }


    }


    function ZOOMER_search($query): void
    {

        $link = "https://zoommer.ge/search?q=$query&CategoryIds=0";
        $this->ZOOMER_products_list_view_from_link("$link", "search");


    }


    function ALTA_products_list_view_from_link($link): void
    {

        try {

            $client = new Client(HttpClient::create(array(
                'headers' => array(
                    'user-agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:73.0) Gecko/20100101 Firefox/73.0', // will be forced using 'Symfony BrowserKit' in executing
                    'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                    'Accept-Language' => 'en-US,en;q=0.5',
                    'Referer' => "$link",
                    'Upgrade-Insecure-Requests' => '1',
                    'Save-Data' => 'on',
                    'Pragma' => 'no-cache',
                    'Cache-Control' => 'no-cache',
                ),
            )));
            $crawler = $client->request('GET', $link);
            $main_container = $crawler->filter('div.grid-list');
            $main_container->filter('div.ty-column3')->each(function ($node) {
                $d = $node->filter("div.ty-grid-list__item");
                $m = $node->filter("div.ty-grid-list__price");
                $imagenav = $node->filter("div.ty-grid-list__image");
                $datailed_link = $node->filter("div.ty-grid-list__item-name")->filter("a")->attr("href");

                $n = $node->filter("span.ty-price");

                $image = $node->filter("img")->attr("src");
                $name = $node->filter("div.ty-grid-list__item-name")->filter("a")->text();
                $price = $node->filter("span.ty-price-num")->text();
                $price=floatval($price);

                $web = "https://alta.ge/images/logos/169/Alta_Logo.png?t=1664805443";

                $this->maindata[] = new item_modal($name, $image, $price, $web, $datailed_link);


            });

        } catch (InvalidArgumentException $e) {
            echo "was not fount any item in Alta web data";
        }

    }

    function ALTA_search($text): void
    {
        $head = "https://alta.ge/?subcats=Y&pcode_from_q=Y&pshort=Y&pfull=Y&pname=Y&pkeywords=Y&search_performed=Y&q=";
        $tail = "&dispatch=products.search";
        $final_link = "$head$text$tail";
        $this->ALTA_products_list_view_from_link($final_link);


    }



    function fetch_mobile_category():void{
        $this->ZOOMER_products_list_view_from_link("https://zoommer.ge/mobilurebi-2?orderby=30","s");
        $this->ALTA_products_list_view_from_link("https://alta.ge/phones-and-communications/smartphones.html");


        $this->megatechnica_products_list_view_from_link("https://www.megatechnica.ge/ge/telefonebi");
         current_data::$currentdata=$this->maindata;


    }

    function fetch_laptops_category():void{
        $this->ZOOMER_products_list_view_from_link("https://zoommer.ge/brendebi","dw");
        $this->ALTA_products_list_view_from_link("https://alta.ge/computers-and-office/pcs-notebooks-and-accessories/notebooks.html");
        $this->megatechnica_products_list_view_from_link("https://www.megatechnica.ge/ge/leptopebi");

        current_data::$currentdata=$this->maindata;





    }

    function  fetch_tv_category():void{

        $this->megatechnica_products_list_view_from_link("https://www.megatechnica.ge/ge/televizorebi?min_price=332&max_price=19999&sort=asc");
         $this->ZOOMER_products_list_view_from_link("https://zoommer.ge/televizorebi","dw");
        $this->ALTA_products_list_view_from_link("https://alta.ge/tv-photo-video-audio-game-consoles/tvs.html");

        current_data::$currentdata=$this->maindata;

    }





    function fetch_with_search($query): void
    {

         $this->ALTA_search($query);
        $this->ZOOMER_search($query);
    $this->megatechnica_SEARCH($query);
    current_data::$currentdata=$this->maindata ;

    }



}










