<?php 
	global $modulejs;
	$modulejs = 'default';
	get_header();
?>

<section class="error__section section">
	<img class="js-reveal" src="<?php echo get_template_directory_uri(); ?>/assets/img/layout/404.jpg" alt="">
	<div class="grid">
		<div class="grid__row">
			<div class="grid__col-xxs--0 grid__col-m--1"></div>
			<div class="grid__col-xxs--12 grid__col-m--10">

				<h1><span class="js-reveal word-breaker"><?php echo get_field('title_404_opt', 'option'); ?></span></h1>

				<div class="desc js-reveal">
					<p><?php echo get_field('description_404_opt', 'option'); ?></p>
					<a href="<?php echo get_field('link_button_404_opt', 'option') ? get_field('link_button_404_opt', 'option') : get_home_url(); ?>" class="link"><?php echo get_field('text_button_404_opt', 'option'); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>