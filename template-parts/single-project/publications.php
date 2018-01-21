<?php if(get_field('ing_project_list_pubcat')) :
    $public_items = get_field('ing_project_list_pubcat');
?>
<section class="project__publications js-reveal">
    <div class="grid__row">
        <div class="grid__col-xxs--12 grid__col-m--3">
            <h2>
                <span class="word-breaker js-reveal"><?=__('liste des publications','utweb-dailinh')?></span></h2>
        </div>
    </div>
    <div class="grid__row">
        <div class="grid__col-xxs--0 grid__col-s--1 grid__col-m--1"></div>
        <div class="grid__col-xxs--12 grid__col-s--9 grid__col-m--7">
            <?php
            $i = 1;
            foreach ($public_items as $item) {
                if(get_field('ing_publiccation_file_pdf',$item->ID)){
                echo '
                    <div class="search__item">
                        <a href="'.get_field('ing_publiccation_file_pdf',$item->ID).'" target="_blank">
                            <span class="search__item-desc"><strong>'.$i.'. </strong>'.get_post_field('post_content', $item->ID).'</span>'.getSvgIcon('dl', '0 0 21.7 27.1').'</a>
                    </div>';
                }else{
                    echo '
                    <div class="search__item">
                        <div class="content">
                            <span class="search__item-desc"><strong>'.$i.'. </strong>'.get_post_field('post_content', $item->ID).'</span>
                        </div>
                    </div>';
                }
                $i++;
            }
            ?>
        </div>
    </div>
</section>
<?php endif; ?>