<?php
	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template home
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package wp_study
	 *
	 */
	get_header();

	if (!function_exists('get_header')) {
		wp_die();
	}
?>

<?php

/*	global $wpdb;

	$url = 'https://wp.webspark.dev/wp-api/products';

	$args = [
		'timeout'     => 25,
		'redirection' => 5,
		'httpversion' => '1.0',
		'user-agent'  => 'WordPress/' . $wp_version . '; ' . get_bloginfo( 'url' ),
		'blocking'    => true,
		'headers'     => array(),
		'cookies'     => array(),
		'body'        => null,
		'compress'    => false,
		'decompress'  => true,
		'sslverify'   => true,
		'stream'      => false,
		'filename'    => null
	];

	$response = wp_remote_get( $url,  $args);


	if ( is_wp_error( $response ) ){
		echo $response->get_error_message();
		$response = wp_remote_get( $url,  $args);
	}
  elseif( wp_remote_retrieve_response_code( $response ) === 200 ){

		$body = wp_remote_retrieve_body( $response );


		$body = json_decode($body, ARRAY_A);
		$newProductItem = $body['data'];

	  $productIdList = $wpdb->get_results("SELECT ID FROM {$wpdb->posts} WHERE post_status = 'publish' AND post_type='product'");
	  $productItem = $wpdb->get_results("SELECT * FROM {$wpdb->wc_product_meta_lookup}", ARRAY_A);

	  $testId = 1;

	  foreach ( $newProductItem as $itemNewProduct ){
		  $testId = $testId + 1;

		  $itemNewSku = $itemNewProduct['sku'];

		  $itemNewPrice = substr($itemNewProduct['price'],1);
		  $itemNewStockQuantity = $itemNewProduct['in_stock'];

		  if ( $productItem ){
		    foreach ( $productItem as $productDB ){
		      if ( $productDB['sky'] == $itemNewSku ){
		        $wpdb->update(
		            $wpdb->wc_product_meta_lookup,
              [
	              'max_price' => $itemNewPrice,
	              'stock_quantity' => $itemNewStockQuantity,
              ],
              ['sku' => $itemNewSku],

            );

			      $wpdb->update(
				      $wpdb->posts,
				      [
					      'post_content' => $itemNewProduct['description'],
					      'post_title' => $itemNewProduct['name'],
				      ],
				      ['ID' => $productDB['product_id']],

			      );
          }else{
		        $wpdb->delete(
		          $wpdb->wc_product_meta_lookup,
              ['sku' => $productDB['sky']]
            );

			      $wpdb->delete(
				      $wpdb->wc_product_attributes_lookup,
				      ['product_id' => $productDB['product_id']]
			      );

			      $wpdb->insert(
				      $wpdb->wc_product_meta_lookup,
				      [
					      'product_id' => $testId,
					      'sku' => $itemNewSku,
					      'max_price' => $itemNewPrice,
					      'stock_quantity' => $itemNewStockQuantity
				      ]
			      );

			      $wpdb->insert(
				      $wpdb->wc_product_attributes_lookup,
				      [
					      'product_id' => $testId,
				      ]
			      );
          }
        }
      }
    }
	}
*/?>

<?php
  echo carbon_get_theme_option( 'crb_text' );
?>
	<!-- -->
<?php
	$mainTitle = carbon_get_post_meta( get_the_ID(), 'main_title'.carbon_lang_prefix() );
	$mainGallery = carbon_get_post_meta( get_the_ID(), 'main_gallery'.carbon_lang_prefix() );
	$mainText = carbon_get_post_meta( get_the_ID(), 'main_text'.carbon_lang_prefix() );
	$counterTitle = carbon_get_post_meta( get_the_ID(), 'counter_title'.carbon_lang_prefix() );
	$counterText = carbon_get_post_meta( get_the_ID(), 'counter_text'.carbon_lang_prefix() );
	$counterNumber = carbon_get_post_meta( get_the_ID(), 'counter_number'.carbon_lang_prefix() );
	$mainQuestion = carbon_get_post_meta( get_the_ID(), 'main_question'.carbon_lang_prefix() );

	if ( $mainTitle && $mainQuestion && $mainText ):
