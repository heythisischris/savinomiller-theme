// JavaScript Document

var thumbsPaddingRight = 2;

$(document).ready(function(){	
	$('.casestudies-teaser').fadeIn();
	if(typeof casestudiesMediaArray != 'undefined'){
		//layoutCasestudies();
	}
	
});


function layoutCasestudies(){
	var widest = 0;
	$.each(casestudiesMediaArray,function(i, val) {
		var imageData = jQuery.parseJSON(eval('image'+val));
		$('#image-'+val).width(imageData.width);
	});
	
	$('.casestudies-teaser .thumbs').each(function(i, val) {
		
		width = 0;
		$(this).find('div').each(function(i, val) {
			//console.log($(this).width());
			width+=$(this).width()+thumbsPaddingRight;
			$(this).css({'padding-right':thumbsPaddingRight+'px'});
		});
		//$("#" + i).append(document.createTextNode(" - " + val));
		$(this).parent().width(width);
		
		if(width > widest){
			widest = width;
		}
		
		//console.log(width);
	});
	//console.log('hi');
	$('#casestudy-wrapper').width(widest);
	
}

function sortCasestudyBy(key){
	//console.log(key);
	$('.googlemap').hide();
	$('.subnav li a').removeClass('active');
	
	if(key == 'all'){
		$('.casestudies-teaser').show();
		$('.googlemap').show();
	}else{
		$('.casestudies-teaser').hide();
		$('.filter-'+key).show();
	}
	
	$('#'+key).addClass('active');
    setZoom(map1,zoom);
    setZoom(map2,zoom2);
	
}

function showMaps(){
	$('.subnav li a').removeClass('active');
	
	$('.casestudies-teaser').hide();
	$('.googlemap').fadeTo("slow",1);
	
	$('.subnav #map').addClass('active');
    setZoom(map1,zoom);
    setZoom(map2,zoom2);
}
