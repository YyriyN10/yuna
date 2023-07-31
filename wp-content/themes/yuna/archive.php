<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Yuna
 */

get_header();

	$innerPageDefaultMainPic = carbon_get_theme_option('yuna_default_inner_page_main_pic');
?>

		<?php if ( have_posts() ) : ?>
      <header class="page-main-screen" style="background-image: url('<?php echo esc_url($innerPageDefaultMainPic);?>')">
        <div class="container">
          <div class="row">
            <div class="content col-12">
	            <?php
		            the_archive_title( '<h1 class="page-title">', '</h1>' );
		            the_archive_description( '<div class="archive-description">', '</div>' );
	            ?>
            </div>
          </div>
        </div>
      </header>

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
                  'prev_text'          => __( 'Forward', 'yuna' ),
                  'next_text'          => __( 'Back', 'yuna' ),
                ));

              else :

               get_template_part( 'template-parts/content', 'none' );

              endif; ?>
            </div>
            <div class="yuna-sidebar-wrapper col-lg-4">
              <?php get_sidebar(); ?>
            </div>
          </div>
        </div>
      </section>
<?php

get_footer();
