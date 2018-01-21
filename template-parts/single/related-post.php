<?php
$next_id = get_next_post_id(get_the_ID());
$prev_id = get_previous_post_id(get_the_ID());
?>
<div class="grid">
    <div class="grid__row">
        <div class="grid__col-xxs--12 grid__col-m--4">
            <h2>
                <span class="word-breaker js-reveal"><?=__('Découvrez nos actualités','utweb-dailinh')?></span></h2>
        </div>
    </div>
</div>
<div class="center">
    <?php if($next_id){ ?>
    <a href="<?=get_permalink($next_id)?>" class="entry__navigation-item js-reveal">
        <figure class="entry__navigation-img">
        <?php if(get_the_post_thumbnail_url($next_id,'project-thumbnail')){ ?>
            <div class="inner"><img src="<?=get_the_post_thumbnail_url($next_id,'project-thumbnail')?>" alt="<?=get_the_title($next_id)?>"></div>
        <?php }else{ ?>
            <div class="inner"><img src="<?=get_field('actu_thumnail_img','option')?>" alt="<?=get_the_title($next_id)?>"></div>
        <?php } ?>
        </figure>
        <span class="entry__navigation-info">
    		<span class="entry__navigation-title word-breaker"><?=get_the_title($next_id)?></span>
    		<span class="link"><?=__('Découvrir','utweb-dailinh')?></span>
    	</span>
        <i class="arrow-left"></i>
    </a>
    <?php }else{
        echo '<a class="entry__navigation-item js-reveal"></a>';
    } ?>

    <?php if($prev_id){ ?>
    <a href="<?=get_permalink($prev_id)?>" class="entry__navigation-item js-reveal">
        <figure class="entry__navigation-img">
        <?php if(get_the_post_thumbnail_url($prev_id,'project-thumbnail')){ ?>
            <div class="inner"><img src="<?=get_the_post_thumbnail_url($prev_id,'project-thumbnail')?>" alt="<?=get_the_title($prev_id)?>"></div>
        <?php }else{ ?>
            <div class="inner"><img src="<?=get_field('actu_thumnail_img','option')?>" alt="<?=get_the_title($prev_id)?>"></div>
        <?php } ?>
        </figure>
        <span class="entry__navigation-info">
            <span class="entry__navigation-title word-breaker"><?=get_the_title($prev_id)?></span>
            <span class="link"><?=__('Découvrir','utweb-dailinh')?></span>
        </span>

        <i class="arrow-right"></i>
    </a>
    <?php }else{
        echo '<a class="entry__navigation-item js-reveal"></a>';
    } ?>
</div>
