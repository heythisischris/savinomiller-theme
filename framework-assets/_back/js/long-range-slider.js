
$(document).ready(function(){
    initRangeSlider();
});



var rangeSliderCurrent = 0;
var cycleSpeed = 8000;
var cycleInterval;

function advanceTimeline(dir){
    var rangeSliderLength = $('#image-list li').length;

    $('#rangeSlider-arrow-left').show();
    $('#rangeSlider-arrow-right').show();

    rangeSliderCurrent+= dir;

    if(rangeSliderCurrent < 0){
        rangeSliderCurrent = rangeSliderLength-1;
        $('#timeline-arrow-left').hide();
    }else if(rangeSliderCurrent == rangeSliderLength){
        rangeSliderCurrent = 0;

        clearInterval(cycleInterval);
        $('#timeline-arrow-right').hide();
    }


    var targetPos = $('#image-list .range-slider-'+rangeSliderCurrent).attr('data-left-pos');
    $('#image-list').animate({
        'margin-left':-targetPos+'px'
    },{
        duration:5000,
        specialEasing: {
            'margin-left':'easeOutSine'
        }
    });
    //easeOutSine
    myTrace('targetPos: '+targetPos+' rangeSliderCurrent: '+rangeSliderCurrent+' rangeSliderLength: '+rangeSliderLength);
}

function initRangeSlider(){
    setInterval('layoutRangeSlider()',30);
    setInterval('layoutRangeSlider()',30);
    //cycleInterval = setInterval('advanceTimeline(1)',cycleSpeed);
    //$('#image-list').delay(1000).fadeIn('slow');
    startAnimation();
}

function startCycle(){
    cycleInterval = setInterval('advanceTimeline(1)',cycleSpeed);
}


function startAnimation(){
    var mainContentWidth = $(window).width();

    $('#image-list').css({'margin-left':+mainContentWidth+'px'});
    $('#image-list').show();
    $('#image-list').delay(1000).animate({
        'margin-left':'0px'
    },10000,'easeOutQuint',startCycle());
}

function layoutRangeSlider(){
    var totalWidth = 0;
    $('#image-list li').each(function (index,value){
        $(this).addClass('range-slider-'+index);
        $(this).attr('data-left-pos',totalWidth);

        var image = $(this).find('img');
        var imageWidth = image.width();
        var marginLeft = parseFloat($(this).css('margin-left'));
        var marginRight = parseFloat($(this).css('margin-right'));
        var paddingLeft = parseFloat($(this).css('padding-left'));
        var paddingRight = parseFloat($(this).css('padding-right'));
        totalWidth+= imageWidth+paddingLeft+marginLeft+marginRight+paddingRight;
        //myTrace(totalWidth);

    });
    $('#image-list').css({'width':totalWidth+'px'});
}


function tweenPropertyTo(jqueryObj,propertyKey,targetVal,speed){
    speed = speed*0.5;

    //myTrace(parseFloat(jqueryObj.css(propertyKey))+' '+targetVal);
    if(targetVal != parseFloat(jqueryObj.css(propertyKey))){
        //myTrace(jqueryObj.css(propertyKey)+' '+targetVal);
        oldVal =  parseFloat(jqueryObj.css(propertyKey));
        oldVal+= (targetVal-oldVal)/speed;
        //myTrace(newVal);
        jqueryObj.css(propertyKey,oldVal+'px');
    }

}