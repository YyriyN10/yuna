<?php

	add_action( 'admin_menu', 'brew_crm');

	function brew_crm(){

		add_menu_page(
			__('Brew CRM', 'brew'),
			__('Brew CRM', 'brew'),
			'manage_options',
			'menu_brew_crm',
			'render_brew_crm',
			'dashicons-store'
		);

		function render_brew_crm(){

			require get_template_directory() . '/inc/crm/crm-main-page.php';
		}



	}
