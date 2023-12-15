<!-- Contact form -->
<?php
	$contactFormTitle = carbon_get_post_meta(get_the_ID(), 'brew_contact_form_block_title'.brew_lang_prefix());
	$contactFormText = carbon_get_post_meta(get_the_ID(), 'brew_contact_form_text'.brew_lang_prefix());

	if ( $contactFormTitle ):
		?>
		<section class="contact-form indent-top-big indent-bottom-small">
			<div class="bg-pic pic-left">
				<img src="<?php echo THEME_PATH;?>/assets/img/cf-left-pic.png" alt="">
			</div>
			<div class="bg-pic pic-right">
				<img src="<?php echo THEME_PATH;?>/assets/img/cf-right-pic.png" alt="">
			</div>
			<div class="container">
				<div class="row">
					<h2 class="block-title brown-title col-12 text-center"><?php echo $contactFormTitle;?></h2>
					<?php if( $contactFormText ):?>
						<p class="col-12 text text-center"><?php echo $contactFormText;?></p>
					<?php endif;?>
				</div>
				<div class="row">
					<form class="col-12" method="post" action="/action_page.php">
						<div class="form-group">
							<input name="name" type="text" class="form-control" placeholder="Full Name">
						</div>
						<div class="form-group">
							<input name="email" type="email" class="form-control" placeholder="Email">
						</div>
						<div class="form-group textarea-group">
							<textarea name="message" class="form-control" placeholder="Message"></textarea>
						</div>

						<button type="submit" class="button brown">Submit</button>
					</form>
				</div>
			</div>
		</section>
	<?php endif;?>