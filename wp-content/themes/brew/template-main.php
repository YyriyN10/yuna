<?php
	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template Main
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package yuna brew
	 *
	 */

	get_header();?>

	<!-- Main screen -->
<?php
	$mainScreenBg = carbon_get_post_meta(get_the_ID(), 'brew_main_screen_bg'.brew_lang_prefix());
	$mainScreenAboutLink = carbon_get_post_meta(get_the_ID(), 'brew_main_screen_about_link'.brew_lang_prefix());
	$mainScreenOrderLink = carbon_get_post_meta(get_the_ID(), 'brew_main_screen_order_link'.brew_lang_prefix());
?>
	<section class="main-screen" style="background-image: url('<?php echo $mainScreenBg;?>')">
	  <div class="container-fluid">
	    <div class="row">
		    <div class="content col-xl-8 col-lg-12 text-center offset-xl-2">
			    <?php the_content();?>
			    <?php if( $mainScreenAboutLink || $mainScreenOrderLink ):?>
				    <div class="btn-wrapper">
					    <?php if( $mainScreenAboutLink ):?>
						    <a href="<?php echo $mainScreenAboutLink;?>" class="button white">About</a>
					    <?php endif;?>
							<?php if( $mainScreenOrderLink ):?>
								<a href="<?php echo $mainScreenOrderLink;?>" class="button brown">Order Now</a>
							<?php endif;?>
				    </div>
			    <?php endif;?>
		    </div>

	    </div>
	  </div>
	</section>

  <!-- Exclusive coffee -->
<?php
  $exclusiveCoffeeTitle = carbon_get_post_meta(get_the_ID(), 'brew_exclusive_block_title'.brew_lang_prefix());
	$exclusiveCoffeeLeftText = carbon_get_post_meta(get_the_ID(), 'brew_exclusive_left_text'.brew_lang_prefix());
	$exclusiveCoffeeRightText = carbon_get_post_meta(get_the_ID(), 'brew_exclusive_right_text'.brew_lang_prefix());
	$exclusiveCoffeeProductList = carbon_get_post_meta(get_the_ID(), 'brew_exclusive_list'.brew_lang_prefix());
	$exclusiveCoffeeMenuLink = carbon_get_post_meta(get_the_ID(), 'brew_exclusive_menu_link'.brew_lang_prefix());

	if ( $exclusiveCoffeeTitle && $exclusiveCoffeeProductList ):
?>
  <section class="exclusive-coffee indent-top-small indent-bottom-small">
    <div class="left-pic block-pic">
      <img src="<?php echo THEME_PATH;?>/assets/img/coffee-grain-left.png" alt="">
    </div>
    <div class="right-pic block-pic">
      <img src="<?php echo THEME_PATH;?>/assets/img/coffee-grain-right.png" alt="">
    </div>
    <div class="container-fluid">
      <?php if( $exclusiveCoffeeLeftText && $exclusiveCoffeeRightText ):?>
        <div class="row">
          <p class="left-text block-text col-md-5"><?php echo $exclusiveCoffeeLeftText;?></p>
          <div class="text-pic col-md-2 col-6 offset-3 offset-md-0">
            <img src="<?php echo THEME_PATH;?>/assets/img/front-coffee-pic.png" alt="">
          </div>
          <p class="right-text block-text col-md-5"><?php echo $exclusiveCoffeeRightText;?></p>
        </div>
      <?php endif;?>
      <?php

      $coffeeExclusiveArgs = array(
        'posts_per_page' => -1,
        'orderby' 	 => 'date',
        'post_type'  => 'coffee_menu',
        'post_status'    => 'publish',
        'tax_query' => [
          [
            'taxonomy' => 'coffee-menu-tax',
            'field' => 'slug',
            'terms' => 'exclusive',
          ]
        ],
      );

      $coffeeExclusiveList = new WP_Query( $coffeeExclusiveArgs );

      if ( $coffeeExclusiveList->have_posts() ) : ?>
        <div class="row">
          <h2 class="col-12 block-title white-title text-center">
            <?php echo $exclusiveCoffeeTitle;?>
          </h2>
        </div>
        <div class="row">
          <div class="product-slider col-xl-10 col-12 offset-xl-1">
	          <?php  while ( $coffeeExclusiveList->have_posts() ) : $coffeeExclusiveList->the_post(); ?>
		          <?php get_template_part('template-parts/product-slide');?>
	          <?php endwhile;?>
          </div>
        </div>
      <?php endif; ?>
	    <?php wp_reset_postdata(); ?>
    </div>
    <?php if( $exclusiveCoffeeMenuLink ):?>
      <a href="<?php echo $exclusiveCoffeeMenuLink;?>" class="button brown go-menu">Menu</a>
    <?php endif;?>

  </section>
