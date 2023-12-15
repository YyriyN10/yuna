<!-- Map -->
<?php
	$brewMap = carbon_get_theme_option('brew_map');
?>
<section class="map" id="map" data-lat="<?php echo $brewMap['lat'];?>" data-lng="<?php echo $brewMap['lng'];?>">
	<div class="contacts-wrapper">
		<dl>
			<dt>Address</dt>
			<dd><?php echo carbon_get_theme_option('brew_address');?></dd>
		</dl>

		<dl>
			<dt>Email</dt>
			<dd><?php echo carbon_get_theme_option('brew_email');?></dd>
			<dt>Phone number</dt>
			<dd><?php echo carbon_get_theme_option('brew_phone');?></dd>
		</dl>

	</div>
</section>