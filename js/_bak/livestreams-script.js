// JavaScript Document

$(document).ready(function(){	
	$('.video-pause-btn').hide();
	$('.video-resume-btn').hide();
});



function  playLiveStream(id){

			
		var livestreamData = eval('livestream'+id);
		//console.log(livestreamData.length);		
		var holder = $('#livestream-player-'+id).find('.livestream-holder');
        $(holder).height(holder.height());
		
		for(i = 1; i < livestreamData.length; i++){
			$(holder).append('<img src="'+baseUrl+livestreamData[i]+'" />');
	
		}		
		cycleStream(holder);
        var myTimeout = setTimeout('unsetHeight()',330);
		$('#livestream-player-'+id).find('.video-play-btn').hide();
		$('#livestream-player-'+id).find('.video-pause-btn').show();

}

function  unsetHeight(){

    $('.livestream-holder').height('auto');
}

function  stopLiveStream(id){

	var holder = $('#livestream-player-'+id).find('.livestream-holder');
	$(holder).cycle('pause');		
	$('#livestream-player-'+id).find('.video-resume-btn').show();
	$('#livestream-player-'+id).find('.video-pause-btn').hide();	
		
}

function  resumeLiveStream(id){

	var holder = $('#livestream-player-'+id).find('.livestream-holder');
	$(holder).cycle('resume');		
	$('#livestream-player-'+id).find('.video-resume-btn').hide();
	$('#livestream-player-'+id).find('.video-pause-btn').show();	
		
}

function  cycleStream(holder){
	
	$(holder).cycle({
		delay:0,
		speed: 10,
		manualSpeed: 10,
		timeout:500,
		fx: 'none',
		paused: false,
		//slides: 'div',
		//hideNonActive: true,
		//pagerEvent: 'pause',
		//pauseOnPagerEvent:true,
		pauseOnHover: false,
		swipe: false,
		//prev: '#slideshow-prev'+id,
		//next: '#slideshow-next'+id,
		//pager: '.slideshow-pager',
		//pagerTemplate: '<li></li>',
		//pagerTemplate: '', // activate to use thumbnail image files 
		pagerActiveClass: 'active'
		//caption: '.slideshow-caption',
		//captionTemplate: '{{slideNum}} of {{slideCount}}',
	});

}

