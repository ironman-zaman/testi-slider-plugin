<?php

namespace Aktar\TestiSlider;

class Assets
{
    function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_assets']);
        add_action('wp_enqueue_scripts', [$this,'custom_front_scripts'] );
    }
    
    //Backend scripts and css
    public function enqueue_assets()
    {
        wp_register_style('testi-slider-css-backend', TESTI_SLIDER_ASSETS . '/css/backend.css', false, '1.0.0');
        wp_enqueue_style('testi-slider-css-backend');
    }
    
    // front end scripts and css
    function custom_front_scripts() {
	wp_enqueue_style( 'glider_js_styles', '//cdnjs.cloudflare.com/ajax/libs/glider-js/1.6.6/glider.min.css',false, time() );
	wp_enqueue_style( 'frontend_styles', TESTI_SLIDER_ASSETS . '/css/frontend.css', false, time() );
	wp_enqueue_script( 'glider_js_script','//cdnjs.cloudflare.com/ajax/libs/glider-js/1.6.6/glider.min.js', array('jquery'),'1.0' );
	wp_enqueue_script('frontendjs', TESTI_SLIDER_ASSETS . '/js/frontend.js', array(), '1.0.0', 'true' );
    }
}
