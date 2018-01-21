<div class="grid">
    <div class="grid__row">
        <div class="grid__col-xxs--0 grid__col-m--1"></div>
        <div class="grid__col-xxs--12 grid__col-m--5">
            <ul class="breadcrumb js-reveal">
                <?php get_template_part( 'template-parts/blocks/content', 'breadcrumb' ); ?>
            </ul>
            <?php while ( have_rows('ing_page_information') ) : the_row(); ?>
                <?php if(get_sub_field('title')){ ?>
                <h1 class="word-breaker js-reveal"><?=get_sub_field('title')?></h1>
                <?php }else{ ?>
                <h1 class="word-breaker js-reveal"><?=get_the_title()?></h1>
                <?php } ?>
                <?php if(get_sub_field('description')){ ?>
                <div class="entry-subtitle">
                    <span class="js-reveal word-breaker"><?=get_sub_field('description')?></span>
                </div>
                <?php } ?>
            <?php endwhile; ?>
        </div>
    </div>
</div>