<?php endif;?>

  <!-- Our-numbers -->
<?php
  $aboutUsNumbers = carbon_get_post_meta(get_the_ID(), 'brew_about_us_numbers'.brew_lang_prefix());
	$aboutUsText = carbon_get_post_meta(get_the_ID(), 'brew_about_us_text'.brew_lang_prefix());
	$aboutUsImage = carbon_get_post_meta(get_the_ID(), 'brew_about_us_pic'.brew_lang_prefix());

	if ( $aboutUsImage && $aboutUsNumbers && $aboutUsText ):
?>
  <section class="our-numbers indent-top-big indent-bottom-small">
    <button id="get-region">get region</button>
    <div id="region-list"></div>
    <div class="container-fluid">
      <div class="row content">
        <div class="text-content col-xl-5 offset-xl-1 col-lg-6 col-md-7">
          <div class="numbers-list">
            <?php foreach( $aboutUsNumbers as $item ):?>
              <div class="item">
                <p class="number"><?php echo $item['number'];?></p>
                <p class="description"><?php echo $item['description'];?></p>
              </div>
            <?php endforeach;?>

          </div>
          <p class="text"><?php echo $aboutUsText;?></p>
        </div>
        <div class="pic-wrapper col-xl-4 col-md-5 offset-md-0 col-6 offset-3">
          <img src="<?php echo $aboutUsImage;?>" alt="">
        </div>
      </div>
    </div>
  </section>
<?php endif;?>

  <!-- Our clients -->
<?php
  $ourClients = carbon_get_post_meta(get_the_ID(), 'brew_our_client_list'.brew_lang_prefix());

  if ( $ourClients ):
?>
  <section class="our-clients indent-top-small indent-bottom-small">
    <div class="container-fluid">
      <div class="row">
        <div class="content col-12" id="clients-slider">
          <?php foreach( $ourClients as $item ):?>
            <div class="client">
              <img src="<?php echo $item['client'];?>" alt="" class="svg-pic">
            </div>
          <?php endforeach;?>
        </div>
      </div>
    </div>
  </section>
 <?php endif;?>

  <!-- F.A.Q. -->
<?php
  $faqBlockTitle = carbon_get_post_meta(get_the_ID(), 'brew_faq_block_title'.brew_lang_prefix());
	$faqBlockText = carbon_get_post_meta(get_the_ID(), 'brew_faq_left_text'.brew_lang_prefix());
	$faqBlockAboutLink = carbon_get_post_meta(get_the_ID(), 'brew_faq_about_link'.brew_lang_prefix());
	$faqBlockContactLink = carbon_get_post_meta(get_the_ID(), 'brew_faq_contact_link'.brew_lang_prefix());

	$faqSubcat = get_categories( [
		'taxonomy'     => 'faq-cat-tax',
		'type'         => 'brew_faq',
		'child_of'     => false,
		'parent'       => 0,
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 1,
		'hierarchical' => false,
		'number'       => 0,
		'pad_counts'   => false,
	] );


	if ( $faqSubcat ):

