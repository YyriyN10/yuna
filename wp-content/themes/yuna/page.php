<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Yuna
 */

get_header();
?>

		<?php
		while ( have_posts() ) :
			the_post();

			$postThumbnail = get_the_post_thumbnail_url();

			if ( $postThumbnail == ''){
				$postThumbnail = carbon_get_theme_option('yuna_default_inner_page_main_pic');
			}

			?>

			<section class="page-main-screen" style="background-image: url(<?php echo esc_url($postThumbnail);?>)">
				<div class="container">
					<div class="row">
						<div class="content col-12 text-cener">
							<h1 class="page-title"><?php the_title();?></h1>
						</div>
					</div>
				</div>
			</section>
			<section class="yuna-content-wrapper">
				<div class="container">
					<div class="row">
						<div class="yuna-post-list col-lg-8">
							<?php get_template_part( 'template-parts/content', 'page' );?>
						</div>
            <div class="yuna-sidebar-wrapper col-lg-4">
              <?php get_sidebar(); ?>
            </div>
        </div>
      </div>

    </section>

			<?php // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :?>
				<div class="comments-wrapper">
					<div class="container">
						<div class="row">
							<div class="content col-12">
								<?php comments_template();?>
							</div>
						</div>
					</div>
				</div>
			<?php endif;

		endwhile; // End of the loop.
		?>



<?php
get_sidebar();
get_footer();
