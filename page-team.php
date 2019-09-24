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
<?php echo PartialRenderer::render(TEMPLATE_DIR.'/views/_partial/background-image.phtml',$entity); ?>
<style>
.large-grid .project-teaser {
    max-width: 397px;
    padding-left: 15px;
    padding-right: 10px;
}
</style>
    <div id="main-content" >
        <div class="inner" style="margin-top:-90px;width: 99%;margin-left: -40px;">
            <div class="page-content body-copy large-master-type large-grid" >
                <?Php echo $collectionHtml; ?>
                <?Php echo $collectionHtml2; ?>
            </div>
        </div>
    </div>

<?php
include('views/footer.phtml');