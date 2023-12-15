<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	//Ajax More Gallery Photo

	add_action('wp_ajax_more_gallery_pic', 'more_gallery_pic_callback');
	add_action('wp_ajax_nopriv_more_gallery_pic', 'more_gallery_pic_callback');
	function more_gallery_pic_callback() {

		  $galleryMoreArgs = array(
		    'orderby' 	 => 'date',
		    'post_type'  => 'yuna_galley',
		    'post_status'    => 'publish',
			  'offset' => 8
		  );

		  $galleryMoreList = new WP_Query( $galleryMoreArgs );

		  if ( $galleryMoreList->have_posts() ) :

		    while ( $galleryMoreList->have_posts() ) : $galleryMoreList->the_post();
		      ?>
          <a href="<?php the_post_thumbnail_url();?>" data-fancybox="our-gallery" class="gallery-item col-lg-3 col-md-4 col-sm-6">
            <div class="inner yuna-radius">
	            <?php the_post_thumbnail();?>
            </div>
          </a>
		    <?php endwhile;?>
		  <?php endif; ?>
	  <?php wp_reset_postdata();

		wp_die();
	}