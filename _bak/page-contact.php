<?php
/**
 * Template Name: Contact page
 * *
 */
//

get_header();
$wpEntity->init();

$collectionHtml = '';
$slidesHtml = '';
$entity = $wpEntity->entity;
$currentNode = $entity->id;
$text = $entity->content;
$collection = array();
$collection[] = $wpEntity->getEntity(653);
$collection[] = $wpEntity->getEntity(655);


if(isset($entity->featuredImage)){
    $entity->featuredImage->resize(1600,1032,1);
    $slidesHtml = '<section class="block-slide">
  <div class="longscroll-image-slide" >'.$entity->featuredImage->imgtagsized.'</div>
</section>';
}

foreach($collection as $entity){
    $collectionHtml.= PartialRenderer::render(TEMPLATE_DIR.'/views/location/location-location.phtml',$entity);
};
?>
    <article id='article-<?php echo $id; ?>' class="standardpage scrollunder" >
        <section class="interaction-layer" >
            <nav class='subnav inner-col hidden' >
                <?php
                //wp_nav_menu(array('theme_location' => 'team-sub-menu'));
                ?>
            </nav>

        </section>

        <div id="content-overlay">
            <div class="body-copy">
                <?php echo $collectionHtml;?>
                <div class="contact-text">
                    <?php echo MyHelpers::pToEmptyLine($text); ?>
                </div>
            </div>
        </div>

        <section class='content-underlay' >
            <div class="slides" >
                <?php echo  $slidesHtml; ?>
            </div>
        </section>
    </article>
<script>
    $(document).ready(function(){
        $('.contact-text').append('<div class="social-wrapper">'+$('footer .social-wrapper').html()+'</div>');
    });

</script>

<?php
include('views/footer.phtml');