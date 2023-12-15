<?php

	class Wfmstudy_One_Admin{

		public function __construct(){

			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts_styles' ));

			add_action( 'admin_menu', array( $this, 'admin_menu'));

			add_action( 'admin_post_save_slide', array( $this, 'save_slide'));

			add_action( 'wp_ajax_wfmstudy_one_ch_slides', array( $this, 'callback_ch_slides'));

		}

		static function debug( $data ){
			echo '<pre>'.print_r($data, 1).'</pre>';
		}

		public function save_slide(){

			if ( ! isset( $_POST['wfmstudy_one_add_slide']) || ! wp_verify_nonce( $_POST['wfmstudy_one_add_slide'], 'wfmstudy_one_action')){

				wp_die( __('Error', WFM_STUDY_ONE));
			}

			$slide_title = isset( $_POST['slide_title'] ) ? trim( $_POST['slide_title'] ) : '';
			$slide_content = isset( $_POST['slide_content'] ) ? trim( $_POST['slide_content'] ) : '';
			$slide_id = isset( $_POST['slide_id'] ) ? (int) $_POST['slide_id']  : 0;

			if ( empty( $slide_title ) || empty( $slide_content ) ){

				set_transient('wfmstudy_one_error', __( 'Form fields are required', WFM_STUDY_ONE), 30);
			}else{

				$slide_title = wp_unslash( $slide_title );
				$slide_content = wp_unslash( $slide_content );
				$slide_id = wp_unslash( $slide_id );

				global $wpdb;

				if ( $slide_id ){
					$query = "UPDATE `{$wpdb->prefix}wfmstudy_one` SET title = %s, content = %s WHERE id = $slide_id";
				}else{
					$query = "INSERT INTO `{$wpdb->prefix}wfmstudy_one` (title, content) VALUES (%s, %s)";
				}

				if ( $wpdb->query( $wpdb->prepare(
					$query, $slide_title, $slide_content
				))){
					set_transient('wfmstudy_one_success', __( 'Slide added', WFM_STUDY_ONE), 10);
				}else{
					set_transient('wfmstudy_one_error', __( 'Error saving slide', WFM_STUDY_ONE), 30);
				}
			}

			wp_redirect( $_POST['_wp_http_referer'] );
		}

		public static function get_slides( $all = false ) {

			global $wpdb;

			if ( $all ) {

				return $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}wfmstudy_one` ORDER BY title ASC", ARRAY_A );
			}

			$slides = $wpdb->get_results( "SELECT id, title FROM `{$wpdb->prefix}wfmstudy_one` ORDER BY title ASC", ARRAY_A );

			$data = array();

			foreach ( $slides as $slide ) {

				$data[$slide['id']] = $slide['title'];

			}

			return $data;
		}

		public function enqueue_scripts_styles(){
			wp_enqueue_style( 'admin-wfmstudy-one-jquery-ui', WFM_STUDY_ONE_URL . 'admin/assets/jquery-ui-accordion/jquery-ui.min.css' );
			wp_enqueue_style('admin-wfmstudy-one-styles', WFM_STUDY_ONE_URL . 'admin/css/admin-wfmstudy-one.css');


			wp_register_script( 'admin-wfmstudy-one-jquery-ui', WFM_STUDY_ONE_URL . 'admin/assets/jquery-ui-accordion/jquery-ui.min.js' );
			wp_enqueue_script('admin-wfmstudy-one-js', WFM_STUDY_ONE_URL . 'admin/js/admin-wfmstudy-one.js', array('jquery', 'admin-wfmstudy-one-jquery-ui'));

			wp_localize_script('admin-wfmstudy-one-js', 'wfmStudyOne', array( 'nance'=>wp_create_nonce('wfmstudy_one_action')));
		}

		public function admin_menu(){

			add_menu_page(
				__('Wfmstudy One Main', WFM_STUDY_ONE ),
				__('Wfmstudy One', WFM_STUDY_ONE ),
				'manage_options',
				'wfmstudy-one-main',
				array( $this, 'render_main_page'),
				'dashicons-slides'
			);

			add_submenu_page('wfmstudy-one-main', __('Wfmstudy One Main', WFM_STUDY_ONE ), __('Set Slide', WFM_STUDY_ONE ), 'manage_options', 'wfmstudy-one-main');

			add_submenu_page('wfmstudy-one-main', __('Slides Management', WFM_STUDY_ONE ), __('Slides Management', WFM_STUDY_ONE ), 'manage_options', 'wfmstudy-one-slides-management', array($this, 'render_slides_management'));
		}

		public function render_main_page(){

			require WFM_STUDY_ONE_DIR . 'admin/templates/main-page-template.php';
		}

		public function render_slides_management(){

			require WFM_STUDY_ONE_DIR . 'admin/templates/management-page-template.php';
		}

		public static function get_posts(){

			return new WP_Query( array(
				'post_type' => 'post',
				'post_per_page' => 10,
				'orderby' => 'date',
				'order' => 'DESC',
				'paged' => $_GET['paged'] ?? 1,
			));
		}

		public function callback_ch_slides(){

			if ( ! isset( $_POST['wfmstudy_one_ch_slides']) || ! wp_verify_nonce( $_POST['wfmstudy_one_ch_slides'], 'wfmstudy_one_action')){

				echo json_encode( array( 'answer' => 'Error', 'text' => __('Security error', WFM_STUDY_ONE )));
				wp_die();
			}

			$slideId = isset( $_POST['slideId']) ? (int) $_POST['slideId'] : 0;
			$postId = isset( $_POST['postId']) ? (int) $_POST['postId'] : 0;

			if ( ! $postId ){
				echo json_encode( array( 'answer' => 'Error', 'text' => __('Error post ID', WFM_STUDY_ONE )));
				wp_die();
			}

			if ( $slideId ){

				if ( update_post_meta($postId, 'wfmstudy_one', $slideId)){
					echo json_encode( array( 'answer' => 'Success', 'text' => __('Save successfull', WFM_STUDY_ONE )));
				}else{
					echo json_encode( array( 'answer' => 'Error', 'text' => __('Save error', WFM_STUDY_ONE )));
				}

			}else{
				delete_post_meta($postId, 'wfmstudy_one');
			}
		}


	}
