/**
 * Created by Till on 9/16/14.
 */

var requiredFields = [];

/*
function setRequired() {

    $('.required').each(function(){
        myTrace($(this).val());
        //$(this).attr('default-value',$(this).val());
    });

    for (var i=0; i < requiredFields.length; i++){
        myTrace(requiredFields[i]);
        $("[name='"+requiredFields[i]+"']").addClass('required');
        $("label[for='"+requiredFields[i]+"']").append('*');
        //$("[name='"+requiredFields[i]+"']").attr('default-value',$("[name='"+requiredFields[i]+"']").val());

    }
}
*/

function bindClickDelete() {
    $('.field').each(function(){
        myTrace('touched' +$(this).hasClass('touched'));


        $(this).click(function() {
            if(true != $(this).hasClass('touched')){
                $(this).val('');
                $(this).addClass('touched');
            }
        });

    });
}


function bindClicksToCustomDropdown() {
    $('.custom-dropdown li').each(function(){
        $(this).click(function() {
            var isFor = $(this).parent().parent().attr('data-is-for');
            selectThis(isFor,$(this).html());
            $(this).parent().parent().slideToggle();
        });

    });
}

function selectThis(key,value){
    $('#'+key).val(value);
}

function validateInquiryForm(formKey) {
    error = '';
    $("#"+formKey+" .required").each(function(){
        $(this).removeClass('validate-error');
        myTrace('default value: '+$(this).attr('data-default-value')+' value: '+$(this).val());
        if('' == $(this).val() || 0 == $(this).val() || $(this).attr('data-default-value') ==  $(this).val()  ){
            myTrace('ERROR default value: '+$(this).attr('data-default-value')+' value: '+$(this).val());
            //console.log('d: '+$(this).attr('name'));
            $(this).addClass('validate-error');
            error+= $(this).attr('title')+" needs to be set\n";
        }

    });



    if(error == ''){

        return true;
    }else{
        displayError();
        return false;
    }

}

function checkIfBothEmailsAreSetToDefault (formKey) {
    msg = "Please enter at least one valid email.";
    error = '';
    if($("#"+formKey+" input[name='email']").val() == 'EMAIL ADDRESS*' && $("#"+formKey+" input[name='brokerEmail']").val() == 'EMAIL ADDRESS*'){
        error+= msg;
    }
    myTrace($("#"+formKey+" input[name='email']").val());



    if(error == ''){
        return false;
    }else{
        alert(msg);
        $('#req-message').html(msg);
        return true;
    }
}


function displayError() {
    msg = "Please fill out all required fields marked with an asterisk";
    alert(msg);
    $('#req-message').html(msg);
}


function sendInquiryData(formKey){

    val = $("#"+formKey+" :input").serialize();
    myTrace(val);
    $("#"+formKey+" #spinner").show();
    $("#"+formKey+" #submit-button").hide();
    /*return false;
     jQuery.each(hash, function(i, field){
     val+= field.name+"="+field.value+"&";
     });*/


    $.ajax({
        type: 'POST',
        async: false,
        url: inquiriesFormUrl+'?action=inquire',
        data: val,
        dataType : 'json',
        success: function(jsonResponse){
            myTrace(jsonResponse);
            $("#"+formKey+" #spinner").hide();

            if(jsonResponse.errors == 'none'){
                $("#"+formKey+" #thankyou").show();

            }else{
                $("#"+formKey+" .form-error").show();
                $("#"+formKey+" .form-error .errormsg").html(jsonResponse.message);
                $("#"+formKey+" #submit-button").hide();
            }
        }
    });
}


function submitInquiryForm(formKey){

    if(validateInquiryForm(formKey)){
        sendInquiryData(formKey)
    }


}