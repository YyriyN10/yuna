<?php

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template post type: brew_news
	 *
	 * Template name: Template Post
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package yuna brew
	 *
	 */

	get_header();?>

	<!-- Main screen -->
	<section class="main-screen" style="background-image: url('<?php the_post_thumbnail_url();?>')">
		<div class="container">
			<div class="row content">
				<h1 class="col-12 text-center"><?php the_title();?></h1>
				<p class="date col-12 text-center"><?php echo get_the_date();?></p>
			</div>
		</div>
	</section>

	<!-- Post wrapper -->
	<section class="post-wrapper indent-top-big indent-bottom-big">
	  <div class="container">
	    <div class="row">
	      <div class="content col-12">
	        <?php the_content();?>
	      </div>
	    </div>
	  </div>
	</section>
<?php get_footer();
