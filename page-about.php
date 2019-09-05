<?php
/**
 * Template Name: About page
 * *
 */


get_header();
$wpEntity->init();
$entity = $wpEntity->entity;

?>
<?php  echo PartialRenderer::render(TEMPLATE_DIR.'/views/_partial/background-slideshow.phtml',$entity); ?>
    <div id="main-content" >

        <div class="project-nav standard-about-header">
            <div class="inner-wrapper">
                <div class="left-field">
                    <h1 class="page-head-h1"><?Php echo $entity->title; ?></h1>
                </div>
            </div>
        </div>

        <div class="inner">
            <div class="page-content body-copy large-master-type" >
                <?Php echo MyHelpers::pToEmptyLine($entity->content); ?>
            </div>
        </div>
    </div>

<?php
include('views/footer.phtml');
