

function showInfo(){
    $('.description').slideDown(function() {
        // Animation complete.
        $('body').css({'min-height':$('.description').height()+60+'px'});
    });
    $('.show-info').hide();
    $('.close-info').show();
    $('#main-content .underlay').show();

}

function closeInfo(){
    $('.description').slideUp();
    $('.close-info').hide();
    $('.show-info').show();
    //$('.back-button').show();
    //$('.project-nav').css({'min-height':'15px'});
    $('body').removeAttr('style');
    $('#main-content .underlay').slideUp();
}




$(document).ready(function(){
    executeAsInterval('calcHeightForLargeGrid');
    //executeAsInterval('positionProjectnav');
});

var oldMaxHeight = 0;
var refreshMaxHeight = 20;


function positionProjectnav(){


    var top = $('header').height();
    $('.project-nav').css({'top':+top+'px'});

}

function calcHeightForLargeGrid(){

    if(refreshMaxHeight > 1){
        $('.large-grid > div').removeAttr('style');
        oldMaxHeight = 0;
        refreshMaxHeight = 0;
    }
    refreshMaxHeight++;

    var highest;
    maxHeight = 0;
    //$('.large-grid > div').css({'min-height':0+'px'});
    $('.large-grid > div').removeClass('highest');


    $('.large-grid > div').each(function(){
        if($(this).height() > maxHeight){
            highest = $(this);
            maxHeight = $(this).height();
        }
    });


    if(oldMaxHeight != maxHeight){
       highest.addClass('highest');
        $('.large-grid > div').each(function(){
            if(!$(this).hasClass('highest')){
                $(this).css({'min-height':maxHeight+'px'});
            }
        });
       oldMaxHeight = maxHeight;
    }

    if($('#background-slideshow').length > 0 && !$('body').hasClass('page-id-42')){
        $('.page-content').css({'min-height':+$('#background-slideshow').height()-parseFloat($('.page-content').css('padding-top'))-parseFloat($('.page-content').css('padding-bottom'))+'px'});
    }


}

