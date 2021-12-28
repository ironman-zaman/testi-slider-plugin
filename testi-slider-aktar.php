<?php
/**
 * Plugin Name: Testi Slider Aktar
 * Description: This is a custom plugin for testimonial slider
 * Plugin URL: https://aktaruzzaman.com/
 * Author: Aktar Uz Zaman
 * Author URI: https://aktaruzzaman.com/
 * Version: 1.0
 * License: GPL2 or Later
 */
 
 if( ! defined('ABSPATH')){
     exit;
 }

//Autoload composer
require_once __DIR__.'/vendor/autoload.php';
use Aktar\TestiSlider\Admin;
use Aktar\TestiSlider\FrontEnd;
/**
  * Main plugin class
*/
final class Testi_Slider{
    const version = '1.0';
    private function __construct(){
        $this->define_constants();
        register_activation_hook(__FILE__,[$this,'activate']);
        add_action('plugins_loaded',[$this,'init_plugin']);
    }
    
    public static function init(){
        static $instance = false;
        if(!$instance){
            $instance = new self();
        }
        return $instance;
    }
    
    public function define_constants(){
        define('TESTI_SLIDER_VERSION',self::version);
        define('TESTI_SLIDER_FILE',__FILE__);
        define('TESTI_SLIDER_PATH',__DIR__);
        define('TESTI_SLIDER_URL', plugins_url('', TESTI_SLIDER_FILE));
        define('TESTI_SLIDER_ASSETS', TESTI_SLIDER_URL . '/assets');
    }
    
    public function activate(){
        $installed = get_option('testi_slider_installed');
        if(!$installed){
            update_option('testi_slider_installed', time());
        }
        update_option('testi_slider_version',TESTI_SLIDER_VERSION);
    }
    
    public function init_plugin(){
        if(is_admin()){
            new Admin();
        }else{
            new FrontEnd();
        }
        
    }
}

 /*initialize the main plugin*/
function test_slider(){
    return Testi_Slider::init();
}

//finally start the plugin
test_slider();