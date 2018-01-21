<?php
    $background_image_gallery = get_field('background_image_gallery');
    while ( have_rows('ing_project_img_video_list') ) : the_row();
    $gallery_items = get_sub_field('ing_project_image');
    $video_items = get_sub_field('ing_project_video_items');
?>
<?php if ( $gallery_items || $video_items ) : ?>
<section class="project__gallery">
    <div class="grid__row">
        <div class="grid__col-xxs--12">
            <h2>
                <small class="word-breaker js-reveal"><?=__('Photos & vidéos','utweb-dailinh')?></small>
                <span class="word-breaker js-reveal"><?=__('Galerie','utweb-dailinh')?></span>
            </h2>
        </div>
        <div class="grid__col-xxs--0 grid__col-s--1 grid__col-m--1"></div>
        <div class="grid__col-xxs--12 grid__col-s--10 grid__col-m--10">
            <?php
            $galleryArray = array();

            foreach ($gallery_items as $item) :
                $myObj = (object) array();

                $myObj->type = "photo";
                $myObj->url = $item['url'];
                $myObj->title = $item['title'];
                $myObj->legend = $item['caption'];

                $galleryArray[] = $myObj;
            endforeach;

            while ( have_rows('ing_project_video_items') ) : the_row();
                $item = get_sub_field('ing_project_url_video');
                $myObj = (object) array();

                $myObj->type = "video";
                $myObj->url = $item['url'];
                $myObj->title = $item['title'];
                $myObj->legend = $item['caption'];

                $galleryArray[] = $myObj;
            endwhile;

            ?>
            <script>
                var galleryArray = <?=json_encode($galleryArray);?>;
            </script>

            <a href="#" class="trigger-gallery js-reveal" data-gallery="galleryArray" data-trigger-hook="1">
                <figure>
                    <img src="<?=$background_image_gallery?>" alt="">
                </figure>
                <i><span></span></i>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>
<?php endwhile; ?>