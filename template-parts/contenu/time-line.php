<section class="content__timeline">
    <div class="grid">
        <div class="grid__row">
            <div class="grid__col-xxs--12 grid__col-s--4 grid__col-m--3">
                <h2 class="word-breaker js-reveal"><?=get_sub_field('title')?></h2>
            </div>
        </div>
        <div class="grid__row">
            <div class="grid__col-xxs--0 grid__col-s--1 grid__col-m--1"></div>
            <div class="grid__col-xxs--12 grid__col-s--4 grid__col-m--3">
                <div class="desc js-reveal">
                    <p class="c-grey-light"><?=get_sub_field('description')?></p>
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

    <?php if( have_rows('liste_delements') ): 
    echo '<div class="news-carousel js-reveal" style="width: 6000px;">';
    while( have_rows('liste_delements') ): the_row();?>
        <article class="news-slide">
            <div class="news-slide__inner">
                <div class="news-slide__info">
                <?php if(get_sub_field('legende')){ ?>
                    <time><?php echo get_sub_field('legende'); ?></time>
                <?php } ?>

                <?php if(get_sub_field('lien_interne')){ ?>
                    <h3><a href="<?php echo get_sub_field('lien_interne'); ?>"><?php echo get_sub_field('titre'); ?></a></h3>
                <?php }else{ ?>
                    <h3><?php echo get_sub_field('titre'); ?></h3>
                <?php } ?>
                </div>
                <figure class="news-slide__img">
                <?php if(get_sub_field('lien_interne')){ ?>
                    <a href="<?php echo get_sub_field('lien_interne'); ?>">
                        <span class="btn-round"><i><span></span></i></span>
                        <?php $actu_thumnail = get_sub_field('image'); ?>
                        <img src="<?php echo $actu_thumnail ? $actu_thumnail : ACTU_THUMNAIL_IMG; ?>" alt="<?php echo get_the_title('titre'); ?>">
                    </a>
                <?php }else{ ?>
                    <?php $actu_thumnail = get_sub_field('image'); ?>
                    <img src="<?php echo $actu_thumnail ? $actu_thumnail : ACTU_THUMNAIL_IMG; ?>" alt="<?php echo get_the_title('titre'); ?>">
                <?php } ?>
                </figure>
            </div>
        </article>
    <?php endwhile;
    echo '</div>';
    endif; ?>
    <?php wp_reset_query(); ?>

</section>