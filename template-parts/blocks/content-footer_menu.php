<?php if ( have_rows('ingphi_menus', 'option') ) : ?>
    <?php foreach (get_field('ingphi_menus','option')[0] as $menu_item) { ?>
        <div class="grid__col-xxs--0 grid__col-s--2 grid__col-m--2">
            <?php if( $menu_item['0']['menu_title_text_opt'] != ""){ ?>
                <h4>
                    <a href="<?php echo get_sub_field('menu_title_link_opt'); ?>">
                        <?=$menu_item['0']['menu_title_text_opt']?>
                    </a>
                </h4>
            <?php } ?>
            <?php if( $menu_item['0']['menu_location'] != ""){ ?>
                <?php wp_nav_menu( array('theme_location' => $menu_item['0']['menu_location'] ,'container' => false, 'menu_class' => 'menu nav navbar-nav responsive-nav main-nav-list')); ?>
            <?php } ?>
        </div>
    <?php } ?>
<?php endif; ?>
