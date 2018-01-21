<?php while ( have_rows('iconiques_hp') ) : the_row(); ?>
<section class="section">
	<div class="grid">
		<div class="grid__row">
			<div class="grid__col-xxs--12 grid__col-m--4">
				<h2>
					<small class="word-breaker js-reveal"><?= get_sub_field('title') ?></small>
					<span class="word-breaker js-reveal"><?= get_sub_field('subtitle') ?></span>
				</h2>

				<?php if ( have_rows('projects') ) : ?>
				<div class="grid__row">
					<div class="grid__col-xxs--1 grid__col-s--2 grid__col-m--3"></div>
					<div class="grid__col-xxs--10 grid__col-s--6 grid__col-m--9">
						<div class="desc js-reveal">
							<div class="slider-contents slider-icon-contents">
								<?php while ( have_rows('projects') ) : the_row(); ?>
								<?php 
									$projectID = get_sub_field('projet');
									$description = get_sub_field('description');
								?>
 								<div class="slide-content">
 									<?php if ( $description ) : ?>
 										<p class="c-grey-light"><?= $description ?></p>
 									<?php endif; ?>
 									<a href="<?= get_the_permalink( $projectID ) ?>" class="link"><?= __('Chi tiết dự án', 'utweb-dailinh') ?></a>
 								</div>
 								<?php endwhile; ?>
 							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<div class="grid__col-xxs--1 grid__col-s--2 grid__col-m--1"></div>
			<div class="grid__col-xxs--11 grid__col-s--8 grid__col-m--6">
				<div class="slider-icon js-reveal" data-slider="true" data-content="slider-icon-contents">
					<?php while ( have_rows('projects') ) : the_row(); ?>
					<?php 
						$projectID = get_sub_field('projet');
						$title = get_sub_field('title') ? get_sub_field('title') : get_the_title($projectID);
						$url_imge = get_sub_field('image') ? get_sub_field('image') : get_the_post_thumbnail_url( get_sub_field('projet'), 'iconiques-thumbnail' );
					?>
					<article class="slide">
						<figure>
							<img src="<?= $url_imge ?>" alt="<?= $title ?>">
						</figure>
					</article>
					<?php endwhile; ?>

					<div class="slider-legends">
						<?php while ( have_rows('projects') ) : the_row(); ?>
						<?php 
							$projectID = get_sub_field('projet');
							$title = get_sub_field('title') ? get_sub_field('title') : get_the_title($projectID);
							$subtitle = get_sub_field('subtitle');
						?>
 						<figcaption>
 							<span>
 								<?= $title ?>
 								<?php if ( $subtitle ) : ?>
 								<em><?= $subtitle ?></em>
 								<?php endif; ?>
 							</span>
 						</figcaption>
 						<?php endwhile; ?>
 					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; ?>