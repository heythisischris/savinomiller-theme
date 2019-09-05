// JavaScript Document
$(document).ready(function(){	
	
	//setVideos();
});


function setVideos(){
	
	$('.video-player').each(function(i, val) {
		var id = $(this).attr('id').replace('video-player-','');
		
		var videoData = jQuery.parseJSON(eval('video'+id));
		var image = $(this).find('img');
		var height = videoData.height;
		var width = videoData.width;
		
		var heightHalf = Math.floor(height/2);
		var widthHalf =  Math.floor(width/2);
		
		
		//console.log(image.attr('src'));
		$(this).find('.video-holder').html('<a href="javascript:playVideo('+id+')" ><img class="placeholder" src="'+image.attr('src')+'" ><div class="player-overlay" style="height:'+height+'px; width:'+width+'px; "  ><img  class="play-btn-img" src="'+baseUrl+'public/img/video-play-btn.png" style="padding-left:'+widthHalf+'px; padding-top:'+heightHalf+'px; " ></div></a>');
		
	});	
}

function playVideo(id){

			
		//var videoData = jQuery.parseJSON(eval('video'+id));
		//console.log(videoData.externalId);		
		//var image = $('#video-player-'+id).find('img');
		//var height = videoData.height;
		//var width = videoData.width;

        // $('#video-player-'+id).find('.video-holder .video-play-btn-overlay').html('<iframe id="video-'+id+'" src="//player.vimeo.com/video/'+videoData.externalId+'?autoplay=1" frameborder="0" width="'+width+'" height="'+height+'"  ></iframe>');


        $('#video-player-'+id).find('.video-holder .iframe-target').html('<iframe id="video-'+id+'" src="//player.vimeo.com/video/'+id+'?autoplay=1" frameborder="0"  ></iframe>');
	
		//$('#video-player-'+id).find('img').css({'opacity':'0','position':'absolute'});
		
	
	
}