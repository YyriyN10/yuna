<?php

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template Menu
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package yuna brew
	 *
	 */

	get_header();?>

<!-- Main screen -->
<section class="main-screen">
  <div class="bg-wrapper">
    <div class="bg-pic pic-left"></div>
    <div class="bg-pic pic-center"></div>
    <div class="bg-pic pic-right"></div>
  </div>
  <div class="coffee-left coffee-bg">
    <img src="<?php echo THEME_PATH;?>/assets/img/coffee-grain-left.png" alt="">
  </div>
  <div class="coffee-right coffee-bg">
    <img src="<?php echo THEME_PATH;?>/assets/img/coffee-grain-right.png" alt="">
  </div>
  <div class="container-fluid">
    <div class="row content">
      <h1 class="col-12 text-center"><?php the_title();?></h1>
    </div>
  </div>
</section>

<?php
	$coffeeMenuArgs = array(
		'posts_per_page' => -1,
		'orderby' 	 => 'date',
		'post_type'  => 'coffee_menu',
		'post_status'    => 'publish'
	);

	$coffeeMenuList = new WP_Query( $coffeeMenuArgs );

		  if ( $coffeeMenuList->have_posts() ) : ?>
        <!-- Coffee menu -->
        <section class="menu-type coffee-menu indent-top-small indent-bottom-small">
          <div class="container-fluid">
            <div class="row">
              <h2 class="block-title col-12 text-center white-title">Coffee menu</h2>
            </div>
            <div class="row">
              <ul class="menu-list col-xl-10 offset-xl-1 col-12 offset-0">
			        <?php  while ( $coffeeMenuList->have_posts() ) : $coffeeMenuList->the_post();?>
				        <?php get_template_part('template-parts/product-item');?>
			        <?php endwhile;?>
              </ul>
            </div>
          </div>
           <?php

	           $coffeeBestArgs = array(
           		'posts_per_page' => -1,
           		'orderby' 	 => 'date',
           		'post_type'  => 'coffee_menu',
           		'post_status'    => 'publish',
               'tax_query' => [
			           [
				           'taxonomy' => 'coffee-menu-tax',
				           'field' => 'slug',
				           'terms' => 'best-seller',
			           ]
		           ],
           	);

           	$coffeeBestList = new WP_Query( $coffeeBestArgs );

           		  if ( $coffeeBestList->have_posts() ) : ?>
                  <div class="container">
                    <div class="row">
                      <h2 class="block-title text-center brown-title col-12">best sellers</h2>
                    </div>
                    <div class="row">
                      <div class="best-seller-list product-slider col-12">
	                      <?php  while ( $coffeeBestList->have_posts() ) : $coffeeBestList->the_post(); ?>
		                      <?php get_template_part('template-parts/product-slide');?>
	                      <?php endwhile;?>
                      </div>
                    </div>
                  </div>
           	<?php endif; ?>
           <?php wp_reset_postdata(); ?>

        </section>
	<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php
	$pastriesMenuArgs = array(
		'posts_per_page' => -1,
		'orderby' 	 => 'date',
		'post_type'  => 'pastries_menu',
		'post_status'    => 'publish'
	);

	$pastriesMenuList = new WP_Query( $pastriesMenuArgs );

	if ( $pastriesMenuList->have_posts() ) : ?>
    <!-- Pastries menu -->
    <section class="menu-type pastries-menu indent-top-small indent-bottom-small">
      <div class="bg-pic left-pic-1"><img src="<?php echo THEME_PATH;?>/assets/img/coffee-grain-left.png" alt=""></div>
      <div class="bg-pic left-pic-2"><img src="<?php echo THEME_PATH;?>/assets/img/inner-main-left-pic.png" alt=""></div>
      <div class="bg-pic right-pic-1"><img src="<?php echo THEME_PATH;?>/assets/img/coffee-grain-right.png" alt=""></div>
      <div class="bg-pic right-pic-2"><img src="<?php echo THEME_PATH;?>/assets/img/inner-main-right-pic.png" alt=""></div>
      <div class="container-fluid">
        <div class="row">
          <h2 class="block-title col-12 text-center white-title">pastries menu</h2>
        </div>
        <div class="row">
          <ul class="menu-list col-xl-10 offset-xl-1 col-12 offset-0">
						<?php  while ( $pastriesMenuList->have_posts() ) : $pastriesMenuList->the_post();?>
							<?php get_template_part('template-parts/product-item');?>
						<?php endwhile;?>
          </ul>
        </div>
      </div>
			<?php

				$pastriesBestArgs = array(
					'posts_per_page' => -1,
					'orderby' 	 => 'date',
					'post_type'  => 'pastries_menu',
					'post_status'    => 'publish',
					'tax_query' => [
						[
							'taxonomy' => 'pastries-menu-tax',
							'field' => 'slug',
							'terms' => 'top-sellers',
						]
					],
				);

				$pastriesBestList = new WP_Query( $pastriesBestArgs );

				if ( $pastriesBestList->have_posts() ) : ?>
          <div class="container">
            <div class="row">
              <h2 class="block-title text-center brown-title col-12">best sellers</h2>
            </div>
            <div class="row">
              <div class="best-seller-list product-slider col-12">
								<?php  while ( $pastriesBestList->have_posts() ) : $pastriesBestList->the_post(); ?>
									<?php get_template_part('template-parts/product-slide');?>
								<?php endwhile;?>
              </div>
            </div>
          </div>
				<?php endif; ?>
			<?php wp_reset_postdata(); ?>

    </section>
	<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php get_footer();
