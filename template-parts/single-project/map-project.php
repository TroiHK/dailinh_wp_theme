<?php
    while ( have_rows('ing_project_infos') ) : the_row();

    $map_infors = get_sub_field('ing_project_location');

    if ( $map_infors ) :

    $key = "AIzaSyD490BYkl2Ko_qeRqmMtGXv7aLCElvdxxA";
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

    $url = 'https://maps.googleapis.com/maps/api/staticmap?center='.$map_infors['address'].'&zoom=13&size=1280x400&scale=2&format=jpg&'.implode('&', $style).'&key='.$key;
?>
<section class="project__localisation">
    <div class="grid__row">
        <div class="grid__col-xxs--12">
            <h2>
                <small class="word-breaker js-reveal"><?=__('Carte','utweb-dailinh')?></small>
                <span class="word-breaker js-reveal"><?=__('Localisation','utweb-dailinh')?></span></h2>
        </div>
    </div>

    <div class="grid__row">
        <div class="grid__col-xxs--1 grid__col-s--1"></div>
        <div class="grid__col-xxs--11 grid__col-s--10">
            <div class="project__localisation-map js-reveal">
                <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $map_infors['address']; ?>" target="_blank">
                    <img src="<?php echo $url; ?>" alt="<?php echo $map_infors['address']; ?>">
                </a>

                <?php echo getSvgIcon('marker', '0 0 55 80'); ?>
            </div>
            <div class="project__localisation-address js-reveal">
                <?php echo get_sub_field('address_custom'); ?>
                <span><?php echo get_sub_field('ing_project_map_ville'); ?></span>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php endwhile; ?>
