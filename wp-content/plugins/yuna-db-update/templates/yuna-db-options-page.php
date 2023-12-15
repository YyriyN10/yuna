<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Don't access directly.
	}

	?>

<div class="wrap">
	<h1><?php _e('Yuna DB Update Options Page', YUNA_TD );?></h1>

	<?php settings_errors();?>

	<form action="options.php" method="post">

		<?php settings_fields('yuna_db_update_main_option_group');?>

		<?php do_settings_sections('yuna-db-update-options');?>

		<?php submit_button();?>

	</form>
</div>
