<section class="content__body-w-img" id="<?=get_sub_field('id');?>">
    <div class="grid">
        <div class="grid__row">

            <div class="grid__col-m--6 grid__col-xxs--12 <?=get_sub_field('image_align') == "right" ? "u-right" : "";?>"> 
                <figure class="entry-img js-reveal <?=((get_sub_field('image_offset_top')) ? 'offset-top' : '')?>">
                    <img src="<?=get_sub_field('ing_con_team_image')?>" alt="">
                </figure>
            </div>
            <div class="grid__col-m--1 grid__col-xxs--0"></div>
            <div class="grid__col-m--4 grid__col-s--9 grid__col-xxs--12">
                <div class="entry-body js-reveal">
                    <p><?=get_sub_field('ing_con_team_des');?></p>
                    <?php if(get_sub_field('url_link') != '') : ?>
                        <a href="<?=get_sub_field('url_link')?>" class="link"><?=((get_sub_field('title_link') != '') ? get_sub_field('title_link') : __('LOREM IPSUM','utweb-dailinh'))?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>