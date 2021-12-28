<?php
namespace Aktar\TestiSlider\Admin;

class CustomPost{
    function __construct(){
        add_action( 'init', [$this,'testimonial_custom_post_types'] );
    }
    
    public function testimonial_custom_post_types(){
        //zodiac slider cpt
        $labels_testimonial = array(
        'name'  => __( 'Testimonials', 'testi-slider' ),
        'singular_name' => __( 'Testimonial' , 'testi-slider' ),
        'menu_name' => __( 'Testimonial', 'testi-slider' ));
        
        $args_testimonial = array(
            'labels'=> $labels_testimonial,
            'public' => true,
            'publicly_queryable' => true,
            'show_in_menu'       => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
            );
        register_post_type( 'testimonial', $args_testimonial );
    }
}