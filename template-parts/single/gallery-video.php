<?php
$gallery_items = get_field('ing_post_images');
$galleryArray = array();
?>
<?php if($gallery_items) { ?>
    <section class="entry-gallery">
        <div class="center">
            <div class="entry-gallery__imgs">
                <?php foreach ($gallery_items as $item) : ?>
                    $myObj = (object) array();
                    $myObj->type = "Hình Ảnh";
                    $myObj->url = $item['url'];
                    $myObj->title = $item['title'];
                    $myObj->legend = $item['caption'];
                    $galleryArray[] = $myObj;
                <?php endforeach; ?>
                
                <?php if($galleryArray):?>
                    <?php $image_ =  $galleryArray[0]; ?>
                    <script>
                        var galleryArray = <?=json_encode($galleryArray);?>;
                    </script>
                    <article class="entry-gallery__img js-reveal">
                        <h2>
                            <span class="word-breaker js-reveal"><?=__('Hình Ảnh','utweb-dailinh')?></span>
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