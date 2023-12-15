<?php

	/**
	 * Template part for displaying page content in page.php
	 *
	 * Template name: Template CGBC Full
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package yuna CGBC
	 *
	 */

	get_header();?>

<?php
	$blocksList = carbon_get_post_meta( get_the_ID(), 'yuna_cgbc_block_ch'.yuna_cgbc_lang_prefix() );

	if ( $blocksList ):

   /* print_r($blocksList);*/
?>
		<?php foreach( $blocksList as $block ):?>
    <?php echo $block['yuna_cgbc_block_list'.yuna_cgbc_lang_prefix()];?>
			<?php if( $block['yuna_cgbc_block_list'.yuna_cgbc_lang_prefix()] == 'block1' ):?>

				<?php ccm_get_template_part('template-parts/block','about');?>
			<?php endif;?>
		<?php endforeach;?>
<?php endif;?>

<?php get_footer();
