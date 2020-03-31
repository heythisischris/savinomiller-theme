<?php
/**
 * Template Name: Team
 * *
 */

get_header();
$wpEntity->init();
$entity = $wpEntity->entity;

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

include(TEMPLATE_DIR.'/controller/CatTagSearchController.php');
$catTagSearchController = new CatTagSearchController();
$catTagSearchController->postType = 'smpersonentity';
$catTagSearchController->run($wpEntity);
$casestudies = $catTagSearchController->entityCollection;

$casestudies = array_reverse($casestudies);

$collectionHtml = '';
$collectionHtml2 = '';
if(!empty($casestudies)){
    foreach($casestudies as $casestudy){

        if(isset($isSingle) && $isSingle == true){
            if($entity->id == $casestudy->id){
                $collectionHtml.= PartialRenderer::render(TEMPLATE_DIR.'/views/_partial/team-teaser.phtml',$casestudy);
            }
        }else{
            if($casestudy->type == 'first-row'){
                $collectionHtml.= PartialRenderer::render(TEMPLATE_DIR.'/views/_partial/team-teaser.phtml',$casestudy);
            }else{
                $collectionHtml2.= PartialRenderer::render(TEMPLATE_DIR.'/views/_partial/team-teaser.phtml',$casestudy);
            }
        }
    }
}
?>
<script>document.getElementById('current-about-name').innerHTML='Team'</script>
<?php echo PartialRenderer::render(TEMPLATE_DIR.'/views/_partial/background-image.phtml',$entity); ?>
<style>
    /*
.large-grid .project-teaser {
    margin:0px;
    width:initial;
    max-width: 19.75vw;
    margin-left: 2.6vw;
    margin-right: 2.6vw;
}
.page-template-page-team .large-grid {
    margin-left: 0px;
    margin-right: 0px;
}*/
.about-banner-image {
    width:100%;
    height:750px;
    object-fit:contain;
}
#main-content {
    margin-bottom: 85vh;
}
.person-info {
    margin-bottom: 30px;
    margin-top: -10px;
}
@media only screen
and (max-width: 2600px) and (min-width: 1200px){
    .grid-padding {
        padding-left: 200px;
        padding-right: 200px;
    }
}
@media only screen
and (min-width : 1600px) and (max-width : 2600px){
    .about-banner-image {
        margin-top:120px !important;
    }
}
@media only screen
and (min-width : 1280px) and (max-width : 1600px){
    .about-banner-image {
        margin-top:20px !important;
    }
}

@media only screen
and (min-width : 0px) and (max-width : 460px){
    .about-banner-image {
        height: 200px;
        margin-top:104px !important;
        margin-bottom:-60px !important;
    }
    .project-teaser img {
        object-fit: contain !important;
    }
    .project-teaser .thumb img {
        height: 255px !important;
    }
    .project-teaser {
        width: 40% !important;
        margin: 5% !important;
        margin-bottom: -50px !important;
    }
    .thumb {
        height: 195px !important;
    }
    .page-content {
        margin-top: -150px !important;
    }
    h2 {
        font-size: 17px !important;
    }
    .subline {
        font-size: 17px !important;
    }
    #FeaturedImage img {
        margin-top: 64px !important;
        height: 225px !important;
        object-fit: contain !important;
        margin-bottom: 20px !important;
    }
    #main-content {
        margin-bottom: unset;
    }
}
</style>
    <div id="main-content" class="grid-padding">
    <?php if (strpos($_SERVER['REQUEST_URI'], 'staff')) { ?>
    <img class='about-banner-image' style='margin-bottom:20px;' src='<?php echo TEMPLATE_URI ?>/img/studio/1.jpg'>
    <?php } ?>
        <div class="inner" style="margin-top:-90px;">
            <div class="page-content body-copy large-master-type large-grid">
                <?Php echo $collectionHtml; ?>
                <?Php echo $collectionHtml2; ?>
            </div>
        </div>
    </div>
<?php
include('views/footer.phtml');