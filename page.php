<?php
global $modulejs;
$modulejs = 'home';
get_header();
?>
<section class="section">
    <?php get_template_part( 'template-parts/contenu/headline' ); ?>
    <!--Content Body-->
    <?php if(get_the_content() != '') : ?>
        <section class="content__body">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__col-xxs--0 grid__col-m--2"></div>
                    <div class="grid__col-xxs--12 grid__col-m--8">
                        <div class="entry-body js-reveal">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!--headline-->
    <?php
        if( have_rows('ing_page_contenu') ):
            while ( have_rows('ing_page_contenu') ) : the_row();
                switch ( get_row_layout() ) {
                    case 'ing_con_team_member':
                        get_template_part( 'template-parts/contenu/member' );
                        break;
                    case 'ing_con_w_meta':
                        get_template_part( 'template-parts/contenu/w-meta' );
                        break;
                    case 'ing_con_slider':
                        get_template_part( 'template-parts/contenu/slider' );
                        break;
                    case 'ing_con_baseline':
                        get_template_part( 'template-parts/contenu/baseline' );
                        break;
                    case 'ing_con_gallery':
                        get_template_part( 'template-parts/contenu/gallery' );
                        break;
                    case 'ing_con_body':
                        get_template_part( 'template-parts/contenu/content-body' );
                        break;
                    case 'ing_con_text':
                        get_template_part( 'template-parts/contenu/content-text' );
                        break;
                    case 'ing_con_time_line':
                        get_template_part( 'template-parts/contenu/time-line' );
                        break;
                    case 'titre_et_form_shortcode':
                        get_template_part( 'template-parts/contenu/form' );
                        break;
                    default:
                        break;
                }
            endwhile;
        endif;// End if
    ?>
</section>
<?php
get_footer();
?>