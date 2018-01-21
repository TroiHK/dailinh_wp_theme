<?php
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'order'               => 'DESC',
        'orderby'             => 'date',
        'meta_query'     => array(
            array(
                'key'     => 'projet_lie_post',
                'value'   => get_the_id(),
                'compare' => '=',
            ),
        ),

    );
    
    $query = new WP_Query( $args );
    
    if ( $query->have_posts() ) :
?>
<section class="project__news">
    <div class="grid__row">
        <div class="grid__col-xxs--12">
            <h2>
                <span class="word-breaker js-reveal"><?= __('Acutalité','utweb-dailinh') ?></span></h2>
        </div>

        <div class="grid__col-xxs--0 grid__col-s--1 grid__col-m--1"></div>
        <div class="grid__col-xxs--12 grid__col-s--9 grid__col-m--7">
            <div class="news__teaser-slider js-reveal">
                <?php
                $i = 0;
                while ( $query->have_posts() ) : $query->the_post();
                    if($i % 4 == 0){
                        echo '<div class="news__teaser-slide">';
                    }
                    ?>
                        <div class="news__teaser">
                            <a href="<?php echo get_permalink(); ?>">
                                <span class="news__teaser-date"><?php echo get_the_date( 'd.m.Y'); ?></span>
                                <span class="news__teaser-title"><?php echo get_the_title(); ?></span>
                                <span class="news__teaser-desc">
                                    <?php echo get_custom_excerpt( get_the_excerpt(), 50 ) . '...'; ?>
                                </span>
                                <i class="arrow-right"></i>
                            </a>
                        </div>
                    <?php
                    if(($i + 1) % 4 == 0 || $i == $query->found_posts){
                        echo '</div>';
                    }
                    $i++;
                endwhile;
                ?>
            </div>
        </div>
    </div>
</section>
<?php endif; wp_reset_query(); ?>