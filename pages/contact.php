<?php
/*
	Template Name: Contact
*/
	global $modulejs;
	$modulejs = 'default';
	get_header();
?>
<section class="section">
    <div class="grid">
        <div class="grid__row">
            <div class="grid__col-xxs--0 grid__col-m--1"></div>
            <div class="grid__col-xxs--12 grid__col-m--11">
                <?php get_template_part( 'template-parts/blocks/content', 'breadcrumb' ); ?>
                <h1 class="word-breaker js-reveal"><?=get_the_title()?></h1>
            </div>
        </div>
        <div class="grid__row">
            <div class="grid__col-xxs--0 grid__col-m--1"></div>
            <?php get_template_part( 'template-parts/contact/form' ); ?>
            <div class="grid__col-xxs--0 grid__col-s--1 grid__col-m--2"></div>
            <?php get_template_part( 'template-parts/contact/contact-details' ); ?>
        </div>
    </div>
    <?php get_template_part( 'template-parts/contact/contact-image' ); ?>
    <?php get_template_part( 'template-parts/contact/map' ); ?>
</section>
<?php
	get_footer();
?>