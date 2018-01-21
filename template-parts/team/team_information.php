<div class="grid__row">
    <figure class="team__img js-reveal">
        <?php $thum_url = (get_the_post_thumbnail_url( $post, 'project-team-thumbail')) ? get_the_post_thumbnail_url( $post, 'project-team-thumbail') : ESQUIPES_THUMBNAIL_IMG; ?>
        <img src="<?=$thum_url?>" alt="<?= get_the_title() ?>">
    </figure>

    <?php if( have_rows('ing_team_informations') ){ ?>
        <?php while ( have_rows('ing_team_informations')) : the_row(); ?>
        <?php if( get_sub_field('ing_team_cursus')){ ?>
        <div class="grid__col-xxs--12 grid__col-m--3">
            <h2>
                <span class="word-breaker js-reveal"><?=__('cursus','utweb-dailinh');?></span>
            </h2>
        </div>
        <?php } ?>
        <?php endwhile; ?>
    <?php } ?>
</div>
<?php while ( have_rows('ing_team_informations')) : the_row(); ?>
<div class="grid__row">
    <div class="grid__col-s--1 grid__col-xxs--0"></div>
    <div class="grid__col-m--4 grid__col-l--5 grid__col-s--8 grid__col-xxs--12">
        <div class="entry-body js-reveal">
           <?php if( get_sub_field('ing_team_cursus')): ?>
                <?php foreach ( get_sub_field('ing_team_cursus') as $cursus ) :?>
                    <p><big><strong><?=$cursus['ing_team_cursus_title']?></strong></big><br><?=$cursus['ing_team_cursus_sub']?></p>
                <?php endforeach; ?>
           <?php endif; ?>
        </div>
    </div>
</div>
<?php endwhile; ?>