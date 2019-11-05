<?php
/**
 * Template Name: Project Overview
 * *
 */

get_header();
$wpEntity->init();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

include(TEMPLATE_DIR.'/controller/CatTagSearchController.php');
$catTagSearchController = new CatTagSearchController();
$catTagSearchController->postType = 'smprojectentity';
$catTagSearchController->run($wpEntity);
$casestudies = $catTagSearchController->entityCollection;


$collectionHtml = '';
if(!empty($casestudies)){
    if (count($orderArray)>1) {
        $lookup = array_column($casestudies, NULL, 'title');
        foreach($orderArray as $postOrder) {
            if (array_key_exists($postOrder,$lookup)) {
                $collectionHtml.= PartialRenderer::render(TEMPLATE_DIR.'/views/project/project-teaser.phtml',$lookup[$postOrder]);
            }
        }
    }
    else {
        foreach($casestudies as $index=>$casestudy){$collectionHtml.= PartialRenderer::render(TEMPLATE_DIR.'/views/project/project-teaser.phtml',$casestudy);}
    }
    //echo '<script>console.log('.json_encode($casestudies).');</script>';
}
?>
<div id="main-content" class="grid-padding">
    <div class="inner">
        <div class="large-grid" style="text-align:center" >
            <?php echo $collectionHtml; ?>
        </div>
    </div>
</div>

    <script>
        $(document).ready(function(){

            <?php
            if(isset($catTagSearchController->currentCat)){
            ?>

            var currentCat = <?Php echo $catTagSearchController->currentCat->cat_ID; ?>;
            var currentCatName = '<?Php echo $catTagSearchController->currentCatName; ?>';
            //$('.cat-item-'+currentCat).addClass('current-menu-item');
            $('#desktop-menu #current-cat-name').html(currentCatName);
            myTrace(currentCatName);
            <?Php
            }
            ?>
            //$('.project-category-menu').fadeIn('slow');

        });

    </script>

<?php
include('views/footer.phtml');