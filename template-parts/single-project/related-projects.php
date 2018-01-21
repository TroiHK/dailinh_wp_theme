<?php while ( have_rows('ing_project_related') ) : the_row(); ?>
    <?php if(get_sub_field('ing_project_relat_pre') &&get_sub_field('ing_project_relat_next') ) : ?>
    <?php
        $pro_pre = get_sub_field('ing_project_relat_pre');
        $pro_nex = get_sub_field('ing_project_relat_next');
    ?>
    <section class="entry__navigation js-reveal">
        <div class="grid">
            <div class="grid__row">
                <div class="grid__col-xxs--12 grid__col-s--6 grid__col-m--4">
                    <h2>
                        <span class="word-breaker js-reveal"><?=__('Découvrez nos autres réalisations','utweb-dailinh')?></span></h2>
                </div>
            </div>
        </div>
        <div class="center">
            <a href="<?=get_permalink($pro_pre->ID)?>" class="entry__navigation-item js-reveal">
                <figure class="entry__navigation-img">
                    <div class="inner"><img src="<?=get_the_post_thumbnail_url($pro_pre->ID,'project-thumbnail')?>" alt="<?=$pro_pre->post_title?>"></div>
                </figure>
                <span class="entry__navigation-info">
                    <span class="entry__navigation-title word-breaker"><?=$pro_pre->post_title?></span>
                    <span class="link"><?=__('Découvrir','utweb-dailinh')?></span>
                </span>

                <i class="arrow-left"></i>
            </a>
            <a href="<?=get_permalink($pro_nex->ID)?>" class="entry__navigation-item js-reveal">
                <figure class="entry__navigation-img">
                    <div class="inner"><img src="<?=get_the_post_thumbnail_url($pro_nex->ID,'project-thumbnail')?>" alt="<?=$pro_nex->post_title?>"></div>
                </figure>
                <span class="entry__navigation-info">
                    <span class="entry__navigation-title word-breaker"><?=$pro_nex->post_title?></span>
                    <span class="link"><?=__('Découvrir','utweb-dailinh')?></span>
                </span>
                <i class="arrow-right"></i>
            </a>
        </div>
    </section>
    <?php endif; ?>
<?php endwhile; ?>