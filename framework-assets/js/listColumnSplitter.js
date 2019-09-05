
var colSplitterOldWidth = 0;

function initializeListColumnSplitter(){

    executeAsInterval('columnBeacon');
    $('.col-splitter-grid').parent().append('<div id="col-splitter-grid" ></div>');
}


function columnBeacon(){
    if(colSplitterOldWidth != $(window).width()){
        layoutColSplitter();
        colSplitterOldWidth = $(window).width();
    }
}



var colWidth  = 302;
var colGutter = 40;

var colDefs = [['base','micro','micro-r','base','base'],['long','base','base','base','base'],['base','micro','micro-r','base','base']];

function layoutColSplitter(){
    myTrace('widthChange');
    var maxWidth = $(window).width();
    var cols = Math.floor(maxWidth/(colWidth+colGutter));
    var inflatedColDefs = [];

    myTrace(cols);
    $('#col-splitter-grid').html('');
    var inflatedColDefCounter = 0;

    for (i = 0; i < cols; i++) {
        $('#col-splitter-grid').append('<div id="col-'+i+'" class="grid-col" style="width:'+colWidth+'px; margin-left:'+colGutter+'px" ></div>');

        if(inflatedColDefCounter >= colDefs.length){
            inflatedColDefCounter = 0;
        }
        var clonedCol = colDefs[inflatedColDefCounter].slice();
        inflatedColDefs.push(clonedCol);
        inflatedColDefCounter++;
    }

    //myTrace('inflatedColDefs: '+inflatedColDefs.length);
    myTrace('inflatedColDefs: '+inflatedColDefs);

    var counter = 0;


    $('.gallery-teaser').each(function(index, value){

        if(counter >= cols){
            counter = 0;
        }
        var colDef = inflatedColDefs[counter];
        myTrace('counter: '+counter+' '+colDef);



        var blockType = colDef[0];
        myTrace('blockType: '+blockType);
        var lastItem = colDef.shift();
        colDef.push(lastItem);
        myTrace('after: '+colDef);
        var block = '<div class="col-block-'+blockType+' col-block" >'+blockType+'</div>'

        $('#col-splitter-grid #col-'+counter).append(block);
        counter++;
    });

}