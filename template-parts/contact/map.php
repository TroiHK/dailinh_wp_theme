<?php global $sprite; ?>
<div class="grid">
    <section class="project__localisation">
        <?php if( have_rows('map_section') ): while( have_rows('map_section') ): the_row();?>
        <?php 
        $key = get_sub_field('map_key');
        $style = array(
            'style=feature:all|element:labels.text.fill||color:0x797979',
            'style=feature:all|element:labels.text.stroke|visibility:off|color:0xffffff|lightness:16',
            'style=feature:all|element:labels.icon|visibility:off',
            'style=feature:administrative|element:geometry.fill|color:0xfefefe|lightness:20',
            'style=feature:administrative|element:geometry.stroke|color:0xfefefe|lightness:17|weight:1.2',
            'style=feature:landscape|element:geometry|color:0xd4d4d4',
            'style=feature:poi|element:geometry|color:0xf5f5f5|lightness:21',
            'style=feature:poi.park|element:geometry|color:0xdedede|lightness:21',
            'style=feature:road.highway|element:geometry.fill|color:0xffffff|lightness:17',
            'style=feature:road.highway|element:geometry.stroke|color:0xffffff|lightness:29|weight:0.2',
            'style=feature:road.arterial|element:geometry|color:0xffffff|lightness:18',
            'style=feature:road.local|element:geometry|color:0xffffff|lightness:16',
            'style=feature:transit|element:geometry|color:0xf2f2f2|lightness:19',
            'style=feature:water|element:geometry|color:0xb2b2b2'
        );

        $url = 'https://maps.googleapis.com/maps/api/staticmap?center=Rue Centrale 9, 1003 Lausanne, Suisse&zoom=14&size=1280x400&scale=2&format=jpg&'.implode('&', $style).'&key='.$key;
        ?>
        <div class="grid__row">
            <div class="grid__col-xxs--12">
                <h2>
                    <small class="word-breaker js-reveal"><?php the_sub_field('small_text'); ?></small>
                    <span class="word-breaker js-reveal"><?php the_sub_field('title'); ?></span></h2>
            </div>
        </div>

        <div class="grid__row">
            <div class="grid__col-xxs--0 grid__col-s--1"></div>
            <div class="grid__col-xxs--12 grid__col-s--10">
                <div class="project__localisation-map js-reveal">
                    <a href="<?php the_sub_field('google_map_url'); ?>" target="_blank"><img src="<?php echo $url; ?>" alt=""></a>

                    <i class="icon icon__marker">
                        <svg viewBox="0 0 55 80" class="svg__marker">
                            <use xlink:href="<?php echo $sprite; ?>#svg-marker"></use>
                            <use xlink:href="#svg-marker"></use>
                        </svg>
                    </i>
                </div>
                <div class="project__localisation-address js-reveal">
                    <p>
                        <?php the_sub_field('map_address'); ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="grid__row">
            <div class="grid__col-xxs--0 grid__col-s--1"></div>
            <div class="grid__col-xxs--12 grid__col-s--10">
                <a href="<?php the_sub_field('google_map_url'); ?>" class="link" target="_blank">Nous Trouver sur google map</a>
            </div>
        </div>
        <?php endwhile;endif; ?>
    </section>
</div>