?>
  <section class="faq-block indent-top-small indent-bottom-small">
    <div class="container-fluid">
      <div class="row">
        <h2 class="block-title col-12 text-center brown-title"><?php echo $faqBlockTitle;?></h2>
        <p class="text-content text-center col-lg-8 offset-lg-2 col-12"><?php echo $faqBlockText;?></p>
      </div>
      <div class="row">
        <div class="faq-cats col-12 offset-0">
	        <?php foreach( $faqSubcat as $subcat ):?>
            <a href="#" data-subcatslug="<?php echo $subcat->slug;?>" class="cat">
              <span class="cat-title">
                <img src="<?php echo carbon_get_term_meta( $subcat->term_id, 'faq_term_pic'.brew_lang_prefix() ); ?>" alt="" class="svg-pic">
                <span class="cat-name"><?php echo $subcat->name;?></span>
              </span>
              <span class="cut-description"><?php echo $subcat->description;?></span>
              <span class="open-cat-items">
                See all
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
  <path d="M16.75 8.62337C16.75 9.03759 17.0858 9.37337 17.5 9.37337C17.9142 9.37337 18.25 9.03759 18.25 8.62337H16.75ZM11.6667 2.04004C11.2525 2.04004 10.9167 2.37583 10.9167 2.79004C10.9167 3.20425 11.2525 3.54004 11.6667 3.54004V2.04004ZM17.3728 3.42705L18.0411 3.08656L18.0411 3.08656L17.3728 3.42705ZM16.863 2.9172L17.2035 2.24894L17.2035 2.24894L16.863 2.9172ZM16.8637 4.48704C17.1566 4.19414 17.1566 3.71927 16.8637 3.42638C16.5708 3.13348 16.0959 3.13348 15.803 3.42638L16.8637 4.48704ZM9.46967 9.75971C9.17678 10.0526 9.17678 10.5275 9.46967 10.8204C9.76256 11.1133 10.2374 11.1133 10.5303 10.8204L9.46967 9.75971ZM4.05116 17.4804L4.39166 16.8121L4.39166 16.8121L4.05116 17.4804ZM2.80964 16.2389L2.14139 16.5794L2.14139 16.5794L2.80964 16.2389ZM14.6904 16.2389L14.0221 15.8984L14.0221 15.8984L14.6904 16.2389ZM13.4488 17.4804L13.1083 16.8121L13.1083 16.8121L13.4488 17.4804ZM4.05116 5.59968L3.71067 4.93142L3.71067 4.93142L4.05116 5.59968ZM2.80964 6.8412L2.14139 6.50071L2.14139 6.50071L2.80964 6.8412ZM8.75 6.04004C9.16421 6.04004 9.5 5.70425 9.5 5.29004C9.5 4.87583 9.16421 4.54004 8.75 4.54004V6.04004ZM15.75 11.54C15.75 11.1258 15.4142 10.79 15 10.79C14.5858 10.79 14.25 11.1258 14.25 11.54H15.75ZM18.25 8.62337V4.65671H16.75V8.62337H18.25ZM15.6333 2.04004H11.6667V3.54004H15.6333V2.04004ZM18.25 4.65671C18.25 4.34238 18.2506 4.06154 18.2316 3.82937C18.2119 3.58844 18.1675 3.33469 18.0411 3.08656L16.7046 3.76754C16.7053 3.76897 16.7245 3.80335 16.7366 3.95152C16.7494 4.10843 16.75 4.31763 16.75 4.65671H18.25ZM15.6333 3.54004C15.9724 3.54004 16.1816 3.54062 16.3385 3.55344C16.4867 3.56555 16.5211 3.58472 16.5225 3.58545L17.2035 2.24894C16.9553 2.12251 16.7016 2.07811 16.4607 2.05842C16.2285 2.03946 15.9477 2.04004 15.6333 2.04004V3.54004ZM18.0411 3.08656C17.8573 2.72592 17.5641 2.4327 17.2035 2.24894L16.5225 3.58545C16.6009 3.6254 16.6646 3.68914 16.7046 3.76754L18.0411 3.08656ZM15.803 3.42638L9.46967 9.75971L10.5303 10.8204L16.8637 4.48704L15.803 3.42638ZM10.4545 17.04H7.04545V18.54H10.4545V17.04ZM3.25 13.2446V9.83549H1.75V13.2446H3.25ZM7.04545 17.04C6.23755 17.04 5.67673 17.0395 5.24063 17.0038C4.81328 16.9689 4.57216 16.9041 4.39166 16.8121L3.71067 18.1487C4.13787 18.3663 4.59837 18.4563 5.11848 18.4988C5.62983 18.5406 6.2623 18.54 7.04545 18.54V17.04ZM1.75 13.2446C1.75 14.0277 1.74942 14.6602 1.7912 15.1716C1.83369 15.6917 1.92371 16.1522 2.14139 16.5794L3.4779 15.8984C3.38593 15.7179 3.32113 15.4768 3.28621 15.0494C3.25058 14.6133 3.25 14.0525 3.25 13.2446H1.75ZM4.39166 16.8121C3.99823 16.6117 3.67836 16.2918 3.4779 15.8984L2.14139 16.5794C2.48566 17.255 3.035 17.8044 3.71067 18.1487L4.39166 16.8121ZM14.25 13.2446C14.25 14.0525 14.2494 14.6133 14.2138 15.0494C14.1789 15.4768 14.1141 15.7179 14.0221 15.8984L15.3586 16.5794C15.5763 16.1522 15.6663 15.6917 15.7088 15.1716C15.7506 14.6602 15.75 14.0277 15.75 13.2446H14.25ZM10.4545 18.54C11.2377 18.54 11.8702 18.5406 12.3815 18.4988C12.9016 18.4563 13.3621 18.3663 13.7893 18.1487L13.1083 16.8121C12.9278 16.9041 12.6867 16.9689 12.2594 17.0038C11.8233 17.0395 11.2624 17.04 10.4545 17.04V18.54ZM14.0221 15.8984C13.8216 16.2918 13.5018 16.6117 13.1083 16.8121L13.7893 18.1487C14.465 17.8044 15.0143 17.255 15.3586 16.5794L14.0221 15.8984ZM7.04545 4.54004C6.2623 4.54004 5.62983 4.53946 5.11848 4.58123C4.59837 4.62373 4.13787 4.71375 3.71067 4.93142L4.39166 6.26793C4.57216 6.17596 4.81328 6.11117 5.24062 6.07625C5.67673 6.04062 6.23755 6.04004 7.04545 6.04004V4.54004ZM3.25 9.83549C3.25 9.02759 3.25058 8.46677 3.28621 8.03066C3.32113 7.60332 3.38593 7.3622 3.4779 7.1817L2.14139 6.50071C1.92371 6.92791 1.83369 7.38841 1.7912 7.90852C1.74942 8.41987 1.75 9.05234 1.75 9.83549H3.25ZM3.71067 4.93142C3.035 5.2757 2.48566 5.82504 2.14139 6.50071L3.4779 7.1817C3.67836 6.78827 3.99823 6.4684 4.39166 6.26793L3.71067 4.93142ZM7.04545 6.04004H8.75V4.54004H7.04545V6.04004ZM14.25 11.54V13.2446H15.75V11.54H14.25Z" fill="#D3AD7F"/>
