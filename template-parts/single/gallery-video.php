<?php
$gallery_items = get_field('ing_post_images');
$galleryArray = array();
?>
<?php if($gallery_items) { ?>
    <section class="entry-gallery">
        <div class="center">
            <div class="entry-gallery__imgs">
                <?php foreach ($gallery_items as $item) : ?>
                    <article class="entry-gallery__img js-reveal"> 
                        <figure>
                            <img src="<?=$item['url']?>" alt="<?=$item['title']?>">
                        </figure>
                        <figcaption><?=$item['caption']?></figcaption>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php };// End If ?>