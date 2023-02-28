<?php
    if (!is_front_page()) { ?>
        <div class="container-breadcrumb"><div class="breadcrumb"><div class="atualizado-em" id="container-breadcrumb_texto">Você está aqui: </div><?php echo do_shortcode( '[flexy_breadcrumb]'); ?></div></div>
    <?php
    }
?>