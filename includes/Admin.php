<?php
namespace Aktar\TestiSlider;
use Aktar\TestiSlider\Admin\Menu;
use Aktar\TestiSlider\Admin\CustomPost;
//use Mps\Extension\Assets;
class Admin{
    function __construct(){
        //new Assets();
        new Menu();
        new CustomPost();
    }
}