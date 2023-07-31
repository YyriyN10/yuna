<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Yuna
 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

get_header();

	$innerPageDefaultMainPic = carbon_get_theme_option('yuna_default_inner_page_main_pic');
?>
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>

				<header class="page-main-screen" style="background-image: url('<?php echo esc_url($innerPageDefaultMainPic);?>')">
          <div class="container">
            <div class="row">
              <div class="content col-12">
                <h1 class="page-title"><?php wp_title(''); ?></h1>
              </div>
            </div>
          </div>
				</header>
		<?php endif;?>
    <section class="yuna-content-wrapper">
      <div class="container">
        <div class="row">
          <div class="yuna-post-list col-lg-8">

          <?php while ( have_posts() ) :
          the_post();

          /*
          * Include the Post-Type-specific template for the content.
          * If you want to override this in a child theme, then include a file
          * called content-___.php (where ___ is the Post Type name) and that will be used instead.
          */
          get_template_part( 'template-parts/content', get_post_type() );

        endwhile;

          the_posts_navigation(array(
	          'prev_text'          => __( 'Forward', 'yuna'),
	          'next_text'          => __( 'Back', 'yuna'),
          ));

        else :

          get_template_part( 'template-parts/content', 'none' );

            endif;
        ?>
          </div>
          <div class="yuna-sidebar-wrapper col-lg-4">
            <?php get_sidebar(); ?>
          </div>
        </div>
      </div>

    </section>


<?php


get_footer();
