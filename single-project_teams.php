<?php 
	global $modulejs;
	$modulejs = 'team';
	get_header();
?>

<section class="section">

    <?php get_template_part( 'template-parts/team/headline' ); ?>

    <div class="grid">
        <?php get_template_part( 'template-parts/team/team_information' ); ?>
        <?php get_template_part( 'template-parts/team/team_projects' ); ?>
        <?php get_template_part( 'template-parts/team/team_publications' ); ?>



	</div>
</section>

<?php get_footer(); ?>