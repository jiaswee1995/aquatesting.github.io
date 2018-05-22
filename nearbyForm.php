<?php
session_start();
$location = $_SESSION['location'];
$url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$_SESSION['location'].'&key=AIzaSyBqb6sLWgvLS4Rin1F3OqV5vI_5Kz-xTEI';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Place searches</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
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
    </style>
    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var map;
      var infowindow;
	  var theUrl = "<?php echo $url; ?>";
	  
		function starting()
		{
			jsonHttp = new XMLHttpRequest();
			jsonHttp.open( "GET", theUrl, false ); // false for synchronous request
			jsonHttp.send( null );
			var data = JSON.parse(jsonHttp.responseText);
			latcoor = data.results[0].geometry.location.lat;
			lngcoor = data.results[0].geometry.location.lng;
				var onChangeHandler = function() {
			  initMap(latcoor, lngcoor);
			};
			document.getElementById('typeplace').addEventListener('change', onChangeHandler);
			document.getElementById('radiusplace').addEventListener('change', onChangeHandler);
			initMap(latcoor,lngcoor);
		}
		
      function initMap(latcoor,lngcoor) {
        var pyrmont = {lat: latcoor, lng: lngcoor};

        map = new google.maps.Map(document.getElementById('map'), {
          center: pyrmont,
          zoom: 15
        });

        infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
          location: pyrmont,
          radius: document.getElementById('radiusplace').value,
          type: [document.getElementById("typeplace").value]
        }, callback);
      }

      function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
          }
        }
      }

      function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
      }
    </script>
  </head>
  <body>
	<p id="error"></p>
	<table>
	<tr>
	<td><p>Type of places:</p></td>
	<td><select id="typeplace">
	<option value="restaurant">Restaurant</option>
	<option value="airport">Airport</option>
	<option value="bank">Bank</option>
	<option value="gym">Gym</option>
	<option value="train_station">Train Station</option>
	<option value="hospital">Hospital</option>
	<option value="hotel">Hotel</option>
	</select></td>
	</tr>
	<tr>
	<td><p>Radius to search:</p></td>
	<td><select id="radiusplace">
	<option value="500">500</option>
	<option value="1000">1000</option>
	<option value="1500">1500</option>
	<option value="2000">2000</option>
	<option value="2500">2500</option>
	<option value="3000">3000</option>
	</select></td>
	</tr>

	</table>
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFfosJfOb9wccyAL6crdoKAU3YkmCfDdQ&libraries=places&callback=starting" async defer></script>
  </body>
</html>