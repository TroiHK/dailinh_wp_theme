<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php 
	// experiment code
	$turn_on_experiment = (get_field('turn_on_experiment') == 'Yes') ? true : false;
	if ($turn_on_experiment) echo get_field('code_before_head_tag');
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, user-scalable=yes">

	<!-- Disable iOS phone numbers auto-detect -->
	<meta name="format-detection" content="telephone=no">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php get_template_part( 'template-parts/blocks/content', 'favicon' ); ?>

	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">
	
	<?php wp_head(); ?>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="/assets/js/vendor/selectivizr.js"></script>
	<![endif]-->

    <style type="text/css">
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: #FFF;
        }

        .loader svg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>

	<?php the_field('within_head', 'option'); ?>
	
	<?php 
		// Google Analytics code
		if ($turn_on_experiment) echo get_field('code_within_head_tag');
	?>

</head>

<body <?php body_class(); ?>>
	
	<?php 
		// Google Tag Manager code
		if(!$turn_on_experiment) echo get_field('google_tag_manager', 'option'); 
	?>
	<?php the_field('after_opening_body', 'option'); ?>

	<?php 
		// Gestion du sprite SVG
		printSvgSprite(); 
	?>

    <div class="loader">
        <?php require_once("./wp-content/themes/dailinh_wp_theme/assets/svg/layout/puff.svg"); ?>
    </div>

    <img src="<?= get_template_directory_uri() ?>/assets/svg/layout/shape2.svg" alt="" class="shape shape1">
	<img src="<?= get_template_directory_uri() ?>/assets/svg/layout/shape3.svg" alt="" class="shape shape2">
	<img src="<?= get_template_directory_uri() ?>/assets/svg/layout/shape4.svg" alt="" class="shape shape3">

	<header class="main-header">
		<div class="grid">
			<div class="grid__row">
				<div class="grid__col-xxs--3 grid__col-m--2">
					<a href="<?= get_home_url(); ?>" class="main-logo"><span><?= get_bloginfo( 'name' ); ?></span></a>
				</div>
				<div class="grid__col-xxs--9 grid__col-m--10">
					<a href="#" class="toggle-menu">
						<span></span>
					</a>
					<?php get_template_part( 'search', 'form' ); ?>
                    <?php wp_nav_menu( array('theme_location' => 'header_menu','link_before'=>'<span>','link_after' => '</span>', 'container' => false, 'menu_class' => 'menu nav navbar-nav responsive-nav main-nav-list')); ?>
				</div>
			</div>
		</div>
	</header>

	<?php get_template_part( 'template-parts/blocks/content', 'main_menu' ); ?>

	<main class="main">