// JavaScript Document
// JavaScript Document
var mapScriptTimer;
var hasinitialized = false;



/*
function panToMarker(targetMap,id){
	$('.locations-nav li a').removeClass('active');
	$('#node_'+id+' a').addClass('active');
	for (var i=0; i < mapLocations.length; i++){
		if(mapLocations[i].id == id){
			var latLng = mapLocations[i].LatLng.split(",");
			targetMap.panTo(new google.maps.LatLng(latLng[0],latLng[1]));
		}
	}
}
*/

function panToInitial(targetMap,myInitialPos){
	targetMap.panTo(new google.maps.LatLng(myInitialPos[0],myInitialPos[1]));
}

function setZoom(targetMap,zoomLevel){
    targetMap.setZoom(zoomLevel);
}


function mapResize(targetMap){
	//console.log('map resize');
	google.maps.event.trigger(targetMap,'resize');
}

function scaleMap(){
		/*
		width and height come from head-script.js		
		*/		
		if(!isTouch){
			
		}				
		$('#googlemap').css({'width':$(window).width()-500,'height':$(window).height()});
		$('.subnav').height($(window).height());
		mapScriptTimer = setTimeout(scaleMap,300);
}

/*var image = baseUrl+'public/img/carga_map_marker02.png';*/	
var imageCoreMarker = templateUri+'/img/8octavia.png';


function setmarker(targetMap,dataJSON,doBindClickEvent){
	
	//var property = new google.maps.Marker(propertyData);
	//console.log(dataJSON);
	
	
	for (var i=0; i < dataJSON.length; i++){
		//console.log(mapLocations[i]);
		
		var name = dataJSON[i].name;
		var url  = dataJSON[i].url;
		var thumb  = dataJSON[i].thumb;
		var address = 'Street name 14';
		
		var latLng = dataJSON[i].LatLng.split(",");
		var marker = new google.maps.Marker({
				position: new google.maps.LatLng(latLng[0],latLng[1]),
				map:targetMap,
				icon: image,
				boxLabel: name,
				thumb: thumb,				
				url: url  
		});
		if(doBindClickEvent == true){
			bindClickEvent(targetMap,marker);
		}
	}			 		
	
	
}



var currentOpen = '';

function bindClickEvent(targetMap,myMarker){
	google.maps.event.addListener(myMarker,'click', function() {
				
				if(currentOpen != myMarker.url){
					console.log(myMarker);
					infowindow.open(targetMap,myMarker);
					currentOpen = myMarker.url;
					//infowindow.setContent("<div class='propertyinfo-box' ><div class='property-info'>"+name+"<p><a href=\'"+url+"\' target='_blank'>"+url+"</a></p>"+address+"</div></div>");
					
					infowindow.setContent("<div class='propertyinfo-box' ><a href='javascript:closeInfoWindow()' >"+myMarker.thumb+"</a><div class='close-box'><a href='javascript:closeInfoWindow()' ><img src='"+templateUri+"/img/close-x-for-map-translucent.png' /></a></div><div class='project-info' ><h4>"+myMarker.boxLabel+"</h4><a href='"+myMarker.url+"'>see project ></a></div>");
                    targetMap.setCenter(myMarker.getPosition());
                    targetMap.panBy(115,80);
					//infoWidowIsOpen = true;
				}else{
					closeInfoWindow()
				}
		//map.panTo(new google.maps.LatLng(37.777245,-122.431524));	
		//map.setZoom(13);
		//setCenter	 
		// .event.trigger(map, 'resize');
	})
	
}


function closeInfoWindow(){
	infowindow.close();
	currentOpen = '';
}

var boxText = document.createElement("div");

/*			   
var myOptions = {
		 content: boxText
		,disableAutoPan: false
		,maxWidth: 0
		,pixelOffset: new google.maps.Size(15,-80)
		,zIndex: null
		,boxStyle: { 
		  width: "310px",
		  height:"60px",
		  border:"1px solid #000",
		  background:"#fff"				   
		 }
		,closeBoxMargin: "8px 8px 2px"
		,closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif"
		,infoBoxClearance: new google.maps.Size(10, 10)
		,isHidden: false
		,pane: "floatPane"
		,enableEventPropagation: false
};
infobox = new InfoBox({
		content: '<div></div>',
		disableAutoPan: true,
		maxWidth: 0,
		pixelOffset: new google.maps.Size(20,-20),
		zIndex: null,
		boxStyle: { 
		  width: "auto",
		  height:"auto",
		  border:"1px solid #000",
		  background:"#000",
		  color: "#fff",
		  paddingLeft: "12px",				   
		  paddingTop: "6px",
		  paddingBottom: "6px"		 
		 },
		closeBoxMargin: "2px 8px 2px",
		closeBoxURL: "public/app-assets/img/space-ball.png",
		infoBoxClearance: new google.maps.Size(10, 10),
		isHidden: false,
		pane: "floatPane",
		enableEventPropagation: false
	});





var myOptions = {
		 content: boxText
		,disableAutoPan: true
		,maxWidth: 0
		,zIndex: null
		,boxStyle: { 
		  width: "310px",
		  height:"60px",
		  border:"0px solid #000",		  
		  background:"#000",
		  color:'#fff'				   
		 }
		,closeBoxMargin: "8px 8px 2px"
		,closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif"
		,infoBoxClearance: new google.maps.Size(10, 10)
		,isHidden: false
		,pane: "floatPane"
		,enableEventPropagation: false
};

*/


var infowindow =  new InfoBox({
		content: '<div></div>',
		disableAutoPan: true,
		maxWidth: 0,
		pixelOffset: new google.maps.Size(20,-20),
		zIndex: null,
		boxStyle: { 
		  width: "auto",
		  height:"auto"		  	 
		 },
		closeBoxMargin: "2px 8px 2px",
		closeBoxURL: templateUri+"/img/space-ball.png",
		infoBoxClearance: new google.maps.Size(10, 10),
		isHidden: false,
		pane: "floatPane",
		enableEventPropagation: false
	});