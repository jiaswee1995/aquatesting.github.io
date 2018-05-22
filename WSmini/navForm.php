
<?php
session_start();
$location = $_SESSION{'location'};
?>
<!DOCTYPE html>
<html>
<h2>Navigation</h2>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions service</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>
	<form name="aqua" method="post">
		<table>
		<tr>
			<td><p>Start: </p></td> 
			<td><input type="text" id="start"/></td>
			<td><button type="button" id="locate" onclick="getLocation()">Locate my location</button></td>
		</tr>
		<tr>
			<td><p>End: </p></td> 
			<td><input type="text" id="end"/></td>
			<td><button type="button" id="navigate">Navigate</button></td>
		</tr>
		<p id="error"></p>
		</table>
	</form>
    <div id="map"></div>
    <script>
	var end = "<?php echo $location; ?>";
		var x = document.getElementById("error");

	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition, showError);
		} else { 
			x.innerHTML = "Geolocation is not supported by this browser.";
		}
	}

	function showPosition(position) {
		var Getnameurl = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude+'&key=AIzaSyBa1bEF8z0jFtq6sEpOyAOUJlT16gqBcB0';
		jsonHttp = new XMLHttpRequest();
		jsonHttp.open( "GET", Getnameurl, false ); // false for synchronous request
		jsonHttp.send( null );
		var data = JSON.parse(jsonHttp.responseText);
		var origin = data.results[0].address_components[0].long_name;
		var origin2 = data.results[0].address_components[1].long_name;
		document.getElementById('start').value=origin+', '+origin2;
	}

	function showError(error) {
		switch(error.code) {
			case error.PERMISSION_DENIED:
				x.innerHTML = "User denied the request for Geolocation."
				break;
			case error.POSITION_UNAVAILABLE:
				x.innerHTML = "Location information is unavailable."
				break;
			case error.TIMEOUT:
				x.innerHTML = "The request to get user location timed out."
				break;
			case error.UNKNOWN_ERROR:
				x.innerHTML = "An unknown error occurred."
				break;
		}
	}
      function initMap() {
		  document.getElementById('end').value=end;
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 41.85, lng: -87.65}
        });
        directionsDisplay.setMap(map);
		var onClickHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
		document.getElementById('navigate').addEventListener('click', onClickHandler);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLTbjC5v6_IzBoucHnJhvRC8_lv-ZU-Vc&callback=initMap">
    </script>
  </body>
</html>
