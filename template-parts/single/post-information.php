<div class="grid">
    <div class="grid__row">
        <div class="grid__col-xxs--0 grid__col-m--1"></div>
        <?php if ( is_singular('post') ) : ?>
            <div class="grid__col-xxs--12 grid__col-m--7">
        <?php else : ?>
            <div class="grid__col-xxs--12 grid__col-m--5 grid__col-l--4">
        <?php endif; ?>
            <?php
                $category_  =  get_the_category(get_the_ID());
                $output     = "";
                if ( ! empty( $category_ ) ) {
                    foreach( $category_ as $category ) {
                        if($category->slug != 'non-classifiee'){
                            if ($category === end($category_)){
                                $output .= $category->name;
                            }else{
                                $output .= $category->name.', ';
                            }
                        }
                    }

                }
            ?>
            <?php if($output){ ?>
            <div class="entry-category word-breaker js-reveal"><?=$output?></div>
            <?php } ?>
            <div class="entry-meta">
                <label class="js-reveal" for=""><?=__('Ngày đăng','utweb-dailinh');?></label>
                <p class="js-reveal"><?php echo get_the_date( 'd - m - Y'); ?></p>
            </div>

            <div class="entry-body js-reveal">
                <p><?php the_content();?></p>
                <a href="#" class="link-share addthis_button_compact">
                    <?=__('Chia sẽ bài viết','utweb-dailinh');?>
                    <?php echo getSvgIcon('share', '0 0 18 22'); ?>
                </a>
            </div>
        </div>
    </div>
</div>