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


<div id="main-content"  >

    <div class="underlay">

    </div>

    <div class="project-nav" >
        <div class="inner-wrapper" >
            <div class="control-bar" >
                <div class="left-field">
                    <a href="javascript:window.history.back()" class="back-button" ><img src="<?Php echo TEMPLATE_URI; ?>/img/arrow-back.png" /></a>
                    <h1><?Php echo $entity->title; ?></h1>
                </div>
                <div class="right-field">
                    <a href="javascript:showInfo()" class="show-info" ><img src="<?Php echo TEMPLATE_URI; ?>/img/info-icon.png" /></a>

                    <a href="javascript:closeInfo()" class="close-info" ><img src="<?Php echo TEMPLATE_URI; ?>/img/close-x.png" /></a>

                </div>
                <div class="clearfix" >&nbsp;</div>
            </div>

            <div class="description body-copy" >
                <div class="inner-description">
                    <?Php echo MyHelpers::pToEmptyLine($entity->content); ?>
                </div>

            </div>
        </div>
    </div>


    <div class="inner">
       <?php echo PartialRenderer::render(TEMPLATE_DIR.'/views/_partial/slideshow-fixed.phtml',$entity); ?>
    </div>

</div>

<style> .slide {
	height:100%
	}</style>

<script>
    $(document).ready(function(){
        //$('#mobile-menu-wrapper .project-category-menu').fadeIn('slow');

        <?php
        if(!empty($catIds)){
        ?>
        var categories = [<?php echo implode(',',$catIds); ?>];
        for(i = 0; i < categories.length; i++){
            $('.cat-item-'+categories[i]).addClass('current-menu-item');
            $('#desktop-menu #current-cat-name').html($('.cat-item-'+categories[i]+' a').html());
        }
        //


        <?php
        }
        ?>
        executeAsInterval('layoutSlideshowNew');
        var timeout = setTimeout("$('#slideshow').animate({'opacity':'1'});",2000);

    });

	 function layoutSlideshowNew(){
		 $('#slideshow').width(windowWidth);
		 $('#slideshow').height(windowHeight-129);
	 }

	
    var oldWidth = 0;
    var oldHeight = 0;

    function layoutSlideshow(){



                if(oldWidth != windowWidth || oldHeight != windowHeight){
                    var headerHeight =  parseFloat($('header').height());
                    //var slideshowHeight =  parseFloat($('#slideshow').height());
                    //var slideshowWidth =  parseFloat($('#slideshow').width());
                    var slideshowHeight =  windowHeight-headerHeight;
                    var slideshowWidth =  windowWidth;

                    $('#slideshow').css({
                        'margin-top':headerHeight+'px',
                        'height':slideshowHeight+'px',
                        'width':slideshowWidth+'px'
                    });

            var slideshowRatio = slideshowWidth/slideshowHeight;

            var marTop = (windowHeight+headerHeight-slideshowHeight)/2;


            $('.ratio-slideshow .slide img').each(function(){
                var slideHeight = $(this).height();
                var imageRatio = $(this).attr('data-orgWidth')/$(this).attr('data-orgHeight');
                var slideshowRatio = slideshowWidth/slideshowHeight;

                //myTrace(calculatedHeightRatio+' '+slideshowHeight);

                var targetHeight = slideshowHeight;
                var targetWidth = slideshowHeight*imageRatio;
                $(this).attr('data-scaled-by','height');

                if(targetWidth >  slideshowWidth){
                    //$(this).css({'height':slideshowHeight+'px'});
                    $(this).attr('data-scaled-by','width');
                    targetWidth = slideshowWidth
                    targetHeight = slideshowWidth/imageRatio;
                }else{
                    //$(this).css({'height':'auto'});
                }

                // we center vertically
                var topMargin = (slideshowHeight-targetHeight)/2;
                if(topMargin < 0){
                    topMargin = 0;
                }

                $(this).css({
                    'margin-top':topMargin+'px',
                    'height':targetHeight+'px',
                    'width':targetWidth+'px'
                });

            });
            /*
            if(marTop < headerHeight || windowWidth == slideshowWidth){
                marTop = headerHeight;
            }

            /*
            var prevPos = (windowWidth -slideshowWidth)/4;
            if(prevPos > 0){
                $('.slideshow-prev').css({'left':'-'+prevPos+'px'});
                $('.slideshow-next').css({'right':'-'+prevPos+'px'});
            }else{
                $('.slideshow-prev').css({'left':'50px'});
                $('.slideshow-next').css({'right':'50px'});
            }

            //$('#slideshow').animate({'margin-top':marTop+'px'});
            oldWidth = windowWidth;
            oldHeight = windowHeight;
            */
        }

    }


    function positionSlideshow_bak(){

        if(oldWidth != windowWidth || oldHeight != windowHeight){
            var headerHeight =  parseFloat($('header').height());
            var slideshowHeight =  parseFloat($('#slideshow').height());
            var slideshowWidth =  parseFloat($('#slideshow').width());

            var marTop = (windowHeight+headerHeight-slideshowHeight)/2;

            if(marTop < headerHeight || windowWidth == slideshowWidth){
                marTop = headerHeight;
            }

            var prevPos = (windowWidth -slideshowWidth)/4;
            if(prevPos > 0){
                $('.slideshow-prev').css({'left':'-'+prevPos+'px'});
                $('.slideshow-next').css({'right':'-'+prevPos+'px'});
            }else{
                $('.slideshow-prev').css({'left':'50px'});
                $('.slideshow-next').css({'right':'50px'});
            }

            $('#slideshow').animate({'margin-top':marTop+'px'});
            oldWidth = windowWidth;
            oldHeight = windowHeight;
        }
    }


</script>

<?php
include('views/footer.phtml');