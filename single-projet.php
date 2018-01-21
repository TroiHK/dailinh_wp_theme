<?php 
	global $modulejs, $post;
	$modulejs = 'project';
	get_header();
?>
<section class="section">
	<div class="grid">
		<?php get_template_part( 'template-parts/single-project/headline' ); ?>
	</div>

    <?php get_template_part( 'template-parts/single-project/slider-project' ); ?>

	<div class="grid">

        <?php get_template_part( 'template-parts/single-project/content-project' ); ?>

        <?php get_template_part( 'template-parts/single-project/related-articles' ); ?>

        <?php get_template_part( 'template-parts/single-project/gallery-images' ); ?>

        <?php get_template_part( 'template-parts/single-project/project-teams' ); ?>

        <?php get_template_part( 'template-parts/single-project/publications' ); ?>

        <?php get_template_part( 'template-parts/single-project/map-project' ); ?>

	</div>

</section>

<?php get_template_part( 'template-parts/single-project/related-projects' ); ?>

<?php get_footer(); ?>