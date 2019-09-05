var overlayTimer;



$(document).ready(function(){
	
		
		
	
	scaleOverlay()	
	$('.overlay').show();
	$('body').append('<div id="background-blocker" ></div>');
	$('#background-blocker').show();
	$('body').append($('.overlay'));
});





function scaleOverlay(){
		
		windowWidth = $(window).width();
		windowHeight = $(window).height();
		documentHeight = $(document).height();
		
		targetHeight = windowHeight; 
		
		if(windowHeight < documentHeight){
			targetHeight = documentHeight; 
		}
		
		$('#background-blocker').width(windowWidth);
		$('#background-blocker').height(targetHeight);
		clearTimeout(overlayTimer);	
		overlayTimer = setTimeout(scaleOverlay,400);
}