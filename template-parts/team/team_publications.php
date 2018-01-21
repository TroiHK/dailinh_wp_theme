<?php
$public_select = get_field('ing_team_related_public');
?>
<?php if($public_select) : ?>
    <section class="team__publications">
        <div class="grid__row">
            <div class="grid__col-xxs--12 grid__col-m--3">
                <h2>
                    <span class="word-breaker js-reveal"><?=__('Liste des publications','utweb-dailinh')?></span></h2>
            </div>
        </div>

        <div class="tab js-reveal">
            <div class="grid__row">
                <div class="grid">
                    <div class="grid__row">
                        <div class="grid__col-xxs--0 grid__col-l--1"></div>
                        <div class="grid__col-xxs--12 grid__col-s--5 grid__col-m--4 grid__col-l--3">
                            <?php

                            $categories = get_categories( array(
                                'taxonomy'            => 'publication_category',
                                'hierarchical'  => true,
                            ));
                            $public_arr = array();
                            foreach ($categories as $cat){
                                $publication = get_posts(array(
                                    'post_type'      => 'publication',
                                    'posts_per_page' => -1,
                                    'post_status'    => 'publish',
                                    'tax_query'     => array(
                                        array(
                                            'taxonomy'  => 'publication_category',
                                            'field'     => 'id',
                                            'terms'     => $cat->term_id,
                                        ),
                                    ),
                                    'fields'        => 'ids',
                                ));

                                $publication = array_intersect ($publication,$public_select );
                                if(count($publication) > 0 ){
                                    $public_arr[$cat->name] = $publication;
                                }
                            }
                            ?>
                            <ul class="tabs">
                                <?php foreach ($public_arr as $key => $public) : ?>
                                    <li><a href="#"><?=$key?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="grid__col-xxs--12 grid__col-s--7 grid__col-m--7">
                            <div class="tab-content">
                                <?php foreach ($public_arr as $key => $public__) : ?>
                                    <div class="tab-item">
                                        <div class="tab-inner">
                                            <?php $i = 1; ?>
                                            <?php foreach ($public__ as $item) : ?>
                                                <div class="search__item">
                                                <?php if(get_field('ing_publiccation_file_pdf',$item)){ ?>
                                                    <a <?=( (get_field('ing_publiccation_file_pdf',$item)!= '') ? 'href="'.get_field('ing_publiccation_file_pdf',$item).'"' : '')?> target="_blank">
                                                        <span class="search__item-desc"><?='<strong>'.$i.'. </strong>'.get_post_field('post_content', $item)?></span>
                                                        <?php if(get_field('ing_publiccation_file_pdf',$item)){ ?>
                                                        <?=getSvgIcon('dl', '0 0 21.7 27.1')?>
                                                        <?php } ?>
                                                    </a>
                                                <?php }else{ ?>
                                                    <div class="content">
                                                        <span class="search__item-desc"><?='<strong>'.$i.'. </strong>'.get_post_field('post_content', $item)?></span>
                                                    </div>
                                                    
                                                <?php } ?>
                                                </div>
                                                <?php $i++; endforeach; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>