<?php
namespace Aktar\TestiSlider\FrontEnd;

class ShortCode{
    function __construct(){
    add_shortcode('testimonial-slider',[$this,'show_testimonial_slider']);
    }
	
	/*function call product reviews*/
    public function show_testimonial_slider($atts , $content=''){
        ob_start();
        $args = array(
            // Arguments for your query.
            'post_type' => 'testimonial',
        );
        // Custom query.
        $query = new \WP_Query( $args );
  ?>
         <div class="glider-contain">
          <div class="glider testi-slider">
         <?php
        // Check that we have query results.
        if ( $query->have_posts() ) {
            // Start looping over the query results.
            while ( $query->have_posts() ) {
                $query->the_post();
        ?>
      <div class="testimonial">
					<?php
						the_content();	 
					 ?>
			 		<?php the_title(); ?>
      </div>        
        <?php
            }
        }
        // Restore original post data.
        wp_reset_postdata();
        
        ?>
        </div>
          <button aria-label="Previous" class="glider-prev prev-cat-rev">
<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M18.75 22.5L11.25 15L18.75 7.5" stroke="#717171" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</button>
          <button aria-label="Next" class="glider-next next-cat-rev"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11.25 22.5L18.75 15L11.25 7.5" stroke="#717171" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button>
        </div>
        <script>
            new Glider(document.querySelector('.testi-slider'), {
              slidesToShow: 1,
              slidesToScroll: 1,
              draggable: false,
              arrows: {
                prev: '.prev-cat-rev',
                next: '.next-cat-rev'
              },
				responsive: [
    {
      // screens greater than >= 768px
      breakpoint: 768,
      settings: {
        // Set to `auto` and provide item width to adjust to viewport
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }
  ]
            });
        </script>
        
        <?php
        return ob_get_clean();
    }
	
}