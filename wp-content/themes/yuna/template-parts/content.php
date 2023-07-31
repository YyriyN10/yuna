<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Yuna
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">
		      <?php
			      if ( !is_singular() ) :
				      the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

				      if ( 'post' === get_post_type() ) :
					      ?>
                <div class="entry-meta">
						      <?php
							      yuna_posted_on();
							      yuna_posted_by();
						      ?>
                </div><!-- .entry-meta -->
				      <?php endif;
			      endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
		      <?php
            if ( is_singular()):?>
              <div class="container">
                <div class="row">
                  <div class="content col-xl-8 col-lg-10 col-12 offset-xl-2 offset-lg-1 offset-0">
                    <?php
	                    the_content(
		                    sprintf(
			                    wp_kses(

				                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'yuna' ),
				                    array(
					                    'span' => array(
						                    'class' => array(),
					                    ),
				                    )
			                    ),
			                    wp_kses_post( get_the_title() )
		                    )
	                    );

	                    wp_link_pages(
		                    array(
			                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'yuna' ),
			                    'after'  => '</div>',
		                    )
	                    );
                    ?>
                  </div>
                </div>
              </div>

           <?php else :
              the_excerpt();
            endif;

		      ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
          <?php if( is_singular() ):?>
            <div class="container">
              <div class="row">
                <div class="col-12 content text-center">
	                <?php yuna_entry_footer(); ?>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
	                <?php
		                the_post_navigation(
			                array(
				                'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 267 512.43"><path fill-rule="nonzero" d="M263.78 18.9c4.28-4.3 4.3-11.31.04-15.64a10.865 10.865 0 0 0-15.48-.04L3.22 248.38c-4.28 4.3-4.3 11.31-.04 15.64l245.16 245.2c4.28 4.3 11.22 4.28 15.48-.05s4.24-11.33-.04-15.63L26.5 256.22 263.78 18.9z"/></svg> <span class="nav-title">%title</span>',
				                'next_text' => '<span class="nav-title">%title</span> <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 267 512.43"><path fill-rule="nonzero" d="M3.22 18.9c-4.28-4.3-4.3-11.31-.04-15.64s11.2-4.35 15.48-.04l245.12 245.16c4.28 4.3 4.3 11.31.04 15.64L18.66 509.22a10.874 10.874 0 0 1-15.48-.05c-4.26-4.33-4.24-11.33.04-15.63L240.5 256.22 3.22 18.9z"/></svg>',
			                )
		                );
	                ?>
                </div>
              </div>
            </div>
          <?php else :?>
            <a href="<?php the_permalink();?>" class="button"><?php echo esc_html__('More', 'yuna');?></a>
          <?php endif;?>

        </footer><!-- .entry-footer -->


</article><!-- #post-<?php the_ID(); ?> -->
