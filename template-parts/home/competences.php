<?php if ( have_rows('competences_hp') ) : ?>
<section class="section">
	<div class="grid">
		<div class="grid__row">
			<div class="grid__col-xxs--12 grid__col-m--4">
				<h2>
					<small class="word-breaker js-reveal"><?= get_field('competences_title_hp') ?></small>
					<span class="word-breaker js-reveal"><?= get_field('competences_subtitle_hp') ?></span></h2>
			</div>
		</div>
		<div class="grid__row">
			<div class="grid__col-xxs--0 grid__col-m--1"></div>
			
			<?php while ( have_rows('competences_hp') ) : the_row(); ?>
			<article class="grid__col-xxs--12 grid__col-s--4 grid__col-m--3 feature-item js-reveal">
				<h3 class="feature-item__title"><a href="<?= get_sub_field('link') ?>" class="word-breaker js-reveal"><?= get_sub_field('title') ?></a></h3>
				<figure class="feature-item__img">
					<a href="<?= get_sub_field('link') ?>">
						<span class="btn-round"><i><span></span></i></span>
						<img src="<?= get_sub_field('image') ?>" alt="<?= get_sub_field('title') ?>">
					</a>
				</figure>
				<div class="feature-item__info">
					<p><?= get_sub_field('description') ?></p>
					<a href="<?= get_sub_field('link'); ?>" class="link"><?= __('Chi tiết', 'utweb-dailinh'); ?></a>
				</div>
			</article>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php endif; ?>