</svg>
              </span>
            </a>
	        <?php endforeach;?>
        </div>
      </div>
      <div class="row">
	      <?php if( $faqBlockAboutLink || $faqBlockContactLink ):?>
          <div class="btn-wrapper col-12">
			      <?php if( $faqBlockAboutLink ):?>
              <a href="<?php echo $faqBlockAboutLink;?>" class="button white">About</a>
			      <?php endif;?>
			      <?php if( $faqBlockContactLink ):?>
              <a href="<?php echo $faqBlockContactLink;?>" class="button brown">Contact</a>
			      <?php endif;?>
          </div>
	      <?php endif;?>
      </div>
    </div>
  </section>
<?php endif;?>

  <!-- Guest book -->
   <?php
   	$reviewsArgs = array(
   		'posts_per_page' => -1,
   		'orderby' 	 => 'date',
   		'post_type'  => 'brew_reviews',
   		'post_status'    => 'publish'
   	);

   	$reviewsList = new WP_Query( $reviewsArgs );
   		if ( $reviewsList->have_posts() ) :?>
        <section class="guest-book indent-bottom-big indent-top-small">
          <div class="container-fluid">
            <div class="row">
              <h2 class="block-title white-title col-12 text-center">OUR GUESTBOOK</h2>
            </div>
            <div class="row">
              <div class="content col-12" id="guest-book-slider">

              <?php  while ( $reviewsList->have_posts() ) : $reviewsList->the_post(); ?>
                <div class="slide">
                  <div class="inner">
                    <svg class="quotes" xmlns="http://www.w3.org/2000/svg" width="49" height="40" viewBox="0 0 49 40" fill="none">
                      <path d="M19.9223 22.5812V40H0.337891V26.2455C0.337891 18.8087 1.42591 13.4116 3.58383 10.0903C6.43083 5.63177 10.928 2.27437 17.0753 0L21.5362 5.83033C17.8188 7.11191 15.0806 9.00722 13.3216 11.5343C11.5627 14.0614 10.5835 17.7437 10.384 22.5812H19.9223Z" fill="black"/>
                      <path d="M46.7059 22.5812V40H27.1396V26.2455C27.1396 18.8086 28.2277 13.4115 30.3856 10.0722C33.2326 5.63175 37.7298 2.27435 43.8771 -0.0180664L48.338 5.81226C44.6206 7.09385 41.8824 8.98915 40.1234 11.5162C38.3644 14.0433 37.3852 17.7256 37.1857 22.5632H46.7241L46.7059 22.5812Z" fill="black"/>
                    </svg>
	                  <?php the_content();?>
                  </div>

                  <div class="avatar">
                    <img src="<?php the_post_thumbnail_url();?>" alt="">
                  </div>
                  <p class="name"><?php the_title();?></p>
                  <p class="position"><?php echo carbon_get_post_meta(get_the_ID(), 'brew_reviews_position'.brew_lang_prefix());?></p>

                </div>

              <?php endwhile;?>
              </div>
            </div>
          </div>
        </section>
   	<?php endif; ?>
   <?php wp_reset_postdata(); ?>

<?php get_template_part('template-parts/block', 'map');?>

<?php get_template_part('template-parts/block', 'contact-form');?>

<?php get_footer();
