<div class="item">
	<div class="product-pic">
		<img src="<?php the_post_thumbnail_url();?>" alt="">
	</div>
	<p class="name"><?php the_title();?></p>
	<div class="description"><?php the_content();?></div>
	<p class="price"><?php echo carbon_get_post_meta( get_the_ID(),'brew_product_price'.brew_lang_prefix());?></p>
</div>