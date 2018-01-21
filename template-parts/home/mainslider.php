<?php 
	$slider_items_hp = get_field('slide_hp');
?>
<?php if ( have_rows('slide_hp') ) : ?>
<section class="section-cover center">
	
	<div class="slider">
		<?php while ( have_rows('slide_hp') ) : the_row(); ?>
			<?php while ( have_rows('item') ) : the_row(); 
				$projetID = get_sub_field('projet'); 
				$slide_image = get_sub_field('image');
			?>
				<?php 
					$slide_image = $slide_image ? $slide_image : wp_get_attachment_image_src($projetID);
					$url_image = $slide_image['sizes']['main-slider'];
					$url_image_mobile = $slide_image['sizes']['mobile-slide'];
				?>
	            <div class="slide">
	                <figure class="js-lazy slide-desktop" data-src="<?= $url_image ?>">
	                </figure>
	                <figure class="js-lazy slide-mobile hidden" data-src="<?= $url_image_mobile ?>"></figure>
	            </div>
			<?php endwhile; ?>
		<?php endwhile; ?>
	</div>

	<div class="slider-content" data-dir="vertical">
		<?php while ( have_rows('slide_hp') ) : the_row(); ?>
		<?php while ( have_rows('item') ) : the_row();
			$projetID = get_sub_field('projet'); 
		?>
		<?php 
			$projectTitle = get_sub_field('titre_du_slide') ? get_sub_field('titre_du_slide') : get_the_title( $projetID );
			$sous_titre = get_sub_field('sous-titre');
		?>
		<article class="slide-content">
			<div class="grid">
				<div class="grid__row">
					<div class="grid__col-xxs--0 grid__col-s--1"></div>
					<div class="grid__col-xxs--12 grid__col-s--8 grid__col-m--6">
						<h2 class="js-reveal word-breaker"><?= $projectTitle ?></h2>

						<?php if ( $sous_titre ) : ?>
							<p class="js-reveal"><?= $sous_titre ?></p>
						<?php endif; ?>

						<a href="<?= get_the_permalink( $projetID ) ?>" class="btn-round js-reveal">
							<i><span></span></i>
							<?= __('Xem Chi Tiết', 'utweb-dailinh'); ?>
						</a>
					</div>
				</div>
			</div>
		</article>
		<?php endwhile; ?>
		<?php endwhile; ?>
	</div>
</section>
<?php endif; ?>