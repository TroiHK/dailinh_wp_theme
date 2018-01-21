<?php
/*
	Template Name: Page Home
*/
	global $modulejs;
	$modulejs = 'home';
	get_header();
?>

<?php get_template_part( 'template-parts/home/mainslider' ); ?>

<?php get_template_part( 'template-parts/home/actu' ); ?>

<?php get_template_part( 'template-parts/home/iconiques' ); ?>

<?php get_template_part( 'template-parts/home/competences' ); ?>

<?php get_template_part( 'template-parts/home/citation' ); ?>

<?php
	get_footer();
?>