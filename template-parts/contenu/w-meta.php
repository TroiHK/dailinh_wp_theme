<section class="content__body-w-meta">
    <div class="grid">
        <div class="grid__row">
            <div class="grid__col-xxs--12 grid__col-m--4">
                <h2>
                    <span class="word-breaker js-reveal"><?=get_sub_field('ing_con_pro_title')?></span></h2>
            </div>
        </div>
        <div class="grid__row">
            <div class="grid__col-xxs--0 grid__col-m--2"></div>
            <div class="grid__col-xxs--12 grid__col-s--8 grid__col-m--5 grid__col-m--no-gutter">
                <div class="entry-body js-reveal ing-custom-content">
                    <p><?=get_sub_field('description')?></p>
                </div>
            </div>
            <div class="grid__col-xxs--0 grid__col-s--1"></div>
            <div class="grid__col-xxs--12 grid__col-s--3 grid__col-m--3">
                <div class="entry-meta js-reveal">
                    <?php
                        foreach (get_sub_field('ing_con_pro_list_element') as $item){
                            if($item['type'] == 0){
                                echo '
                                    <label class="js-reveal" for="">'.$item['titre'].'</label>
                                    <p class="js-reveal">'.$item['sous-titre'].'</p>
                                ';
                            }
                            if($item['type'] == 1){
                                echo '
                                    <img src="'.wp_get_attachment_image_src($item['image'], 'full')[0].'" alt="" class="js-reveal">
                                    <label for="" class="js-reveal">'.$item['titre'].'</label>
                                ';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
