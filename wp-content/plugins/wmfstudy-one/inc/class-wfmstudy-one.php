<?php

	class Wfmstudy_One{

		public function __construct(){

			$this->load_dependence();

			$this->define_admin_hooks();

			$this->define_public_hooks();
		}

		private function load_dependence(){

			require WFM_STUDY_ONE_DIR . 'admin/class-wfmstudy-one-admin.php';

			require WFM_STUDY_ONE_DIR . 'public/class-wfmstudy-one-public.php';

		}

		private function define_admin_hooks(){

			$plugin_admin = new Wfmstudy_One_Admin();

		}

		private function define_public_hooks(){

			$plugin_public = new Wfmstudy_One_Public();

		}
	}
