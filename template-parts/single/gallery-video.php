<?php
$gallery_items = get_field('ing_post_images');
$galleryArray = array();
?>
<?php if($gallery_items) { ?>
    <section class="entry-gallery">
        <div class="center">
            <div class="entry-gallery__imgs">
                <?php foreach ($gallery_items as $item) : ?>
                <?php  
                    $myObj = (object) array();
                    $myObj->type = "Hình ảnh";
                    $myObj->url = $item['url'];
                    $myObj->title = $item['title'];
                    $myObj->legend = $item['caption'];
                    $galleryArray[] = $myObj;
                ?>
                    <article class="entry-gallery__img js-reveal"> 
                        <figure>
                            <img src="<?=$item['url']?>" alt="<?=$item['title']?>">
                        </figure>
                        <figcaption><?=$item['caption']?></figcaption>
                    </article>
                <?php endforeach; ?>

                <?php if( have_rows('video') ): while( have_rows('video') ): the_row(); 
                    // $item = get_sub_field('ing_post_url_video');
                    $myObj = (object) array();

                    $myObj->type = "video";
                    $myObj->url = get_sub_field('ing_post_url_video');
                    $myObj->title = get_sub_field('title');
                    $myObj->legend = get_sub_field('caption');

                    $galleryArray[] = $myObj;
                endwhile;endif; ?>
                <script>
                    var galleryArray = <?=json_encode($galleryArray);?>;
                </script>
                <?php if(get_field('ing_post_bg_video')):?>
                    <?php $image_ =  get_field('ing_post_bg_video'); ?>
                    <article class="entry-gallery__img js-reveal">
                        <h2>
                            <small class="word-breaker js-reveal"><?=__('Hình ảnh & video','virtua-swpt')?></small>
                            <span class="word-breaker js-reveal"><?=__('Thư viện','virtua-swpt')?></span>
                        </h2>

                        <a href="#" class="trigger-gallery js-reveal" data-gallery="galleryArray" data-trigger-hook="1">
                            <figure>
                                <img src="<?=$image_['url']?>" alt="<?=$image_['title']?>">
                            </figure>
                            <i><span></span></i>
                        </a>
                    </article>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php };// End If ?>