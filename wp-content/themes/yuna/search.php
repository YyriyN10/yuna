<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
              <h1 class="page-title">
	              <?php

		              printf( esc_html__( 'Search Results for: %s', 'yuna' ), '<span>' . get_search_query() . '</span>' );
	              ?>
              </h1>
            </div>
          </div>
        </div>
      </header>
      <section class="yuna-content-wrapper">
        <div class="container">
          <div class="row">
            <div class="yuna-post-list col-lg-8">

              <?php
                /* Start the Loop */
                while ( have_posts() ) :
                  the_post();

                  /**
                   * Run the loop for the search to output the results.
                   * If you want to overload this in a child theme then include a file
                   * called content-search.php and that will be used instead.
                   */
                  get_template_part( 'template-parts/content', 'search' );

                endwhile;

                  the_posts_navigation();

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
