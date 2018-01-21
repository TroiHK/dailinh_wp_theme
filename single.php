<?php
	global $modulejs;
	$modulejs = 'news';
	get_header();
?>

<section class="section">
	<div class="entry">
		<div class="entry-content">
            <?php get_template_part( 'template-parts/single/headline' ); ?>
            <?php get_template_part('template-parts/single/post-information'); ?>
		</div>
	</div>
    <?php get_template_part('template-parts/single/gallery-video'); ?>
</section>
<section class="entry__navigation js-reveal">
    <?php get_template_part('template-parts/single/related-post'); ?>
</section>

<?php get_footer(); ?>