<?php
/**
 * Template Name: Video landing page
 * *
 */

// This is also used by single-videoentity
//

get_header();
$wpEntity->init();
$entity = $wpEntity->entity;
$text = $entity->content;
$collection = array($entity);
$collectionHtml = '';

if(!isset($isSingle) || $isSingle == false){
    $collection = array();
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object($locations['video-menu']);
    $menuArray = wp_get_nav_menu_items($menu->term_id);
    $casestudies = array();
    //print_r($menuArray);
    foreach($menuArray as $menuItem){
        if(isset($menuItem->ID)){
            //print_r($menuItem);
            $entityForBlock = $wpEntity->getEntity($menuItem->object_id);
            $entityForBlock->menuHook = $menuItem->ID;
            $collection[] = $entityForBlock;
        }
    }
}


if(!empty($collection)){
    $i= 1;
    foreach($collection as $entity){
        $entity->index = $i;
        //echo print_r($entity->categories);
        $collectionHtml.= PartialRenderer::render(TEMPLATE_DIR.'/views/video/video-teaser.phtml',$entity);
    };
}


include(TEMPLATE_DIR.'/views/center-scrolling-layout.phtml');
?>
    <script>
        $(document).ready(function(){
            $('#menu-item-160').addClass('current-menu-item');

        });
    </script>
<?php

include('views/footer.phtml');