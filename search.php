<?php 
	global $modulejs;
	$modulejs = 'default';
	get_header();

	$post_per = 4;
	$total_search_query = new WP_Query("s=$s&posts_per_page=-1");
	$total_result = $total_search_query->post_count;
?>

<section class="section">
	<div class="grid">
		<div class="grid__row">
			<div class="grid__col-xxs--0 grid__col-m--1"></div>
			<div class="grid__col-xxs--12 grid__col-m--10">
				<ul class="breadcrumb js-reveal">
					<li><a href="/"><?=__('Home','utweb-dailinh')?></a></li>
					<li><a href="#" class="current"><?=__('Recherche','utweb-dailinh')?></a></li>
				</ul>
				<h1 class="word-breaker js-reveal"><?=__('Résultats de la recherche','utweb-dailinh')?></h1>
			</div>
		</div>

		<section class="section__publications js-reveal">
			<div class="grid__row">
				<div class="grid__col-xxs--0 grid__col-m--1"></div>
				<div class="grid__col-xxs--11">
					<p class="search__result desc js-reveal"><?=__('Recherche','utweb-dailinh')?> : <?php echo $s; ?></p>
				</div>
				<div class="grid__col-xxs--0 grid__col-m--1"></div>
				<div class="grid__col-xxs--12 grid__col-m--3">
					<div class="search__number"><?php echo $total_result; ?> <?=__('résultats pour votre recherche','utweb-dailinh')?></div>
				</div>
				<div class="grid__col-xxs--12 grid__col-m--7 ing__content_search">	
				<?php 
					$args=array(
						's'      => $s, 
						'posts_per_page' => $post_per
					);
					$search_query = new WP_Query($args);
					if ( $search_query->have_posts() ) {

						while ( $search_query->have_posts() ) {
							$search_query->the_post();
							?>
							<div class="search__item">
								<div class="content">
									<h2 class="search__item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<span class="search__item-desc">
										<?php if(get_the_excerpt()){
											echo wp_trim_words( get_the_excerpt(), $num_words = 30, $more = null );
										}elseif(get_field('ing_team_ref_des')){
											echo get_field('ing_team_ref_des');
										} ?>
									</span>

									<a href="<?php the_permalink(); ?>" class="link"><?=__('En savoir plus','utweb-dailinh')?></a>
								</div>
							</div>
							<?php
						}
						
						wp_reset_postdata();
					} else {
						echo '<p>no posts found</p>';
					}
					?>
				</div>
			</div>
		</section>
		<div class="grid__row">
			<input type="hidden" class="ing_page" value="<?=(get_query_var( 'paged' ) ? get_query_var('paged') : 1)?>">
            <input type="hidden" class="ing_max_page" value="<?=$total_result;?>">
            <input type="hidden" class="ing_post_per" value="<?=$post_per;?>">
            <input type="hidden" class="ing_key_word" value="<?=$s;?>">
            <?php if($total_result > $post_per){ ?>
				<p class="u-tac load-more">
					<a href="#" class="link" id="load-more-search"><?=__('Voir plus','utweb-dailinh')?></a>
				</p>
			<?php } ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>