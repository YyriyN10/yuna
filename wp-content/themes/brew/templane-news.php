<?php
	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template News
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package yuna brew
	 *
	 */

	get_header();?>

<?php get_template_part('template-parts/block', 'main-inner');?>

	<!-- Our news -->
	<section class="our-news indent-top-big indent-bottom-small">
	  <div class="container-fluid">
	    <div class="row">
	      <h2 class="block-title col-12 text-center white-title">news feed</h2>
	    </div>
	    <div class="row justify-content-center">
		     <?php
		     	$newsArgs = array(
		     		'posts_per_page' => -1,
		     		'orderby' 	 => 'date',
		     		'post_type'  => 'brew_news',
		     		'post_status'    => 'publish'
		     	);

		     	$newsList = new WP_Query( $newsArgs );

		     		  if ( $newsList->have_posts() ) :

		     			  while ( $newsList->have_posts() ) : $newsList->the_post();
		     		?>
					     <a href="<?php the_permalink();?>" class="item col-lg-4 col-sm-6 col-12">
                 <span class="inner">
                   <span class="thumbnail" style="background-image: url('<?php the_post_thumbnail_url();?>')">

						     </span>
                 <span class="inner-info">
                   <p class="date"><?php echo get_the_date();?></p>
						       <h3 class="title"><?php the_title();?></h3>
						       <span class="description"><?php the_excerpt();?></span>
                 </span>
                   <button class="more button brown">More</button>
                 </span>


					     </a>

		     		<?php endwhile;?>
		     	<?php endif; ?>
		     <?php wp_reset_postdata(); ?>
	    </div>
	  </div>
	</section>

<?php get_footer();
