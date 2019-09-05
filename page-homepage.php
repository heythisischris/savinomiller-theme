<?php
/**
 * Template Name: Homepage
 * *
 */

get_header();
$wpEntity->init();
//homepage slide
$entity = $wpEntity->entity;

//print_r($entity);

?>
<div id="main-content"  >

        <div class="inner fullscreen">
            <?php
            $i = 1;
            while($i <= 21){

                $slide = array();
                $slide['sectionTitle'] = $entity->fetchMetaValue('SRGBEpost'.$i.'sectionTitle');
                $slide['outboundLink'] = $entity->fetchMetaValue('SRGBEpost'.$i.'outboundLink');
                $slide['imageId'] = $entity->fetchMetaValue('SRGBEpost'.$i.'imgadv');
                $slide['text'] = $entity->fetchMetaValue('SRGBEpost'.$i.'wysiwyg');
                $slide['pages'] = $entity->fetchMetaValue('SRGBEpost'.$i.'pages');
                $entity->slides[] = $slide;
                $i++;
            }
            /*
            if(!empty($imageGallery1)){

                if(is_array($imageGallery1)){
                    foreach($imageGallery1 as $image){
                        $entity->imageGallery1[] = new MediaEntity($image);
                    }
                }else{
                    $entity->imageGallery1[] = new MediaEntity($imageGallery1);
                }
            }*/
            echo PartialRenderer::render(TEMPLATE_DIR.'/views/_partial/homepage-slideshow.phtml',$entity); ?>
        </div>
</div>

    <script>
        $(document).ready(function(){
            //fullscreenImages();
            var timeout = setTimeout("$('#slideshow').fadeIn();",2000);
            executeAsInterval('fullscreenImages');
        });

        var oldWidth = 0;
        var oldHeight = 0;
        function fullscreenImages(){


            if(oldWidth != windowWidth || oldHeight != windowHeight){
                $('#slideshow').height(windowHeight);
                $('#slideshow').width(windowWidth);

                $('.slide img').each(function(){
                   //scaleImage($(this));
                   //myTrace($(this).height()+' '+$(this).width());
                });
                oldWidth = windowWidth;
                oldHeight = windowHeight;
            }
        }

        function scaleImage(image){

            var imageHeight = parseFloat($(image).attr('data-orgHeight'));
            var imageWidth  = parseFloat($(image).attr('data-orgWidth'));
            var mode = '';
            var ratio = imageWidth/imageHeight;

            //by default scale to width
            mode = 'toWidth';
            $(image).width(parseFloat(windowWidth));
            $(image).height(parseFloat(windowWidth/ratio));

            // if the calculated height is smaller than the window
            if(parseFloat(windowWidth/ratio) < windowHeight){
                mode = 'toHeight';
                $(image).height(parseFloat(windowHeight));
                $(image).width(parseFloat(windowHeight*ratio));
            }

            $('#slideshow').attr('data-trace',imageHeight+' '+imageWidth+' '+ratio+' '+windowHeight+' '+mode);

            var xOffset =  windowWidth-parseFloat($(image).width());
            var yOffset =  windowHeight-parseFloat($(image).height());

            $(image).css({'margin-left':parseFloat(xOffset/2)+'px','margin-top':parseFloat(yOffset/2)+'px'});
            //myTrace(xOffset);
        }

    </script>

<?php
include('views/footer.phtml');