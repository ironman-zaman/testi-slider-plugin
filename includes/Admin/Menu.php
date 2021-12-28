<?php
namespace Aktar\TestiSlider\Admin;
class Menu{
    function __construct(){
     add_action('admin_menu',[$this,'admin_menu']);   
    }
    
    public function admin_menu(){
        $parent_slug = 'aktar-testi-slider';
        add_menu_page(__('Testi Slider','testi-slider'),__('Testi Slider','testi-slider'),'manage_options',$parent_slug,[$this,'plugin_page'],'dashicons-palmtree');
    }
    public function plugin_page(){
        echo "New feature will come soon";
    }
}