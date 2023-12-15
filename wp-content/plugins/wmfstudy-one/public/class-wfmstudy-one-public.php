<?php

	class Wfmstudy_One_Public{

		public function __construct(){

			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts_styles' ));

			add_filter( 'the_content', array( $this, 'add_slide' ) );

		}

		public function enqueue_scripts_styles(){

			if ( ! is_single() ) {
				return;
			}

			wp_enqueue_style('public-wfmstudy-one-styles', WFM_STUDY_ONE_URL . 'public/css/public-wfmstudy-one.css');

			wp_enqueue_script('public-wfmstudy-one-js', WFM_STUDY_ONE_URL . 'public/js/public-wfmstudy-one.js', array('jquery'), false, true);
		}

		public function add_slide( $content ) {

			if ( ! is_single() ) {

				return $content;
			}


			global $post;

			$slide_id = get_post_meta( $post->ID, 'wfmstudy_one', true );

			if ( ! $slide_id ) {

				return $content;
			}

			$slide = $this->get_slide( $slide_id );

			ob_start();

			require WFM_STUDY_ONE_DIR . 'public/templates/slide-template.php';

			$slide_html = ob_get_clean();


			return $content . $slide_html;
		}

		public function get_slide( $slide_id ) {

			global $wpdb;

			return $wpdb->get_row( "SELECT * FROM `{$wpdb->prefix}wfmstudy_one` WHERE id = $slide_id", ARRAY_A );
		}
	}
