<?php
session_start();
$_SESSION['location']= $_POST['location'];
$location = $_SESSION{'location'};
$_SESSION['date']=$_POST['date'];
$_SESSION['overnight']=$_POST['yes/no'];
$url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$_SESSION['location'].'&key=AIzaSyBqb6sLWgvLS4Rin1F3OqV5vI_5Kz-xTEI';
?>
<script>
var status = "<?php echo $_SESSION['STATUS']; ?>";
var username = "<?php echo $_SESSION['SESS_MEMBER_USERNAME'] ?>";
 window.onload = function () 
{
	if (status==true)
	{
		document.getElementById("signLogin").href = "logout.php";
		document.getElementById("signLogin").innerHTML = "Log out";
		document.getElementById("greeting").innerHTML = "hi, "+username+"!";
	}
}
</script>
<!DOCTYPE html>
<html>
  <head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
	body{
	
	background-image: url("image/2.jpg");
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: center; 
	background-color: #66c2ff;
	}
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #333;
	}

	li {
		float: left;
	}

	li a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}

	li a:hover {
		background-color: #111;
	}
	.table1{
	background-color:#99ccff;
		margin: auto;
		width: 80%;
		border: 3px solid #73AD21;
		margin-top:3cm;
	}
	.navbtn {
		width: 20%;
		height: 20%;
	}
      #map {
        width:100%;
		height:100%;
		position: relative;
		top: 0px;
		right: 0px;
       }
	   /* The side navigation menu */
	.sidenav {
		height: 100%; /* 100% Full-height */
		width: 0; /* 0 width - change this with JavaScript */
		position: fixed; /* Stay in place */
		z-index: 1; /* Stay on top */
		top: 0;
		left: 0;
		background-color: #111; /* Black*/
		overflow-x: hidden; /* Disable horizontal scroll */
		padding-top: 60px; /* Place content 60px from the top */
		transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
	}

	/* The navigation menu links */
	.sidenav a {
		padding: 8px 8px 8px 32px;
		text-decoration: none;
		font-size: 25px;
		color: #818181;
		display: block;
		transition: 0.3s
	}

	/* When you mouse over the navigation links, change their color */
	.sidenav a:hover, .offcanvas a:focus{
		color: #f1f1f1;
	}

	/* Position and style the close button (top right corner) */
	.sidenav .closebtn {
		position: absolute;
		top: 0;
		right: 25px;
		font-size: 36px;
		margin-left: 50px;
	}

	/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
	#main {
		transition: margin-left .5s;
		padding: 20px;
	}

	/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
	@media screen and (max-height: 450px) {
		
		.sidenav {padding-top: 15px;

		}
		.sidenav a {font-size: 18px;}
	}
	#over_map { position: absolute; top: 15px; left: 108px; z-index: 99;}
	#wrapper { position: relative; }
	iframe {
		max-height: 200vh;
		height: 700px;
		width: 500px;
	}
	lli {
		float: right;
		color: white;
		text-align: right;
	}
    </style>
  </head>
  <body>
		<ul>
		<li><a class="active" href="ddd.php">Home</a></li>
		<li><a href="Viewevent.php">My Event</a></li>
		<li><a href="About.php">About</a></li>
		<li><a id="signLogin" href="login.php">Login</a></li>
		<lli id="greeting"></lli>
		</ul>
		
		<!-- Use any element to open the sidenav -->
		<form name="aqua2" method="post">
		<div>
		<table class ="table1">
		
		<tr>
			<tr>
				<td>
				<iframe name="myframe">
				</iframe>
				</td>
				<td rowspan="5">
				<div id="wrapper">
				<div style="padding:1px 280px;height:700px; border: 3px solid #73AD21;" id="map">
				
				</div>
				<div id="over_map">
					<a href="weatherForm.php" target="myframe"><button type="button">Weather</button></a>
					<a href="navForm.php" target="myframe"><button type="button">Navigate</button></a>
					<a href="nearbyForm.php" target="myframe"><button type="button">Nearby places</button></a>
					<a href="favoriteForm.php" target="myframe"><button type="button">Add as Favorite</button></a>
				</div>
				</div>
				
				</td>
			</tr>
			
		</tr>
		
		</table>
	</div>
	</form>
		
    <script>
	var theUrl = "<?php echo $url; ?>";
	var location2 = "<?php echo $location; ?>"
		function initMap() 
		{
			  
			jsonHttp = new XMLHttpRequest();
			jsonHttp.open( "GET", theUrl, false ); // false for synchronous request
					
			jsonHttp.send( null );
			var data = JSON.parse(jsonHttp.responseText);
				
			var uluru = {lat: data.results[0].geometry.location.lat, lng: data.results[0].geometry.location.lng};
			var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 15,
			center: uluru
			});
			var marker = new google.maps.Marker({
			  position: uluru,
			  map: map
			});
		}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWMCTHsxLy_HxYcuargdXVkYa85hLhTas&callback=initMap">
    </script>
  </body>
</html>