<nav class="main-nav">
	<div class="navigation">
		<div class="grid">
			<div class="grid__row">

				<?php if ( have_rows('ingphi_menus', 'option') ) : ?>
                        <?php foreach (get_field('ingphi_menus','option')[0] as $menu_item) { ?>
                            <div class="grid__col-xxs--12 grid__col-s--4">
                                <?php if( $menu_item['0']['menu_title_text_opt'] != ""){ ?>
                                    <h3>
                                        <a href="<?php echo $menu_item[0]['menu_title_link_opt']; ?>">
                                            <?=$menu_item['0']['menu_title_text_opt']?>
                                        </a>
                                    </h3>
                                <?php } ?>
                                <?php if( $menu_item['0']['menu_location'] != ""){ ?>
                                    <?php wp_nav_menu( array('theme_location' => $menu_item['0']['menu_location'] ,'container' => false, 'menu_class' => 'menu nav navbar-nav responsive-nav main-nav-list')); ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
				<?php endif; ?>
				
			</div>
		</div>
		<footer>
			<div class="grid">
				<div class="grid__row">
					<div class="grid__col-xxs--12">
						<?php wp_nav_menu( array('theme_location' => 'footer_menu' ,'container' => false, 'menu_class' => 'footer-link')); ?>
					</div>
				</div>
			</div>
		</footer>
	</div>
</nav>