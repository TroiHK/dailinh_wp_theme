<section class="team__references">
    <?php if(get_field('ing_team_ref_des') || get_field('ing_team_related_project')){ ?>
    <div class="grid__row">
        <div class="grid__col-xxs--12 grid__col-m--3">
                <h2><span class="word-breaker js-reveal"><?=__('Référence','utweb-dailinh');?></span></h2>
        </div>
    </div>
    <?php } ?>
    <?php if(get_field('ing_team_related_project')): ?>
    <div class="grid__row">
        <div class="grid__col-xxs--0 grid__col-m--1"></div>
        <div class="grid__col-xxs--12 grid__col-m--3 grid__col-l--2 grid__col-m--no-gutter">
            <div class="entry-body js-reveal">
                <p class="c-grey"><?=((get_field('ing_team_ref_des')) ? get_field('ing_team_ref_des') : '')?></p>
            </div>
        </div>
        <div class="grid__col-xxs--0 grid__col-m--1 grid__col-l--2"></div>
        <div class="grid__col-xxs--12 grid__col-m--6">
            <div class="team__references-slider">
                <?php $i = 0; ?>
                <?php foreach (get_field_object('ing_team_related_project')['value'] as $project) : ?>

                    <?php if($i % 4 == 0):?>
                        <div class="team__references-slide">
                            <div class="u-cf">
                    <?php endif; ?>
                            <article class="grid__col-xxs--12 grid__col-s--6 item js-reveal">
                                <div class="item__info">
                                    <?php
                                    $term_ = '';
                                    while ( have_rows('ing_project_infos',$project->ID) ) : the_row();
                                        $term_ = get_sub_field('ing_project_map_ville',$project->ID);
                                    endwhile;

                                    if($term_ != ''){
                                        echo '<span class="item__meta">'.$term_.'</span>';
                                    }else{
                                        echo '<span class="item__meta" style="opacity: 0">'.__('Non Ville','utweb-dailinh').'</span>';
                                    }
                                    ?>
                                    <h3><a href="<?=get_permalink($project->ID);?>"><?=$project->post_title;?></a></h3>
                                </div>
                                <figure class="item__img">
                                    <span class="btn-round"><i><span></span></i></span>
                                    <a href="<?=get_permalink($project->ID);?>">
                                        <?php if ( has_post_thumbnail($project->ID) ){ ?>
                                            <img src="<?=get_the_post_thumbnail_url($project->ID,'actu-thumnail')?>" alt="<?=$project->post_title;?>">
                                        <?php }else{ ?>
                                            <img src="<?=get_field('project_thumbnail','option')?>" alt="<?=$project->post_title;?>">
                                        <?php } ?>
                                    </a>
                                </figure>
                            </article>
                    <?php if(($i + 1) % 4 == 0 || $i == count(get_field_object('ing_team_related_project')['value'])) : ?>
                            </div>
                        </div>
                    <?php endif; $i++; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>
