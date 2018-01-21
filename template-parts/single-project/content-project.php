<div class="grid__row">
    <div class="grid__col-xxs--0 grid__col-m--1"></div>
    <div class="grid__col-xxs--12 grid__col-s--7 grid__col-m--7">
        <div class="entry-body desc js-reveal">
            <?php the_content(); ?>
            <a href="#" class="link-share addthis_button_compact">
                <?= __('Partager', 'utweb-dailinh') ?>
                <?php echo getSvgIcon('share', '0 0 18 22'); ?>
            </a>
        </div>
    </div>
    <div class="grid__col-xxs--0 grid__col-s--1"></div>
    <div class="grid__col-xxs--12 grid__col-s--4 grid__col-m--3">
        <div class="entry-meta js-reveal">
            <?php while ( have_rows('ing_project_sidebar_liste_delement') ) : the_row(); ?>
                <?php if(get_sub_field('type') == 0 ): ?>
                    <label class="js-reveal" for=""><?= get_sub_field('titre') ?></label>
                    <p class="js-reveal"><?= get_sub_field('sous-titre') ?></p>
                <?php endif; ?>
                <?php if(get_sub_field('type') == 1 ): ?>
                    <p>
                        <img src="<?= get_sub_field('image') ?>" alt="<?= get_the_title() ?>" class="js-reveal">
                        <label for="" class="js-reveal"><?= get_sub_field('titre') ?></label>
                    </p>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </div>
</div>