<?php

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template About
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package yuna brew
	 *
	 */

	get_header();?>

<?php get_template_part('template-parts/block', 'main-inner');?>

	<!-- About us -->
<?php
	$aboutUsTitle = carbon_get_post_meta(get_the_ID(), 'brew_about_block_about_title'.brew_lang_prefix());
	$aboutUsText = carbon_get_post_meta(get_the_ID(), 'brew_about_block_about_text'.brew_lang_prefix());
	$aboutUsImage = carbon_get_post_meta(get_the_ID(), 'brew_about_block_about_image'.brew_lang_prefix());

	if ( $aboutUsText && $aboutUsImage ):
?>
	<section class="about-us ">
	  <div class="container-fluid">
	    <div class="row">
		    <div class="text-wrapper col-xl-6 offset-xl-1 col-sm-7 offset-md-0 indent-bottom-small indent-top-small">
			    <h2 class="block-title brown-title"><?php echo $aboutUsTitle;?></h2>
			    <div class="text"><?php echo apply_filters('the_content', $aboutUsText);?></div>
		    </div>
		    <div class="pic-wrapper col-sm-5" style="background-image: url('<?php echo $aboutUsImage;?>')">
			    <img src="<?php echo $aboutUsImage;?>" alt="">
		    </div>
	    </div>
	  </div>
	</section>
