<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	// F.A.Q. modal

	add_action('wp_ajax_faq_question_cat', 'faq_question_cat_callback');
	add_action('wp_ajax_nopriv_faq_question_cat', 'faq_question_cat_callback');

	function faq_question_cat_callback(){

	$questionSlug = $_POST['questionSlug'];

	$faqInnerArgs = array(
		'posts_per_page' => -1,
		'orderby' 	 => 'date',
		'post_type'  => 'brew_faq',
		'post_status'    => 'publish',
		'tax_query' => [
			[
				'taxonomy' => 'faq-cat-tax',
				'field' => 'slug',
				'terms' => $questionSlug,
			]
		],
	);

	$faqInnerList = new WP_Query( $faqInnerArgs );

	if ( $faqInnerList->have_posts() ) : ?>
		<div id="faq-accordion">

			<?php  while ( $faqInnerList->have_posts() ) : $faqInnerList->the_post(); ?>

				<div class="card">
					<div class="card-header">
						<a class="card-link collapsed" data-toggle="collapse" href="#collapse<?php the_ID();?>">
							<?php the_title();?>
							<button class="state">
								<span></span><span></span>
							</button>
						</a>
					</div>
					<div id="collapse<?php the_ID();?>" class="collapse" data-parent="#faq-accordion">
						<div class="card-body">
							<?php the_content();?>
						</div>
					</div>
				</div>

			<?php endwhile;?>

		</div>

	<?php endif;

	wp_reset_postdata();

	wp_die();

	}

	// Order modal

	add_action('wp_ajax_cart_order_list', 'cart_order_list_callback');
	add_action('wp_ajax_nopriv_cart_order_list', 'cart_order_list_callback');

	function cart_order_list_callback(){

		$productOrderList = $_POST['productOrderList'];

		$orderArgs = array(
			'posts_per_page' => -1,
			'orderby' 	 => 'date',
			'post_type'  => ['coffee_menu', 'pastries_menu'],
			'post_status'    => 'publish',
			'post__in'  => $productOrderList,
		);

		$orderList = new WP_Query( $orderArgs );

		if ( $orderList->have_posts() ) : ?>

				<?php  while ( $orderList->have_posts() ) : $orderList->the_post(); ?>

          <li class="order-item" data-productid="<?php the_ID();?>">
            <p class="product-name"><?php the_title();?></p>
            <div class="product-count-wrapper">
              <button class="count-btn count-down">-</button>
              <input type="number" class="product-count" value="1">
              <button class="count-btn count-up">+</button>
            </div>
            <?php
              $productPrice = str_replace('$', '', carbon_get_post_meta( get_the_ID(),'brew_product_price'.brew_lang_prefix()));
            ?>
            <p class="product-price" data-price="<?php echo $productPrice;?>">
              <span class="currency">$</span>
              <span class="price">
                <?php echo $productPrice;?>
              </span>
            </p>
            <button class="remove-product">
              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.88px" height="122.879px" viewBox="0 0 122.88 122.879" enable-background="new 0 0 122.88 122.879" xml:space="preserve">
                  <g>
                    <path fill="#FF4141" d="M61.44,0c16.96,0,32.328,6.882,43.453,17.986c11.104,11.125,17.986,26.494,17.986,43.453 c0,16.961-6.883,32.328-17.986,43.453C93.769,115.998,78.4,122.879,61.44,122.879c-16.96,0-32.329-6.881-43.454-17.986 C6.882,93.768,0,78.4,0,61.439C0,44.48,6.882,29.111,17.986,17.986C29.112,6.882,44.48,0,61.44,0L61.44,0z M73.452,39.152 c2.75-2.792,7.221-2.805,9.986-0.026c2.764,2.776,2.775,7.292,0.027,10.083L71.4,61.445l12.077,12.25 c2.728,2.77,2.689,7.256-0.081,10.021c-2.772,2.766-7.229,2.758-9.954-0.012L61.445,71.541L49.428,83.729 c-2.75,2.793-7.22,2.805-9.985,0.025c-2.763-2.775-2.776-7.291-0.026-10.082L51.48,61.435l-12.078-12.25 c-2.726-2.769-2.689-7.256,0.082-10.022c2.772-2.765,7.229-2.758,9.954,0.013L61.435,51.34L73.452,39.152L73.452,39.152z M96.899,25.98C87.826,16.907,75.29,11.296,61.44,11.296c-13.851,0-26.387,5.611-35.46,14.685 c-9.073,9.073-14.684,21.609-14.684,35.459s5.611,26.387,14.684,35.459c9.073,9.074,21.609,14.686,35.46,14.686 c13.85,0,26.386-5.611,35.459-14.686c9.073-9.072,14.684-21.609,14.684-35.459S105.973,35.054,96.899,25.98L96.899,25.98z"/>
                  </g>
                </svg>
            </button>
          </li>

				<?php endwhile;?>

		<?php endif;

		wp_reset_postdata();

		wp_die();

	}