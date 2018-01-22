<?php while ( have_rows('actualites_hp') ) : the_row(); ?>
<?php
	$arrg = array(
		'post_type' => 'bat_dong_san',
		'orderby' => 'post_date',
		'posts_per_page' => 6,
		'order' => 'DESC'
	);
	$actu_post = new WP_Query($arrg);

	$title = get_sub_field('title');
	$description = get_sub_field('description');
	$link = get_sub_field('lien');
	$text_link = get_sub_field('texte_du_lien');
?>
<section class="section-news">
	<div class="grid">
		<div class="grid__row">
			<div class="grid__col-xxs--12 grid__col-m--3">
				<h2 class="word-breaker js-reveal"><?= $title ?></h2>
			</div>
		</div>
		<div class="grid__row">
			<div class="grid__col-xxs--0 grid__col-s--1 grid__col-xxs--1"></div>
			<div class="grid__col-xxs--10 grid__col-s--4 grid__col-m--3">
				<div class="desc js-reveal">
					<p class="c-grey-light"><?= $description ?></p>
					<a href="<?= $link ?>" class="link">
						<?= $text_link ?>
					</a>
				</div>
			</div>
		</div>
		<div class="news-arrows">
			<a href="#" class="prev">
				<i class="arrow-left"></i>
			</a>
			<a href="#" class="next">
				<i class="arrow-right"></i>
			</a>
		</div>
	</div>
	
	<?php if ( $actu_post->have_posts() ) : ?>
	<div class="news-carousel js-reveal" style="width: 3000px;">
		<?php while ( $actu_post->have_posts() ) : $actu_post->the_post(); ?>
		<article class="news-slide">
			<div class="news-slide__inner">
				<div class="news-slide__info">
					<time><?= get_the_date('d-m-Y') ?></time>
					<h3><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></h3>
				</div>
				<figure class="news-slide__img">
					<a href="<?= get_the_permalink() ?>">
						<span class="btn-round"><i><span></span></i></span>
						<img src="<?= get_the_post_thumnail('actu-thumnail') ?>" alt="<?= $post->post_name ?>">
					</a>
				</figure>
			</div>
		</article>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>
	<?php wp_reset_query(); ?>
</section>
<?php endwhile; ?>