<?php
/**
 * Template Name: Awards
 * *
 */

get_header();
$wpEntity->init();
$entity =$wpEntity->entity;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

include(TEMPLATE_DIR.'/controller/CatTagSearchController.php');
$catTagSearchController = new CatTagSearchController();
$catTagSearchController->postType = 'smawardentity';
$catTagSearchController->run($wpEntity);
$casestudies = $catTagSearchController->entityCollection;


$collectionHtml = '';
if(!empty($casestudies)){
    foreach($casestudies as $casestudy){
        $collectionHtml.= PartialRenderer::render(TEMPLATE_DIR.'/views/_partial/award-teaser.phtml',$casestudy);
    }
}
?>
<script>document.getElementById('current-about-name').innerHTML='Awards'</script>
    <div id="main-content" >
        <div class="inner">
            <div class="page-content body-copy large-master-type" >
                <?Php echo $collectionHtml; ?>
            </div>
        </div>
    </div>

<?php
include('views/footer.phtml');