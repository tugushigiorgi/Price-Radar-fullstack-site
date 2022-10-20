<?php

namespace App\scraping;

use Ramsey\Uuid\Type\Integer;

class item_modal{


    private $title;
    private $image;
    private $price;
    private $website_picture;
    private $detailed_link;
    private  $id;
private bool $is_saved=false;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function getIsSaved(): bool
    {
        return $this->is_saved;
    }

    /**
     * @param bool $is_saved
     */
    public function setIsSaved(bool $is_saved): void
    {
        $this->is_saved = $is_saved;
    }







    function __construct($title,$image,$price,$website_picture, $detailed_link){
      $this->id=  (time()+ rand(1,2000));
        $this->title=$title;
        $this->image=$image;
        $this->price=$price;
        $this->website_picture=$website_picture;
        $this->detailed_link=$detailed_link;
    }

    /**
     * @return mixed
     */
    public function getDetailedLink()
    {
        return $this->detailed_link;
    }

    /**
     * @param mixed $detailed_link
     */
    public function setDetailedLink($detailed_link): void
    {
        $this->detailed_link = $detailed_link;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getWebsitePicture()
    {
        return $this->website_picture;
    }

    /**
     * @param mixed $website_picture
     */
    public function setWebsitePicture($website_picture)
    {
        $this->website_picture = $website_picture;
    }
}
