<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Yuna
 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	$siteHeaderLogo = carbon_get_theme_option( 'yuna_site_header_logo' );
	$multiLangOption = carbon_get_theme_option( 'yuna_multi_language' );
	$sitePhone = carbon_get_theme_option( 'yuna_phone_number' );
	$siteAccentColor = carbon_get_theme_option('yuna_accent_color');
	$headerBgColor = carbon_get_theme_option('yuna_header_bg_color');
	$goTopBtnBGColor = carbon_get_theme_option('yuna_btn_go_top_bg_color');

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

  <style>
    .site-header .header-menu li a:hover{
      color: <?php echo $siteAccentColor;?> !important;
    }

    .yuna-sidebar-wrapper .widget.widget_tag_cloud a,
    .post-template-default p a, .page-template-default p a {
      color: <?php echo $siteAccentColor;?> !important;
    }

    .comment-form .submit{
      background-color: <?php echo $siteAccentColor;?>;
    }


  </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper" id="top">
  <!--<div class="load" id="loader"></div>-->
  <?php if( $siteHeaderLogo ):?>
    <header class="site-header" <?php if( $headerBgColor != 'rgba(0,0,0,0)' && $headerBgColor != '' ):?>
      style="background-color: <?php echo $headerBgColor;?>"
    <?php endif;?>>
      <div class="container">
        <div class="row">
          <div class="content col-12">
            <?php if( is_front_page() ):?>
              <div class="logo">
                <img src="<?php echo esc_url($siteHeaderLogo);?>" alt="">
              </div>
            <?php else:?>
              <a href="<?php echo esc_url(get_home_url('/'));?>" class="logo">
                <img src="<?php echo esc_url($siteHeaderLogo);?>" alt="">
              </a>
            <?php endif;?>
            <?php if( !is_404() ):?>
              <nav class="header-nav">
                <?php
                  wp_nav_menu(
                    array(
                      'theme_location' => 'Header_menu',
                      'container'      => false,
                      'menu_id'        => 'header-menu',
                      'menu_class'     => 'header-menu'
                    )
                  );
                ?>
                <?php if( $sitePhone ): $phoneToColl = preg_replace( '/[^0-9]/', '', $sitePhone);?>
                  <a href="tel:<?php echo esc_html($phoneToColl);?>" class="header-phone table-phone">
                    <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.27" style="enable-background:new 0 0 122.88 122.27" xml:space="preserve"><g><path fill="<?php echo $siteAccentColor;?>" d="M33.84,50.25c4.13,7.45,8.89,14.6,15.07,21.12c6.2,6.56,13.91,12.53,23.89,17.63c0.74,0.36,1.44,0.36,2.07,0.11 c0.95-0.36,1.92-1.15,2.87-2.1c0.74-0.74,1.66-1.92,2.62-3.21c3.84-5.05,8.59-11.32,15.3-8.18c0.15,0.07,0.26,0.15,0.41,0.21 l22.38,12.87c0.07,0.04,0.15,0.11,0.21,0.15c2.95,2.03,4.17,5.16,4.2,8.71c0,3.61-1.33,7.67-3.28,11.1 c-2.58,4.53-6.38,7.53-10.76,9.51c-4.17,1.92-8.81,2.95-13.27,3.61c-7,1.03-13.56,0.37-20.27-1.69 c-6.56-2.03-13.17-5.38-20.39-9.84l-0.53-0.34c-3.31-2.07-6.89-4.28-10.4-6.89C31.12,93.32,18.03,79.31,9.5,63.89 C2.35,50.95-1.55,36.98,0.58,23.67c1.18-7.3,4.31-13.94,9.77-18.32c4.76-3.84,11.17-5.94,19.47-5.2c0.95,0.07,1.8,0.62,2.25,1.44 l14.35,24.26c2.1,2.72,2.36,5.42,1.21,8.12c-0.95,2.21-2.87,4.25-5.49,6.15c-0.77,0.66-1.69,1.33-2.66,2.03 c-3.21,2.33-6.86,5.02-5.61,8.18L33.84,50.25L33.84,50.25L33.84,50.25z"/></g>
                      </svg>

                    <span class="text-wrapper"><?php echo esc_html($sitePhone);?></span>

                  </a>
                <?php endif;?>
              </nav>
              <button class="menu-btn" id="menu-btn">
                <span></span><span></span><span></span>
              </button>
              <?php if( $sitePhone ): $phoneToColl = preg_replace( '/[^0-9]/', '', $sitePhone);?>
                <a href="tel:<?php echo esc_html($phoneToColl);?>" class="header-phone desc-phone">
                  <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.27" style="enable-background:new 0 0 122.88 122.27" xml:space="preserve"><g><path fill="<?php echo $siteAccentColor;?>" d="M33.84,50.25c4.13,7.45,8.89,14.6,15.07,21.12c6.2,6.56,13.91,12.53,23.89,17.63c0.74,0.36,1.44,0.36,2.07,0.11 c0.95-0.36,1.92-1.15,2.87-2.1c0.74-0.74,1.66-1.92,2.62-3.21c3.84-5.05,8.59-11.32,15.3-8.18c0.15,0.07,0.26,0.15,0.41,0.21 l22.38,12.87c0.07,0.04,0.15,0.11,0.21,0.15c2.95,2.03,4.17,5.16,4.2,8.71c0,3.61-1.33,7.67-3.28,11.1 c-2.58,4.53-6.38,7.53-10.76,9.51c-4.17,1.92-8.81,2.95-13.27,3.61c-7,1.03-13.56,0.37-20.27-1.69 c-6.56-2.03-13.17-5.38-20.39-9.84l-0.53-0.34c-3.31-2.07-6.89-4.28-10.4-6.89C31.12,93.32,18.03,79.31,9.5,63.89 C2.35,50.95-1.55,36.98,0.58,23.67c1.18-7.3,4.31-13.94,9.77-18.32c4.76-3.84,11.17-5.94,19.47-5.2c0.95,0.07,1.8,0.62,2.25,1.44 l14.35,24.26c2.1,2.72,2.36,5.42,1.21,8.12c-0.95,2.21-2.87,4.25-5.49,6.15c-0.77,0.66-1.69,1.33-2.66,2.03 c-3.21,2.33-6.86,5.02-5.61,8.18L33.84,50.25L33.84,50.25L33.84,50.25z"/></g>
                      </svg>
                  <span class="text-wrapper"><?php echo esc_html($sitePhone);?></span>

                </a>
              <?php endif;?>

              <?php /*if( $multiLangOption == 'yes' ):*/?><!--
                <div class="lang-wrapper">
                  <a href="#" class="active-lang">
                    <img src="" alt="">
                    <span></span>
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </a>
                  <ul class="lang-list" id="lang-list">
                    <?php
  /*					          $langArgs = array(
                        'show_names' => 1,
                        'display_names_as' => 'slug',
                        'show_flags' => 1,
                        'hide_current' => 0,
                      );

                      pll_the_languages($langArgs);
                    */?>
                  </ul>
                </div>
              --><?php /*endif;*/?>
            <?php endif;?>


          </div>
        </div>
      </div>
    </header><!-- #masthead -->
  <?php endif;?>
  <main>
    <a href="#top" class="go-top-btn d-none scroll-to" <?php if( $goTopBtnBGColor != 'rgba(0,0,0,0)' && $goTopBtnBGColor != '' ):?>
      style="background-color: <?php echo $goTopBtnBGColor;?>"
    <?php endif;?>>
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 66.91" xml:space="preserve"><g><path fill="<?php echo $siteAccentColor;?>" d="M11.68,64.96c-2.72,2.65-7.08,2.59-9.73-0.14c-2.65-2.72-2.59-7.08,0.13-9.73L56.87,1.97l4.8,4.93l-4.81-4.95 c2.74-2.65,7.1-2.58,9.76,0.15c0.08,0.08,0.15,0.16,0.23,0.24L120.8,55.1c2.72,2.65,2.78,7.01,0.13,9.73 c-2.65,2.72-7,2.78-9.73,0.14L61.65,16.5L11.68,64.96L11.68,64.96z"/></g>
</svg>
    </a>


    
