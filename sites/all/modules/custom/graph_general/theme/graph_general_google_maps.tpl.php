<!--Map de graph victory-->
<div class="container margin-bottom-30">
	<div id="map" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  ></div>
	<script>
		var map;
		var lima = new google.maps.LatLng(-12.056872, -77.037744);
		//key=AIzaSyCoHvTZB0mzfr-w-RaJEJOlsgnpsWMwp80
		initialize();
		function initialize() {
			var mapOptions = {
					zoom: 15,
					//mapTypeId: 'satellite',
					center: lima,
					styles: [ { "featureType":"landscape", "stylers":[ { "hue":"#F1FF00" }, { "saturation":-27.4 }, { "lightness":9.4 }, { "gamma":1 } ] }, { "featureType":"road.highway", "stylers":[ { "hue":"#0099FF" }, { "saturation":-20 }, { "lightness":36.4 }, { "gamma":1 } ] }, { "featureType":"road.arterial", "stylers":[ { "hue":"#00FF4F" }, { "saturation":0 }, { "lightness":0 }, { "gamma":1 } ] }, { "featureType":"road.local", "stylers":[ { "hue":"#FFB300" }, { "saturation":-38 }, { "lightness":11.2 }, { "gamma":1 } ] }, { "featureType":"water", "stylers":[ { "hue":"#00B6FF" }, { "saturation":4.2 }, { "lightness":-63.4 }, { "gamma":1 } ] }, { "featureType":"poi", "stylers":[ { "hue":"#9FFF00" }, { "saturation":0 }, { "lightness":0 }, { "gamma":1 } ] }] 
				};
			map = new google.maps.Map(document.getElementById('map'), mapOptions);

		var rest_array = ['-12.056872', '-77.037744'];
	     var infoWindows = [];
	    function closeAllInfoWindows() {
		  for (var i=0;i<infoWindows.length;i++) {
		     infoWindows[i].close();
		  }
		}
	    for (i = 0; i < rest_array.length; i++) {  
	    	marker = new google.maps.Marker({
	        	position: 	new google.maps.LatLng(rest_array[0], rest_array[1]),
				map: map,
				title: '',
				icon: 	'http://drupal.dev/sites/all/themes/best_responsive/images/marker.png',
	    	});
	        google.maps.event.addListener(marker, 'click', (function(marker, i) {
		        return function() {
		        	var contentString = '<div class=""><img class="img-fluid" src="http://drupal.dev/sites/all/themes/best_responsive/images/img3.png"><div class="text-white h6"><span>Bolsa : </span>Av. caminos del inca 1325 Surco</div><div>';
		        		infoBubble = new InfoBubble({
		          		content: 			contentString,
		          		minWidth: 			285,
          				maxWidth: 			290,
		          		minHeight: 			250, 
		          		borderRadius: 		0,
		          		backgroundColor: 	'#0c5286',
		          		borderColor: 		'#0c5286',
		        	});
		        	closeAllInfoWindows();
		        	infoBubble.open(map, marker);
		        	infoWindows.push(infoBubble); 
		        }
		    })(marker, i));
	    }
	}
	</script>
</div>