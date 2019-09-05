<?php

get_header();
$wpEntity->init();
$entity = $wpEntity->entity;


?>


<div id="main-content" >
    <div class="inner">
        <div class="page-content body-copy" >
            <?Php echo MyHelpers::pToEmptyLine($entity->content); ?>
        </div>
    </div>

</div>
<?php //echo PartialRenderer::render(TEMPLATE_DIR.'/views/_partial/background-slideshow.phtml',$entity); ?>

<?php
include('views/footer.phtml');