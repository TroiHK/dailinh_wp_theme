<?php while ( have_rows('ing_team_informations')) : the_row(); ?>
<div class="grid">
    <div class="grid__row">
        <div class="grid__col-xxs--0 grid__col-m--1"></div>
        <div class="grid__col-xxs--12 grid__col-m--5">
            <?php get_template_part( 'template-parts/blocks/content', 'breadcrumb' ); ?>
            <h1 class="word-breaker js-reveal"><?= get_the_title() ?></h1>
            <div class="team__function">
                <span class="js-reveal word-breaker"><?=get_sub_field('ing_team_role') ?></span>
            </div>
        </div>
    </div>
</div>
<?php endwhile;?>