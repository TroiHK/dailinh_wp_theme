<div class="grid__row">
	<div class="grid__col-xxs--0 grid__col-m--1"></div>
    <div class="grid__col-xxs--12 grid__col-s--7">
		<?php get_template_part( 'template-parts/blocks/content', 'breadcrumb' ); ?>
		<h1 class="word-breaker js-reveal"><?= get_the_title() ?></h1>
	</div>
    <div class="grid__col-xxs--0 grid__col-s--1"></div>
	<div class="grid__col-xxs--12 grid__col-s--4 grid__col-m--2 grid__col-m--no-gutter">
		<?php if ( have_rows('ing_project_top_liste_delement') ) : ?>
		<div class="entry-meta">
			<?php while ( have_rows('ing_project_top_liste_delement') ) : the_row(); ?>
			<label class="js-reveal" for=""><?= get_sub_field('titre') ?></label>
			<p class="js-reveal"><?= get_sub_field('sous-titre') ?></p>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</div>