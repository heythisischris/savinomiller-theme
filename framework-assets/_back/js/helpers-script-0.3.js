var isTouch;
var clickevent;

var windowWidth = 0;
var windowHeight = 0;
var documentWidth = 0;
var	documentHeight = 0;


var javascriptBeaconInterval; 	

var javascriptBeaconFunctionArray = [];
var javascriptStateChangeFunctionArray = [];

function executeAsInterval(myFunction) {
	javascriptBeaconFunctionArray.push(myFunction);
}

function executeOnStateChange(myFunction) {
	javascriptStateChangeFunctionArray.push(myFunction);
}

$(document).ready(function(){

	javascriptBeaconInterval = setInterval(javascriptBeacon,300);	
	executeAsInterval('sampleFunction');
	executeOnStateChange('sampleFunction');
    setPrettyUi();
});

// JavaScript Document
function myTrace(s) {
  try { console.log(s) } catch (e) {  }
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
checkDevice();


var responsiveState = 'desktop';

function javascriptBeacon() {
	//myTrace(javascriptBeaconFunctionArray);
	windowWidth = $(window).width();
	windowHeight = $(window).height();
	
	documentWidth = $(document).width();
	documentHeight = $(document).height();
	
	//	
	for(i = 0; i < javascriptBeaconFunctionArray.length; i++){
		eval(javascriptBeaconFunctionArray[i]+'()');
	}
	
	
	
	/*
	var newResponsiveState = 'desktop';
	$(".css-states .css-state").each(function() {
			//myTrace($(this).attr('id')+'  '+$(this).css('font-size'));
			if($(this).css('font-size') == '10px'){				
				newResponsiveState = $(this).attr('id');
			}
				
	});	
	
	if(newResponsiveState != responsiveState){		
		responsiveState = newResponsiveState;
		responsiveStateChangeEvent();
	}
		
	$('#flags .label').html('w: '+windowWidth+' h: '+windowHeight+'<br>'+responsiveState);
    */
}

function responsiveStateChangeEvent() {
	myTrace('responsiveStateChangeEvent: '+responsiveState);
	for(i = 0; i < javascriptStateChangeFunctionArray.length; i++){
		eval(javascriptStateChangeFunctionArray[i]+'()');
	}
}

function setPrettyUi() {
	//myTrace('sampleFunction');
	$('.radio-ui').each(function(){
		//myTrace(this);
            $(this).click(function() {
                var dataCheckboxValue = $(this).attr('data-checkbox-value');
                var dataCheckboxChecked = $(this).attr('data-checkbox-checked');
                var dataCheckboxValue = $(this).attr('data-checkbox-value');
                var dataCheckboxValueFor = $(this).attr('data-checkbox-value-for');

                $('#'+dataCheckboxValueFor+'-radio-ui .radio-ui').attr('src',templateDirectoryUri+'/img/circle-checkbox-unchecked.png');
                $('#'+dataCheckboxValueFor+'-radio-ui .radio-ui').attr('data-checkbox-checked',0);

                if(dataCheckboxChecked == 1){

                }else{
                   // myTrace('is not checked');
                    $('#'+dataCheckboxValueFor).val(dataCheckboxValue);
                    $(this).attr('data-checkbox-checked',1);
                    $(this).attr('src',templateDirectoryUri+'/img/circle-checkbox-checked.png');
                }
            });
		}	
	)
}


function shuffleArray(array) {
    var currentIndex = array.length, temporaryValue, randomIndex ;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }
    return array;
}

function sampleFunction() {
	//myTrace('sampleFunction');
	
	
}

function scrollToTop(){
    lastScrollTop = $(window).scrollTop();
    //window.scrollTo(0,0);
    $("html, body").animate({ scrollTop: "1px" });
}


function truncateTo(id,height){
	oldHeight = $('#'+id).css('height');
	myTrace(id+' '+oldHeight);
	//console.log(id+" "+parseFloat(height)+" "+parseFloat(oldHeight));
	$('#less-button-for-'+id).remove();
	
	if(parseFloat(height) < parseFloat(oldHeight)){			
	
		$('#'+id).css({'height':height,'overflow':'hidden'});		
		$('#'+id).after("<div id='more-button-for-"+id+"' class='trunc-button more-link' ><a  href='javascript:showMoreOfTruncated(\""+id+"\")' >more</a></div>");
		$('#'+id).after("<div id='less-button-for-"+id+"' class='trunc-button more-link hidden' ><a  href='javascript:truncateTo(\""+id+"\",\""+height+"\")' >less</a></div>");
		
	
	}

}


function showMoreOfTruncated(id){
	$('#more-button-for-'+id).remove();
	$('#less-button-for-'+id).fadeIn();
	$('#'+id).css({'height':'auto'});
	$('#'+id).delay(0).css({'overflow':'visible'});
}



function trackPageNotFound(request){
	//page-not-found
	try { 
		ga('send','event','page','PageNotFound',request);
	 	//_gaq.push(['_trackEvent','page','PageNotFound',request]);
	} catch (e) { 
	 
	}			
}

function trackPageSearch(request){
	//page-not-found
	try {
		ga('send','event','search','trackPageSearch',request); 
	 	//_gaq.push(['_trackEvent','search','trackPageSearch',request]);
	} catch (e) { 
	 
	}			
}

function trackRenderTime(request){
	/*
	try { 
	 	_gaq.push(['_trackEvent','debug','render-time','rt',request]);
	} catch (e) { 
	 
	}
	*/			
}



