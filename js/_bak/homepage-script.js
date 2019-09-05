// JavaScript Document
var homepageScriptTimer;

$(document).ready(function(){	
	//homepageScriptTimer = setTimeout(scaleHomepage,500);
	//initSlideshow();
});



function initSlideshow(id,delay) {
		
	$('#slideshow-'+id).cycle({
		delay:1000+delay,
		speed: 5,
		manualSpeed: 10,
		timeout:1600,
		fx: 'none',
		paused: false,
		slides: 'div',
		hideNonActive: true,
		//pagerEvent: 'pause',
		//pauseOnPagerEvent:true,
		pauseOnHover: false,
		swipe: false,
		prev: '#slideshow-prev'+id,
		next: '#slideshow-next'+id,
		//pager: '.slideshow-pager',
		//pagerTemplate: '<li></li>',
		//pagerTemplate: '', // activate to use thumbnail image files 
		pagerActiveClass: 'active',
		//caption: '.slideshow-caption',
		//captionTemplate: '{{slideNum}} of {{slideCount}}',
	});
	
	
	$('#slideshow-'+id).on('cycle-prev cycle-next cycle-pager-activated', function( event, opts ) {
   		$('#slideshow-'+id).cycle('pause');
	});
}


function scaleHomepage(){
		/*
		width and height come from head-script.js		
		*/
		
		if(!isTouch){
			
		}
		var ratio = 1000/1600;
		var calculatedHeight = windowWidth*ratio;
		
		$('.slides img').width(windowWidth);
		$('.slides img').height(calculatedHeight);
	
		
		homepageScriptTimer = setTimeout(scaleHomepage,300);
}

