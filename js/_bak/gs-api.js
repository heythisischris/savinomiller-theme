var map1;
var map2;


var stylez1 = [ 
	{
		"elementType": "geometry.fill", 
		"stylers": [ 
			{ "color": "#dedede" }, 
			{ "visibility": "on" }
		] 
	},
	{	"featureType": "road",
		"elementType": "geometry.fill",
		"stylers": [ 
			{ "color": "#ffffff" } 
		] 
	},
	{	"featureType": "water",
		"elementType": "geometry.fill",
		"stylers": [ 
			{ "color": "#889cad"  } 
		] 
	},
	{	"elementType": "labels.text.stroke", 
		"stylers": [ 
			{ "visibility": "off" }
		] 
	},
	{	"elementType": "geometry.stroke",
		"stylers": [ 
			{"visibility": "off" } 
		]
	},
	{	"elementType": "labels.text",
		"stylers": [
			{ "color": "#808080" }
		]}
	,{	"featureType": "poi",
		"stylers": [{ "visibility": "off" }		
		]
	},{ "featureType": "poi.park",
		"elementType": "geometry.fill", 
		 "stylers": [ { "color": "#adc798" },{ "visibility": "on" } ] 
	},{ "featureType": "transit.line", "stylers": [ { "visibility": "off" } ] }
];


/*
var stylez =[
  {
    featureType: "administrative",
    elementType: "all",
    stylers: [
      { saturation: -100 }
    ]
  },{
    featureType: "landscape",
    elementType: "all",
    stylers: [
      { saturation: -100 }
    ]
  },{
    featureType: "poi",
    elementType: "all",
    stylers: [
      { saturation: -100 }
    ]
  },{
    featureType: "road",
    elementType: "all",
    stylers: [
      { saturation: -100 }
    ]
  },{
    featureType: "transit",
    elementType: "all",
    stylers: [
      { saturation: -100 }
    ]
  },{
    featureType: "water",
    elementType: "all",
    stylers: [
      { saturation: -50 }
    ]
  }
];
*/






function initialize() {
		
		
		var MY_MAPTYPE_ID1 = 'CUSTOM-MAP';
		
		var mapOptions = {
			zoom: zoom,
			center: center,
			mapTypeControlOptions: {
			   mapTypeIds: [MY_MAPTYPE_ID1,google.maps.MapTypeId.HYBRID]
			},
			panControl: false,
			panControlOptions: {
				position: google.maps.ControlPosition.TOP_RIGHT
			},
			zoomControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.LARGE,
				position: google.maps.ControlPosition.RIGHT_CENTER
			},
			mapTypeId: MY_MAPTYPE_ID1
		};
	
		

		map1 = new google.maps.Map(document.getElementById("googlemap"),mapOptions);
		
		
		var jayzMapType = new google.maps.StyledMapType(stylez1,{ name:"Map" });
		map1.mapTypes.set(MY_MAPTYPE_ID1, jayzMapType);
		//map1.setMapTypeId('MY_MAPTYPE_ID1');
		
		/*map1.setOptions({ mapTypeControlOptions: {mapTypeIds: [
														google.maps.MapTypeId.HYBRID,
														google.maps.MapTypeId.TERRAIN,
														MY_MAPTYPE_ID]
				} 
		})
		*/
		
		
		//map_center
		google.maps.event.addListener(map1,'drag',function(event) {
		$('#map_center').val(map1.getCenter())
		});
		
		google.maps.event.addListener(map1, 'zoom_changed', function() {
		$('#map_zoom').val(map1.getZoom());
		});
		
		/*
		var styledMapOptions = {
		
		
		};
		*/
		
		
		//google.maps.event.addListenerOnce(map, "idle", function() { updateMap('All'); });

}

function initialize2() {
	
		var MY_MAPTYPE_ID2 = 'CUSTOM-MAP2';
		
		var mapOptions = {
			zoom: zoom2,
			center: center2,
			mapTypeControlOptions: {
			   mapTypeIds: [MY_MAPTYPE_ID2,google.maps.MapTypeId.HYBRID]
			},
			panControl: false,
			panControlOptions: {
				position: google.maps.ControlPosition.TOP_RIGHT
			},
			zoomControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.LARGE,
				position: google.maps.ControlPosition.RIGHT_CENTER
			},
			mapTypeId: MY_MAPTYPE_ID2
		};
	
		

		map2 = new google.maps.Map(document.getElementById("googlemap2"),mapOptions);
		//map_center
		var jayzMapType = new google.maps.StyledMapType(stylez1,{ name:"Map" });
		map2.mapTypes.set(MY_MAPTYPE_ID2, jayzMapType);
		
		
		google.maps.event.addListener(map2,'drag',function(event) {
		$('#map_center').val(map2.getCenter())
		});
		
		google.maps.event.addListener(map2, 'zoom_changed', function() {
		$('#map_zoom').val(map2.getZoom());
		});
		
		
		/*
		var styledMapOptions = {
		
		
		};
		*/
		
		//google.maps.event.addListenerOnce(map, "idle", function() { updateMap('All'); });

}


