<header class="page-header">
    <div class="grid">
        <div class="grid__row">
            <div class="grid__col-xxs--0 grid__col-m--1"></div>
            <div class="grid__col-xxs--12 grid__col-m--9">
                <ul class="breadcrumb js-reveal">
                    <li><a href="<?=get_home_url();?>"><?=__('Home','utweb-dailinh');?></a></li>
                    <?php if(get_field('blog_page','option')){ ?>
                        <li><a href="<?php echo get_permalink(icl_object_id(get_field('blog_page','option'), 'page', true)); ?>" class="current"><?=__('Actualités','utweb-dailinh');?></a></li>
                    <?php }else{ ?>
                        <li><a href="<?php echo get_permalink(icl_object_id(306, 'page', true)); ?>" class="current"><?=__('Actualités','utweb-dailinh');?></a></li>
                    <?php } ?>
                </ul>
                <h1 class="word-breaker js-reveal"><?=get_the_title();?></h1>
            </div>
            <div class="grid__col-xxs--12 grid__col-m--2 grid__col-m--no-gutter u-right">
                <?php
                    if(get_field('projet_lie_post')){
                        $project_ = get_field('projet_lie_post');
                        echo '<a href="'.get_the_permalink($project_).'" class="link link-project">'.get_the_title($project_).'</a>';
                    }
                ?>
            </div>
        </div>
    </div>
</header>