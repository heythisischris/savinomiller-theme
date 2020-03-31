<?php

get_header();
$wpEntity->init();
$entity = $wpEntity->entity;
if (strpos($_SERVER['REQUEST_URI'], 'mission')) {
    ?><script>document.getElementById('current-about-name').innerHTML='Studio'</script><?php
    /*preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $entity->content, $image); echo isset($image[1]) ? "<img class='about-banner-image' style='margin-top:120px;margin-bottom:20px;' src='".TEMPLATE_URI."/img/studio/1.jpg'>" : "";*/
?>
<style>
    body {
        margin-left:0px;
        margin-right:0px;
    }
    .about-banner-image {
        width:100%;
        height:750px;
        object-fit:cover;
    }
    p {
        margin:20px;
    }
    .page-content2 {
        margin-left: 0;
        margin-right: 0;
        width: 100%;
        text-align: left;
        font-size: 22px;
        line-height: 28px;
        padding-top: 0px;
        padding-left: 0px;
        padding-right: 0px;
        margin: 0 auto;
        color: #898D8D;
    }
    .about-link {
        color: #666666 !important;
        text-decoration: none;
        font-size:20px !important;
    }
    .about-block {
        text-align: justify;
        padding-left: 20%;
        padding-right: 20%;
        padding-top: 20px;
        padding-bottom: 20px;
    }
    .about-header {
        font-family: 'Segoe UI';
        font-weight: 800;
    }
    .top-block {
        font-size: 24px;
    }

    @media only screen
    and (min-width : 0px) and (max-width : 460px){
        .about-block {
            padding-left: 20px;
            padding-right: 20px;
            text-align: left;
        }
        .about-banner-image {
            height: 200px;
        }
        .left-image{
            float: none !important;
            width: 100% !important;
            margin-bottom: 0px !important;
        }
        .right-image{
            float: none !important;
            width: 100% !important;
            margin-top: 4px !important;
        }
        .right-block {
            font-size: 19px !important;
            line-height: 30px !important;
        }
        .top-block {
            font-size: 22px;
        }
        .mobile-top1 {
            margin-top:104px !important;
        }
        .mobile-top2 {
            padding-top:20px !important;
            padding-bottom:20px !important;
        }
    }
    @media only screen
    and (min-width : 461px) and (max-width : 750px){
    }
    @media only screen
    and (min-width : 751px) and (max-width : 1000px){
    }
</style>
<div id="main-content" >
    <div class="inner">
        <div class="page-content2">
            <?php echo get_the_content(); ?>
        </div>
    </div>
</div>    
    
    <?php
}

else if (strpos($_SERVER['REQUEST_URI'], 'contact')) {
    preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $entity->content, $image); echo isset($image[1]) ? "<img class='about-banner-image' src='".$image[1]."'>" : "";
?>
<style>
    .about-banner-image {
        width:100vw;
        height:605px;
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
        font-size:20px !important;
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