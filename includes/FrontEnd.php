<?php
namespace Aktar\TestiSlider;
use Aktar\TestiSlider\FrontEnd\ShortCode;
use Aktar\TestiSlider\Assets;

class FrontEnd{
    function __construct(){
        new Assets();
        new ShortCode();
    }
}