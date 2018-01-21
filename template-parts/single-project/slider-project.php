<?php
if(get_field('ing_project_process')) :
    $process_items = get_field('ing_project_process');
?>
<div class="center">
    <div class="project__progression">
        <div class="project__progression-imgs js-reveal">
            <?php
            $curent = 0;
            $i = 1;
            foreach ($process_items as $item){
                if($item['ing_project_pro_active'] == 1){
                    $curent = $i;
                }
                $i++;
            }
            $i = 1;
            foreach ($process_items as $item){
                echo '
                    <figure class="project__progression-img active">
                        <div class="inner js-lazy" data-src="'.$item['ing_project_pro_img'].'"></div>
                    </figure>  
                 ';
                if($i == $curent) break;
                $i++;
            }
            ?>
        </div>
        <ul class="project__progression-label js-reveal">
            <?php
            $i = 1;
            foreach ($process_items as $item){
                echo '
                        <li class="'.($item['ing_project_pro_active'] == 1 ? 'active' : '').' '.($i == $curent ? 'current' : '').'">
                            <span>'.$item['ing_project_pro_name'].'</span>
                            <i></i>
                        </li>
                        ';
                $i++;
            }
            ?>
        </ul>
    </div>
</div>
<?php endif; ?>