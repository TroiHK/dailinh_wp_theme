	</main>

	<footer class="main-footer js-reveal">
		<div class="grid">
			<div class="grid__row">
				<div class="grid__col-xxs--2 grid__col-s--2 grid__col-m--1"></div>
				<div class="grid__col-xxs--4 grid__col-s--3 grid__col-m--3">
					<a href="<?= get_home_url(); ?>" class="main-logo"><span></span></a>
				</div>
				<div class="grid__col-xxs--0 grid__col-m--2"></div>
				<?php get_template_part( 'template-parts/blocks/content', 'footer_menu' ); ?>
			</div>

			<div class="grid__row closure">
				<div class="grid__col-xxs--6 grid__col-s--8 grid__col-m--7 u-right">
					<?php get_template_part( 'template-parts/blocks/content', 'socials' ); ?>
				</div>
				<div class="grid__col-xxs--12 grid__col-m--0"></div>
				<div class="grid__col-xxs--2 grid__col-m--1"></div>
				<div class="grid__col-xxs--9 grid__col-s--2 grid__col-m--4">
					<?= get_field('copyright_text_opt', 'option'); ?>
				</div>
			</div>
		</div>
	</footer>

	<div class="gallery__popin">
		<div class="gallery__popin-container">
			<div class="gallery__popin-slider"></div>
			<div class="gallery__popin-legends"></div>
			<a href="#" class="gallery__close"><i></i></a>
		</div>
	</div>

    <?php wp_footer(); ?>

    <!-- scripts:vendor -->
    <?php $app_time = filemtime(dirname(__FILE__) .'/assets/js/app.js'); ?>
	<script defer src="<?php echo get_template_directory_uri(); ?>/assets/js/app.js?v=<?php echo $app_time; ?>"></script>
	<!-- ./scripts:app -->
	
	<?php global $modulejs; ?>
	<script defer>
		var app = null;
		window.addEventListener('load', function() {
			app = new App('<?php echo $modulejs; ?>');
		});
		window.addEventListener("pageshow", function(evt){
        	if( window.innerWidth < 768 ) {
        		document.getElementsByTagName( 'html' )[0].className += 'page-is-loaded';
        		//app.page.initReveal();
        		console.log('back safari');
        	}
    	}, false);
	</script>

	<?php the_field('before_closing_body', 'option'); ?>
	</body>
</html>