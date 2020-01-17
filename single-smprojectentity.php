<?php
/**
 * Created by PhpStorm.
 * User: Till
 * Date: 2/10/15
 * Time: 4:05 PM
 */
get_header();
$wpEntity->init();

/** @var  $entity SMProjectEntity */
$entity = $wpEntity->entity;
$categories = get_the_category($entity->id);
$catIds = array();
if(!is_array($categories)){
    $categories[] = $categories;
}

if(!empty($categories)){
    foreach($categories as $catObj){
        $catIds[] = $catObj->cat_ID;
    }
}
?>
<style>
@media only screen
and (min-width : 800px){
    .layer-menu, .project-category-menu {
        margin-left: -6px;
    }
}
</style>
<div id="main-content"  >

    <div class="inner">
       <?php echo PartialRenderer::render(TEMPLATE_DIR.'/views/_partial/single-project.phtml',$entity); ?>
    </div>

</div>
<?php
include('views/footer.phtml');