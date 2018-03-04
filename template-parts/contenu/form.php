<section class="content__form">
    <div class="grid">
        <div class="grid__row">
            <div class="grid__col-xxs--0 grid__col-m--2"></div>
            <div class="grid__col-xxs--12 grid__col-s--8 grid__col-m--8 grid__col-m--no-gutter">
                <h2>
                    <span class="word-breaker js-reveal"><?=get_sub_field('titre')?></span></h2>
            </div>
        </div>
        <div class="grid__row">
            <div class="grid__col-xxs--0 grid__col-m--2"></div>
            <div class="grid__col-xxs--12 grid__col-s--8 grid__col-m--8 grid__col-m--no-gutter">
                <div class="entry-body js-reveal ing-custom-content frm_form_fields">
                    <?php echo do_shortcode(''.get_sub_field('form_shortcode').''); ?>
                </div>
            </div>
        </div>
    </div>
</section>