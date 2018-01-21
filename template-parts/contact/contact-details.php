<div class="grid__col-xxs--12 grid__col-s--4 grid__col-m--3">           
    <div class="entry-meta js-reveal">
        <?php if( have_rows('address') ): while( have_rows('address') ): the_row();?>
        <label class="js-reveal" for=""><?php the_sub_field('title'); ?></label>
        <p class="js-reveal">
            <?php the_sub_field('address'); ?>
        </p>
        <?php endwhile;endif; ?>
        <?php if(get_field('tel')){ ?>
            <label class="js-reveal inline" for="">Tel. <strong><?php echo get_field('tel'); ?></strong></label>
        <?php } ?>
        <?php if(get_field('fax')){ ?>
            <label class="inline js-reveal" for="">Fax. <strong><?php echo get_field('fax'); ?></strong></label>
        <?php } ?>
        <?php if(get_field('email')){ ?>
            <label class="js-reveal" for="">Email</label>
            <p class="js-reveal"><a href="mailto:<?php echo get_field('email'); ?>"><?php echo get_field('email'); ?></a></p>
        <?php } ?>
    </div>
</div>