<?php endif;?>

   <?php
   	$teamArgs = array(
   		'posts_per_page' => -1,
   		'orderby' 	 => 'date',
   		'post_type'  => 'brew_team',
   		'post_status'    => 'publish'
   	);

   	$teamList = new WP_Query( $teamArgs );

   		  if ( $teamList->have_posts() ) :?>

          <!-- Our team -->
          <section class="our-team indent-bottom-small indent-top-big">
            <div class="block-pic"><img src="<?php echo THEME_PATH;?>/assets/img/team-pic.png" alt=""></div>
            <div class="container">
              <div class="row">
                <h2 class="block-title col-12 text-center brown-title">
                  <?php echo carbon_get_post_meta( get_the_ID(), 'brew_about_block_team_title'.brew_lang_prefix() );?>
                </h2>
                <p class="text col-12 text-center">
	                <?php echo carbon_get_post_meta( get_the_ID(), 'brew_about_block_team_text'.brew_lang_prefix() );?>
                </p>
              </div>
              <div class="row">
	              <?php while ( $teamList->have_posts() ) : $teamList->the_post(); ?>
                  <div class="team-men col-sm-6">
                    <div class="photo-wrapper">
                      <img src="<?php the_post_thumbnail_url();?>" alt="">
	                    <?php
		                    $menFbLink = carbon_get_post_meta( get_the_ID(), 'brew_team_men_fb_link'.brew_lang_prefix() );
		                    $menInLink = carbon_get_post_meta( get_the_ID(), 'brew_team_men_in_link'.brew_lang_prefix() );
		                    $menTwLink = carbon_get_post_meta( get_the_ID(), 'brew_team_men_tweeter_link'.brew_lang_prefix() );
		                    $menTlLink = carbon_get_post_meta( get_the_ID(), 'brew_team_men_telegram_link'.brew_lang_prefix() );

		                    if ( $menFbLink || $menInLink || $menTlLink || $menTwLink ):
			                    ?>
                          <div class="soc-list">
				                    <?php if( $menTwLink ):?>
                              <a href="<?php echo $menTwLink;?>" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                  <path d="M6.2896 18.1256C13.8368 18.1256 17.9648 11.8728 17.9648 6.45035C17.9648 6.27275 17.9648 6.09595 17.9528 5.91995C18.7559 5.33908 19.4491 4.61986 20 3.79595C19.2512 4.12795 18.4567 4.34558 17.6432 4.44155C18.4998 3.92879 19.141 3.1222 19.4472 2.17195C18.6417 2.64996 17.7605 2.98681 16.8416 3.16795C16.2229 2.5101 15.4047 2.07449 14.5135 1.92852C13.6223 1.78256 12.7078 1.93438 11.9116 2.3605C11.1154 2.78661 10.4819 3.46326 10.109 4.28574C9.73605 5.10822 9.64462 6.03067 9.8488 6.91035C8.21741 6.82852 6.62146 6.40455 5.16455 5.66596C3.70763 4.92737 2.4223 3.89067 1.392 2.62315C0.867274 3.52648 0.70656 4.59584 0.942583 5.6135C1.17861 6.63117 1.79362 7.52061 2.6624 8.10075C2.00936 8.08162 1.37054 7.90545 0.8 7.58715V7.63915C0.800259 8.58653 1.12821 9.50465 1.72823 10.2378C2.32824 10.9709 3.16338 11.474 4.092 11.6616C3.4879 11.8263 2.85406 11.8504 2.2392 11.732C2.50151 12.5472 3.01202 13.2602 3.69937 13.7711C4.38671 14.282 5.21652 14.5654 6.0728 14.5816C5.22203 15.2503 4.24776 15.7447 3.20573 16.0366C2.16369 16.3284 1.07435 16.4119 0 16.2824C1.87653 17.4865 4.05994 18.1253 6.2896 18.1224" fill="white"/>
                                </svg>
                              </a>
				                    <?php endif;?>
				                    <?php if( $menFbLink ):?>
                              <a href="<?php echo $menFbLink;?>" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                  <path d="M20 10C20 4.47715 15.5229 0 10 0C4.47715 0 0 4.47715 0 10C0 14.9912 3.65684 19.1283 8.4375 19.8785V12.8906H5.89844V10H8.4375V7.79688C8.4375 5.29063 9.93047 3.90625 12.2146 3.90625C13.3084 3.90625 14.4531 4.10156 14.4531 4.10156V6.5625H13.1922C11.95 6.5625 11.5625 7.3334 11.5625 8.125V10H14.3359L13.8926 12.8906H11.5625V19.8785C16.3432 19.1283 20 14.9912 20 10Z" fill="white"/>
                                  <path d="M13.8926 12.8906L14.3359 10H11.5625V8.125C11.5625 7.33418 11.95 6.5625 13.1922 6.5625H14.4531V4.10156C14.4531 4.10156 13.3088 3.90625 12.2146 3.90625C9.93047 3.90625 8.4375 5.29063 8.4375 7.79688V10H5.89844V12.8906H8.4375V19.8785C9.47287 20.0405 10.5271 20.0405 11.5625 19.8785V12.8906H13.8926Z" fill="#101011"/>
                                </svg>
                              </a>
				                    <?php endif;?>
				                    <?php if( $menInLink ):?>
                              <a href="<?php echo $menInLink;?>" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                  <path d="M0 1.43266C0 0.641875 0.662031 0 1.47813 0H18.5219C19.3383 0 20 0.641875 20 1.43266V18.5676C20 19.3586 19.3383 20 18.5219 20H1.47813C0.662109 20 0 19.3587 0 18.5678V1.43242V1.43266Z" fill="white"/>
                                  <path d="M6.07742 16.7374V7.73329H3.08461V16.7374H6.07773H6.07742ZM4.58164 6.50415C5.62508 6.50415 6.27469 5.81274 6.27469 4.94868C6.25516 4.06493 5.62508 3.39282 4.60148 3.39282C3.57719 3.39282 2.9082 4.06493 2.9082 4.9486C2.9082 5.81267 3.55758 6.50407 4.56203 6.50407H4.58141L4.58164 6.50415ZM7.73398 16.7374H10.7266V11.7096C10.7266 11.4409 10.7461 11.1714 10.8252 10.9795C11.0414 10.4416 11.5338 9.88478 12.3608 9.88478C13.4434 9.88478 13.8768 10.7104 13.8768 11.9209V16.7374H16.8693V11.5747C16.8693 8.80915 15.393 7.5222 13.4241 7.5222C11.8098 7.5222 11.1008 8.42446 10.7069 9.03899H10.7268V7.7336H7.73414C7.7732 8.57829 7.73391 16.7377 7.73391 16.7377L7.73398 16.7374Z" fill="#101011"/>
                                </svg>
                              </a>
				                    <?php endif;?>
				                    <?php if( $menTlLink ):?>
                              <a href="<?php echo $menTlLink;?>" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                  <path d="M10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20Z" fill="white"/>
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M4.52684 9.89446C7.44205 8.62435 9.38597 7.78702 10.3586 7.38246C13.1357 6.22737 13.7128 6.02672 14.0889 6.02009C14.1716 6.01863 14.3566 6.03913 14.4764 6.13635C14.5776 6.21844 14.6054 6.32934 14.6187 6.40717C14.632 6.485 14.6486 6.6623 14.6354 6.80083C14.485 8.38207 13.8338 12.2193 13.5025 13.9903C13.3623 14.7397 13.0863 14.991 12.8191 15.0155C12.2384 15.069 11.7974 14.6318 11.2349 14.2631C10.3548 13.6861 9.85759 13.327 9.00328 12.764C8.01596 12.1134 8.656 11.7558 9.21866 11.1714C9.36592 11.0184 11.9246 8.69115 11.9741 8.48002C11.9803 8.45362 11.986 8.3552 11.9276 8.30323C11.8691 8.25125 11.7828 8.26903 11.7205 8.28316C11.6322 8.3032 10.2262 9.23252 7.50247 11.0711C7.10337 11.3452 6.74188 11.4787 6.418 11.4717C6.06095 11.464 5.37413 11.2698 4.86355 11.1039C4.23729 10.9003 3.73956 10.7927 3.7829 10.4469C3.80548 10.2669 4.05346 10.0827 4.52684 9.89446Z" fill="#101011"/>
                                </svg>
                              </a>
				                    <?php endif;?>
                          </div>
		                    <?php endif;?>
                    </div>
                    <div class="info">
                      <p class="name"><?php the_title();?></p>
                      <p class="position"><?php echo carbon_get_post_meta( get_the_ID(), 'brew_team_men_position'.brew_lang_prefix() );?></p>
                      <div class="description"><?php the_content();?></div>
                    </div>
                  </div>
	              <?php endwhile;?>

              </div>
            </div>
          </section>

   	<?php endif; ?>
   <?php wp_reset_postdata(); ?>

<?php get_footer();
