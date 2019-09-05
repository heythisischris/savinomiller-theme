var isTouch;
var clickevent;

var resizeTimerP;
var windowWidth = 0;
var windowHeight = 0;


$(document).ready(function(){
	
		
		
	resizeTimerP = setTimeout(scaleP, 10);	
	checkDevice();
	
	// replacing the link so it goes to press
	//$('#node_56 a').attr('href',baseUrl+'media/press/');
	if(!isTouch){	
			
	}
});

function animateLoop(target){
	$('#scroll-indicator img').animate({
		'padding-top': +target+'px'	
		}, 3000, function() {
		//animateLoop(target*-1);
	});
}

function scaleSlides(){	
	/*
	var ratio = 595/900;
	var calculatedHeight = Math.floor(windowWidth*ratio);
	
	$('.block-slide img').width(windowWidth);
	$('.block-slide img').height(calculatedHeight);	
	//$('.block-slide').width(windowWidth);
	//$('.block-slide').height(calculatedHeight);
	
	$('.longscroll-image-slide').width(windowWidth);
	$('.longscroll-image-slide').height(calculatedHeight);
	
*/
}

function makeLongScroll(idKey){
	
	$('#nav-'+idKey+' li').each(function( index ) {
		var atag = $(this).find('a');
		var id_string = $(this).attr('id');
		var id = id_string.replace("node_",""); 
		//$(atag).attr('href','#block-'+id);
		$('#article-'+idKey+' #content-overlay .body-copy').append($('#text-'+id));
		$(atag).attr('href','javascript:scrollToAnchor('+idKey+','+id+')');
		
		//$(this).attr('href','#');
	});
	//$('#node_10').addClass('active');
	
}

function scrollToAnchor(idKey,aid){
	$('#initial-text').remove();
	
	$('#menu-about-menu a').removeClass('active');
    //$('#'+idKey+' li').removeClass('active');
	//$('#'+idKey+' li a').addClass('normal');
	$('#menu-item-'+aid+' a').addClass('active');
	//$('#menu-item-'+aid+' a').removeClass('normal');
	
	

	//$('#'+idKey+' li').addClass('normal');
	//$('#menu-item-'+aid+' li').addClass('active');
	//$('#menu-item-'+aid).removeClass('normal');
	
    var aTag = $("a[name='block-"+ aid +"']");
	
	if($(window).width() > 500){
		$('html,body').animate({scrollTop: aTag.offset().top+14},'slow');
	} 
	//$('#article-'+idKey+' .inner-col .body-copy ').html('');
	$('.block-slide-text').addClass('hidden');
	$('#text-'+aid).removeClass('hidden');    
	//$('#article-'+idKey+' .inner-col .body-copy  div').removeClass('hidden');
}

function scaleP(){
		
		windowWidth = $(window).width();
		windowHeight = $(window).height();
		
		$('#flags .label').html('<br>w: '+windowWidth+' h: '+windowHeight+'<br>');
		//if(!isTouch){
			if(windowWidth > 768){
				//$('header').height($(window).height());

                $('.page-template-page-blog .interaction-layer').height($(window).height()-32);
                $('.posts-body .interaction-layer').height($(window).height()-32);
			}
			else{
				//$('header').height('');
                $('.page-template-page-blog .interaction-layer').height('auto');
                $('.posts-body .interaction-layer').height('auto');
			}

        if($('.pressoverview .interaction-layer').css('position') == 'fixed'){
            //$('header').height($(window).height());
            $('.pressoverview .interaction-layer').height($(window).height()-32);
        }
        else{
            //$('header').height('');
            $('.pressoverview .interaction-layer').height('auto');
        }

		//}
		// don't scale for ipad and below
		if(windowWidth > 1024){
					
			
			//$('body').height($(window).height());
			//console.log(windowHeight);
			/*
			if(windowHeight < 610+300){
				$('#side-nav').css({'top':+windowHeight-300+'px'});
				$('.title-container').css({'top':+windowHeight-300+'px'});
				$('#scroll-indicator').css({'top':+windowHeight-280+'px'});
			}else{
				$('#side-nav').css({'top':'610px'});
				$('.title-container').css({'top':'610px'});
				$('#scroll-indicator').css({'top':'630px'});
			}
			*/
			//$('.subpage').css({'min-height':+windowHeight-1+'px'});
		}
		else{
			$('#side-nav').css({'top':''});
			$('.title-container').css({'top':''});
			$('#scroll-indicator').css({'top':''});
		}
		
		//scaleSlides();
		responsiveLayout(windowWidth);
		
		clearTimeout(resizeTimerP);
		resizeTimerP = setTimeout(scaleP,300);
}


function setEml(target,first,last){
	//console.log(first,last)	
	$('#'+target).attr('href','mail'+''+'to:'+first+'@'+last);
	$('#'+target).text(first+'@'+last);	

}



function checkDevice() {	
	if (window.navigator.msPointerEnabled) {
		clickevent = "MSPointerDown"; 	// IE10 / Windows 8, mouse/touch/pen device
		if (window.navigator.msMaxTouchPoints) {
			isTouch = true;
		} else {
			isTouch = false;
		}
	} else if ("ontouchstart" in window) {
		clickevent = "touchstart";  	// touch device
		isTouch = true;
	} else {
		clickevent = "click";   		// mouse device
		isTouch = false;
	}		
}