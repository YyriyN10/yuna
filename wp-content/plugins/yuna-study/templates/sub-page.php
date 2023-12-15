<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Don't access directly.
	};

?>

<div class="wrap">
	<h1><?php _e('Sub Yuna Options Page', 'yuna-study');?></h1>

	<?php settings_errors();?>

  <form action="options.php" method="post">

		<?php settings_fields('yuna_test_option_group2');?>

		<?php do_settings_sections('yuna-sub-options');?>

		<?php submit_button();?>

  </form>
</div>