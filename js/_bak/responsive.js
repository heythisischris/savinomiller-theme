// JavaScript Document
function responsiveLayout(width){

    //$('.casestudies .googlemap').css({'width':'100%'});
    //$('.casestudy .googlemap').css({'width':'100%'});

	//console.log('w');

	var casestudyWrapperLeft = parseInt($('#casestudy-wrapper').css('left'));
	var casestudyWrapperMarginLeft = parseInt($('#casestudy-wrapper').css('margin-left'));
	
	var casestudyWrapperTargetWidth = width-casestudyWrapperLeft-casestudyWrapperMarginLeft;	
	
	if(casestudyWrapperTargetWidth > 902){
		//$('.casestudies .googlemap').css({'width':+902+'px'});
		$('#casestudy-wrapper').css({'width':+902+'px'});
	}else{
		//$('.casestudies .googlemap').css({'width':+width-casestudyWrapperLeft-casestudyWrapperMarginLeft+'px'});
		$('#casestudy-wrapper').css({'width':+width-casestudyWrapperLeft-casestudyWrapperMarginLeft+'px'});
	}

	if(width < 992 /*768*/){
		//$('.casestudy .middle-layer-content-box .image-wrapper img').css({'width':+width-460+'px'});
		//##$('.casestudy #video-cnt .placeholder').css({'width':+width-460+'px'});
		//$('.googlemap').css({'width':+width+'px'});
		//$('.casestudy #video-cnt iframe').css({'width':+width-460+'px'});
		//*$('.posts .post-slide img').css({'width':+width-500+'px'});
		//*$('.post .post-slide img').css({'width':+width-500+'px'});
		$('.standardpage.middle-layer .middle-layer-content-box').css({'width':+width-460+'px'});
        $('.standardpage.scrollunder .middle-layer-content-box').css({'width':+width-460+'px'});

		
	}else if(width < 1356){

        //$('.casestudy #video-cnt iframe').css({'width':+width+'px'});
        //##$('.casestudy #video-cnt .placeholder').css({'width':+width+'px'});

        //$('.casestudy .middle-layer-content-box .image-wrapper img').css({'width':'100%'});
        //$('.casestudy .googlemap').css({'width':+width+'px'});
        //$('.casestudies .googlemap').css({'width':+width+'px'});

        //$('.posts .post-slide img').css({'width':+width-220+'px'});
        //$('.post .post-slide img').css({'width':+width-220+'px'});

        $('.standardpage.middle-layer .middle-layer-content-box').css({'width':''});
        $('.standardpage.scrollunder .middle-layer-content-box').css({'width':+''});

        //*$('#post').css({'width':''});

    }
	else{
		//$('.casestudy .middle-layer-content-box .image-wrapper img').css({'width':'auto'});

        //##$('.casestudy #video-cnt .placeholder').css({'width':'auto'});

        //*$('.posts .post-slide img').css({'width':'auto'});
		//*$('.post .post-slide img').css({'width':'auto'});
		//$('.googlemap').css({'width':'100%'});
		//$('.casestudy #video-cnt iframe').css({'width':+900+'px'});
		$('.standardpage.middle-layer .middle-layer-content-box').css({'width':+782+'px'});
        $('.standardpage.scrollunder .middle-layer-content-box').css({'width':+782+'px'});
	}
	

	sizePosts();

	var iFrameHeight = $('.casestudy #video-cnt iframe').width();
	$('.casestudy #video-cnt iframe').css({'height':+iFrameHeight/2+'px'});

    //$('.video-holder img').width();
    $('.video-holder iframe').width($('.video-holder img').width());
    $('.video-holder iframe').height($('.video-holder img').height());
	/*
	$('.casestudy #video-cnt').each(function(i, val) {
			
		var image = $(this).find('.placeholder');
		var width = image.width();
		var height = image.height();
			
		//console.log(image.attr('src'));
		$(this).find('.player-overlay').css({'width':+width+'px','height':+height+'px'});
		$(this).find('.play-btn-img').css({'padding-left':+0+'px','padding-top':+parseInt(height*0.5)+'px'});
		
	});
	*/

	//$('.casestudy #googlemap').css({'width':'100%'});

	/*
	if(width < 580){
		$('.casestudy #googlemap').hide();	
	}else{
		$('.casestudy #googlemap').show();	
	}
	*/

    //
	scaleHomepageSlideshow(width);
	calculateCasestudyGridCell();
}




function calculateCasestudyGridCell(){
	
	var maxHeight = 0;
	$('.casestudy-grid-wrapper .casestudies-teaser').css({'height':'auto'});
	
	$('.casestudy-grid-wrapper .casestudies-teaser').each(function(i, val) {
			var height = $(this).height();
			if(height > maxHeight && $(this).is(':visible')){
				maxHeight = height;
			}
			//console.log($(this).find('.teaser-title a').html()+' '+height);
	});
	$('.casestudy-grid-wrapper .casestudies-teaser').css({'height':maxHeight+'px'});
	//console.log(maxHeight+'-----');
}



var slowerCount = 0;
function sizePosts(){
	$('.post-teaser').each(function(i, val) {
		//width = $(this).find('.post-slide img').width();
		//$(this).width(width);
	});

	$('#post').each(function(i, val) {	
		
		//width = $(this).find('.post-slide img').width();
		//$(this).width(width);
		
		
	});


    if(slowerCount > 100){
        slowerCount = 0;
        var iFrameHeight = $('.video-player iframe').width();
        $('.video-player iframe').css({'height':+Math.round(iFrameHeight/1.5)+'px'})

        var iFrameHeight = $('.post-teaser iframe').width();
        $('.post-teaser iframe').css({'height':+iFrameHeight/1.5+'px'});


        var iFrameHeight = $('#post iframe').width();
        $('#post iframe').css({'height':+iFrameHeight/1.5+'px'});
        slowerCount++;
    }
}

function scaleHomepageSlideshow(width){
	
	if(width < 1148){
		$('.home-page .slideshow').css({'width':+(width-330)/2+'px'});
		$('.home-page .slideshow img').css({'width':+((width-330)/2)-2+'px'});
		$('#slideshow-full').css({'width':+width-330-2+'px'});
		$('#slideshow-full img').css({'width':+width-330-2+'px'});
		//$('.posts .post-slide img').css({'width':+width-500+'px'});
		//$('.post .post-slide img').css({'width':+width-500+'px'});
	}
	else{
		$('.home-page .slideshow').css({'width':450+'px'});
		$('.home-page .slideshow img').css({'width':+448+'px'});
		$('#slideshow-full').css({'width':+895+'px'});
		$('#slideshow-full img').css({'width':+895+'px'});
	}

	if($('header').css('position') == 'relative'){
		$('.home-page .slideshow').css({'width':+width/2+'px'});
		$('.home-page .slideshow img').css({'width':+(width/2)-2+'px'});
		$('#slideshow-full').css({'width':+width+'px'});
		$('#slideshow-full img').css({'width':+width-2+'px'});
	}
	
}