?>
  <section class="main-screen">
    <div class="bg-pic-wrapper">
    </div>
    <div class="container">
      <div class="row">
        <div class="text-content col-lg-6">
          <h1><?php echo $mainTitle;?></h1>
          <h2><?php echo $mainQuestion;?></h2>
          <p><?php echo $mainText;?></p>
        </div>
				<?php if( $mainGallery ):?>
          <div class="photo-gallery-slider col-lx-4 offset-lg-1 col-lg-5" id="photo-gallery-slider">
						<?php foreach( $mainGallery as $item ):?>
              <div class="slide">
                <img src="<?php echo $item['photo'];?>" alt="">
              </div>
						<?php endforeach;?>
          </div>
				<?php endif;?>
      </div>
    </div>
    <?php if( $counterTitle ):?>
      <div class="death-counter">
        <div class="text-wrapper">
          <h3><?php echo $counterTitle;?></h3>
          <p><?php echo $counterText;?></p>
        </div>
        <div class="counter-wrapper">
          <div class="counter" data-death="<?php echo $counterNumber;?>"></div>
        </div>
      </div>
    <?php endif;?>
  </section>
<?php endif;?>

<?php
  $sp_bl_title = carbon_get_post_meta( get_the_ID(), 'sp_bl_title'.carbon_lang_prefix() );
	$sp_text = carbon_get_post_meta( get_the_ID(), 'sp_text'.carbon_lang_prefix() );

	if ( $sp_bl_title && $sp_text ):
?>
  <section class="sponsors indent-bottom indent-top">
    <div class="container">
      <div class="row">
        <h2 class="block-title col-12 text-center"><?php echo $sp_bl_title;?></h2>
        <p class="col-12 text-center"><?php echo $sp_text;?></p>
      </div>
    </div>
    <div class="sponsors-slider" id="sponsors-slider">
			<?php
				$sponsorArgs = array(
					'posts_per_page' => -1,
					'orderby' 	 => 'date',
					'post_type'  => 'sponsor',
					'post_status'    => 'publish'
				);

				$sponsorList = new WP_Query( $sponsorArgs );

				if ( $sponsorList->have_posts() ) :

					while ( $sponsorList->have_posts() ) : $sponsorList->the_post();
						?>
            <div class="slide">
              <img src="<?php the_post_thumbnail_url();?>" alt="">
            </div>
					<?php endwhile;?>
				<?php endif; ?>
			<?php wp_reset_postdata(); ?>
    </div>
  </section>
<?php endif;?>

<!-- Olympic team  -->
  <section class="olympic-team indent-top indent-bottom">
    <div class="container">
      <div class="row">
        <h2 class="block-title col-12 text-center"><?php echo carbon_get_post_meta( get_the_ID(), 'syllable_bl_title'.carbon_lang_prefix() );?></h2>
      </div>
      <div class="row" id="team-list">
				<?php
					$teamArgs = array(
						'posts_per_page' => 6,
						'orderby' 	 => 'date',
						'post_type'  => 'team',
						'post_status'    => 'publish'
					);

					$teamAllArgs = array(
						'posts_per_page' => -1,
						'orderby' 	 => 'date',
						'post_type'  => 'team',
						'post_status'    => 'publish'
					);

					$allTeamMore = new WP_Query( $teamAllArgs );
					$allTeamCount = $allTeamMore->post_count;

					$teamList = new WP_Query( $teamArgs );

					if ( $teamList->have_posts() ) :

						while ( $teamList->have_posts() ) : $teamList->the_post();
							?>
							<?php require ('template-parts/team-men.php');?>
						<?php endwhile;?>
					<?php endif; ?>
				<?php wp_reset_postdata(); ?>
      </div>
			<?php if( $allTeamCount > 6 ):?>
        <div class="row">
          <div class="col-12 text-center btn-more-wrapper">
            <a href="#" class="button more" id="more-sportsmen" data-current="1" data-count="<?php echo $allTeamCount;?>" data-lang="<?php echo get_bloginfo('language');?>">
							<?php echo esc_html( pll__( 'Ще 6 олімпійських спортсменів' ) ); ?>
            </a>
          </div>
        </div>
			<?php endif;?>
    </div>
  </section>

<?php
  $call_bl_title = carbon_get_post_meta( get_the_ID(), 'call_bl_title'.carbon_lang_prefix() );
	$call_text = carbon_get_post_meta( get_the_ID(), 'call_text'.carbon_lang_prefix() );
	$call_title_vis = carbon_get_post_meta( get_the_ID(), 'crb_radio'.carbon_lang_prefix() );

	/*if ( $sp_bl_title && $call_text ):*/
