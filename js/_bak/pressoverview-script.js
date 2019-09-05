// JavaScript Document
/*
var thumbsPaddingRight = 4;

$(document).ready(function(){	
	$('.pressitem-teaser').fadeIn();
	layoutPressoverview();
});


function layoutPressoverview(){
	var widest = 0;
	$('.pressitem-teaser .thumb').each(function(i, val) {
		width = 0;
		$(this).find('img').each(function(i, val) {
			//console.log($(this).width());
			width+=$(this).width()+thumbsPaddingRight;
			$(this).css({'padding-right':thumbsPaddingRight+'px'});
		});
		//$("#" + i).append(document.createTextNode(" - " + val));
		$(this).width(width);
		
		$(this).parent().width(width);
		
		if(width > widest){
			widest = width;
		}
		
		//console.log(width);
	});
	$('#presssoverview-wrapper').width(widest);
	
}

function sortCasestudyBy(key){
	
	
	
}
*/