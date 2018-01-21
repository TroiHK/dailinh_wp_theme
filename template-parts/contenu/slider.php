<section class="content__slider">
    <div class="grid">
        <div class="grid__row">
            <div class="grid__col-xxs--12 grid__col-m--4">
                <h2>
                    <span class="word-breaker js-reveal"><?=get_sub_field('title')?></span></h2>

                <div class="grid__row">
                    <div class="grid__col-xxs--0 grid__col-s--1 grid__col-m--3"></div>
                    <div class="grid__col-xxs--12 grid__col-s--8 grid__col-m--9">
                        <div class="desc js-reveal">
                            <p class="c-grey-light"><?=get_sub_field('description')?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid__col-xxs--0 grid__col-s--3 grid__col-m--1"></div>
            <div class="grid__col-xxs--12 grid__col-s--8 grid__col-m--6">
                <div class="slider-icon js-reveal" data-slider="true">
                    <?php
                        if(count(get_sub_field('select_gallery_image')) > 0){
                            foreach (get_sub_field('select_gallery_image') as $image){
                                echo '
                                    <article class="slide">
                                        <figure>
                                            <img src="'.$image['sizes']['iconiques-thumbnail'].'" alt="">
                                        </figure>
                                    </article>
                                ';
                            }
                        }
                    ?>
                    <figcaption>
                        <span><?=get_sub_field('caption')?></span>
                    </figcaption>
                </div>
            </div>
        </div>
    </div>
</section>