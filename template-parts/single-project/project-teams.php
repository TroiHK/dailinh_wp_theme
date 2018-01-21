<?php
if(get_field('ing_project_related_teams')) :
    $team_member = get_field('ing_project_related_teams');
?>
<section class="project__team">
    <div class="grid__row">
        <div class="grid__col-xxs--12 grid__col-m--3">
            <h2>
                <span class="word-breaker js-reveal"><?=__('Équipe du projet','utweb-dailinh')?></span></h2>
        </div>
    </div>

    <div class="grid__row">
        <div class="grid__col-s--1 grid__col-xxs--1"></div>
        <div class="grid__col-s--11 grid__col-xxs--9">
            <div class="project__team-slider">
                <?php
                shuffle($team_member);
                foreach ($team_member as $item){
                    setup_postdata($item);
                    $thum_url = (get_the_post_thumbnail_url( $item->ID, 'actu-thumnail')) ? get_the_post_thumbnail_url( $item->ID, 'actu-thumnail') : get_field('esquipes_thumbnail','option');
                    while ( have_rows('ing_team_informations', $item->ID) ) : the_row();
                         echo '
                                <article class="project__team-item grid__col-xxs--12 grid__col-m--3 js-reveal">
                                    <div class="project__team-img">
                                        <a href="'.get_permalink($item->ID).'">
                                            <figure>
                                                <img src="'.$thum_url.'" alt="'.$item->post_title.'">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="project__team-info">
                                        <h3><a href="'.get_permalink($item->ID).'">
                                            <span class="project__team-firstname"><span>'.get_sub_field('ing_team_fist_name').'</span></span>
                                            <span class="project__team-lastname"><span>'.get_sub_field('ing_team_last_name').'</span></span>
                                        </a></h3>
        
                                        <div class="project__team-function">'.get_sub_field('ing_team_role').'</div>
                                    </div>
                                </article>       
                                ';
                    endwhile; // End While
                } // End While
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>
 <?php endif; ?>
