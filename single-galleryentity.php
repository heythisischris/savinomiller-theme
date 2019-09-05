<?php
get_header();
$wpEntity->init();
$entity = $wpEntity->entity;
?>
    <main id="main-content">

        <div class="inner">
            <?php echo PartialRenderer::render(TEMPLATE_DIR.'/views/partial/tall-gallery.phtml',$entity); ?>
        </div>
    </main>
    <script>
        $(document).ready(function(){
            scaleSlides();
            buildMasterGrid();

        });
    </script>
<?php
include('views/footer.phtml');