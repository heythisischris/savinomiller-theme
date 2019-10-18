<?php

get_header();
$wpEntity->init();
$entity = $wpEntity->entity;
if (strpos($_SERVER['REQUEST_URI'], 'mission')) {
    ?><script>document.getElementById('current-about-name').innerHTML='Studio'</script><?php
}

if (strpos($_SERVER['REQUEST_URI'], 'contact') || strpos($_SERVER['REQUEST_URI'], 'mission')) {
    preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $entity->content, $image); echo isset($image[1]) ? "<img class='about-banner-image' src='".$image[1]."'>" : "";
?>
<style>
    .about-banner-image {
        width:100vw;
        height:500px;
        object-fit:cover;
    }
    p {
        margin:20px;
    }
    .page-content .body-copy {
        margin-bottom:60px;
    }
    .about-link {
        color: #666666 !important;
        text-decoration: none;
    }
</style>
<div id="main-content" >
    <div class="inner">
        <div class="page-content body-copy" >
            <?Php echo preg_replace("/<img[^>]+\>/i", "", preg_replace("/<video[^>]+\>/i", "", $entity->content)); ?>
        </div>
    </div>
</div>

<?php } else { ?>

<div id="main-content" >
    <div class="inner">
        <div class="page-content body-copy" >
            <?Php echo MyHelpers::pToEmptyLine($entity->content); ?>
        </div>
    </div>
</div>
<?php } ?>
<?php //echo PartialRenderer::render(TEMPLATE_DIR.'/views/_partial/background-slideshow.phtml',$entity); ?>

<?php
include('views/footer.phtml');