?>
  <section class="exclusion-call indent-bottom">
    <div class="bg-pic">
      <img src="<?php echo THEME_PATH;?>/assets/img/footer-bg.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <h2 class="block-title col-12 text-center"><?php echo $call_bl_title;?></h2>
        <p class="text-center col-xl-8 col-lx-10 offset-xl-2 offset-lg-1 offset-0"><?php echo $call_text;?></p>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <a href="#" class="button shared" data-toggle="modal" data-target="#choiceModal">
						<?php echo esc_html( pll__( 'Поширити цей сайт' ) ); ?>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18 22C17.1667 22 16.4583 21.7083 15.875 21.125C15.2917 20.5417 15 19.8333 15 19C15 18.8833 15.0083 18.7623 15.025 18.637C15.0417 18.5117 15.0667 18.3993 15.1 18.3L8.05 14.2C7.76667 14.45 7.45 14.646 7.1 14.788C6.75 14.93 6.38333 15.0007 6 15C5.16667 15 4.45833 14.7083 3.875 14.125C3.29167 13.5417 3 12.8333 3 12C3 11.1667 3.29167 10.4583 3.875 9.875C4.45833 9.29167 5.16667 9 6 9C6.38333 9 6.75 9.071 7.1 9.213C7.45 9.355 7.76667 9.55067 8.05 9.8L15.1 5.7C15.0667 5.6 15.0417 5.48767 15.025 5.363C15.0083 5.23833 15 5.11733 15 5C15 4.16667 15.2917 3.45833 15.875 2.875C16.4583 2.29167 17.1667 2 18 2C18.8333 2 19.5417 2.29167 20.125 2.875C20.7083 3.45833 21 4.16667 21 5C21 5.83333 20.7083 6.54167 20.125 7.125C19.5417 7.70833 18.8333 8 18 8C17.6167 8 17.25 7.92933 16.9 7.788C16.55 7.64667 16.2333 7.45067 15.95 7.2L8.9 11.3C8.93333 11.4 8.95833 11.5127 8.975 11.638C8.99167 11.7633 9 11.884 9 12C9 12.1167 8.99167 12.2377 8.975 12.363C8.95833 12.4883 8.93333 12.6007 8.9 12.7L15.95 16.8C16.2333 16.55 16.55 16.3543 16.9 16.213C17.25 16.0717 17.6167 16.0007 18 16C18.8333 16 19.5417 16.2917 20.125 16.875C20.7083 17.4583 21 18.1667 21 19C21 19.8333 20.7083 20.5417 20.125 21.125C19.5417 21.7083 18.8333 22 18 22ZM18 6C18.2833 6 18.521 5.904 18.713 5.712C18.905 5.52 19.0007 5.28267 19 5C19 4.71667 18.904 4.479 18.712 4.287C18.52 4.095 18.2827 3.99933 18 4C17.7167 4 17.479 4.096 17.287 4.288C17.095 4.48 16.9993 4.71733 17 5C17 5.28333 17.096 5.521 17.288 5.713C17.48 5.905 17.7173 6.00067 18 6ZM6 13C6.28333 13 6.521 12.904 6.713 12.712C6.905 12.52 7.00067 12.2827 7 12C7 11.7167 6.904 11.479 6.712 11.287C6.52 11.095 6.28267 10.9993 6 11C5.71667 11 5.479 11.096 5.287 11.288C5.095 11.48 4.99933 11.7173 5 12C5 12.2833 5.096 12.521 5.288 12.713C5.48 12.905 5.71733 13.0007 6 13ZM18 20C18.2833 20 18.521 19.904 18.713 19.712C18.905 19.52 19.0007 19.2827 19 19C19 18.7167 18.904 18.479 18.712 18.287C18.52 18.095 18.2827 17.9993 18 18C17.7167 18 17.479 18.096 17.287 18.288C17.095 18.48 16.9993 18.7173 17 19C17 19.2833 17.096 19.521 17.288 19.713C17.48 19.905 17.7173 20.0007 18 20Z" fill="white"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </section>
<?php /*endif;*/?>
<?php get_footer();
