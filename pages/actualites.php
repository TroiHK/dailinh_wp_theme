<?php
/*
	Template Name: Page List
*/
global $modulejs;
$modulejs = 'default';
get_header();
$post_type = get_field('utweb_post_type');
?>

<section class="section">
	<div class="grid">
		<div class="grid__row">
			<div class="grid__col-xxs--0 grid__col-m--1"></div>
			<div class="grid__col-xxs--12 grid__col-m--10">
                <?php get_template_part( 'template-parts/blocks/content', 'breadcrumb' ); ?>
				<h1 class="word-breaker js-reveal"><?= get_the_title() ?></h1>
			</div>
		</div>
		<div class="grid__row">
			<div class="grid__col-xxs--0 grid__col-m--1"></div>
			<div class="grid__col-xxs--12 grid__col-m--10">
				<div class="grid__row ing__content_actualite">
                    <?php
                        $args = array(
                            'post_type'  => $post_type,
                            'posts_per_page'     => -1,
                            'order'      => 'date',
                            'order_by'    => 'DESC'
                        );
                        $posts = new WP_Query( $args );

                    ?>
                    <?php if( $posts->have_posts() ) :?>
                        <?php while( $posts->have_posts() ) : $posts->the_post(); ?>
                            <article class="grid__col-xxs--12 grid__col-s--6 grid__col-m--4 item js-reveal">
                                <div class="item__info">
                                    <span class="item__meta"><?= get_the_date( 'd-m-Y') ?></span>
                                    <h3><a href="<?= get_permalink() ?>"><?= get_the_title() ?></a></h3>
                                </div>
                                <figure class="item__img">
                                    <span class="btn-round"><i><span></span></i></span>
                                    <a href="<?= get_permalink() ?>">
                                        <img src="<?= get_the_post_thumbnail_url( $post, 'actu-thumnail' ) ?>" alt="<?= get_the_title() ?>">
                                    </a>
                                </figure>
                            </article>
                        <?php endwhile; ?>
                    <?php endif; // End if ?>
                    <?php wp_reset_query(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
	get_footer();
?>