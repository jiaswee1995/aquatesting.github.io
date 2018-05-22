
<?php
session_start();
$location = $_SESSION{'location'};

?>
<!DOCTYPE html>
<html>
<head>
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #f1f1f1}

.show {display:block;}
</style>
</head>
<body>

<h2>Weather Prediction</h2>

<div class="dropdown">
  <select id="myDropdown">
  </select>
  <button type="button" onclick="find()">OK</button>
  <p id="mainweather"></p>
  <p id="weatherdesc"></p>
  <img id="weatherimage"/>
</div>

<script>
var location2 = "<?php echo $location; ?>";
window.onload = function () 
{
	
	var weatherUrl = "http://api.openweathermap.org/data/2.5/forecast?q="+location2+"&appid=a3592acb15b4f6e6daf28adeb2ea98ea";
			
	jsonHttp2 = new XMLHttpRequest();
	jsonHttp2.open( "GET", weatherUrl, false ); // false for synchronous request
	jsonHttp2.send( null );
	var data = JSON.parse(jsonHttp2.responseText);
	for (var count=0;count<40;count++)
		{
				
			var date = data.list[count].dt_txt;
			var main = data.list[count].weather[0].main;
			var desc = data.list[count].weather[0].description;
			var opt = document.createElement("option");
			document.getElementById("myDropdown").options.add(opt);
			opt.text = date;
			opt.value = date;
		}
}

function find()
{
	var weatherUrl = "http://api.openweathermap.org/data/2.5/forecast?q="+location2+"&appid=a3592acb15b4f6e6daf28adeb2ea98ea";
			
	jsonHttp2 = new XMLHttpRequest();
	jsonHttp2.open( "GET", weatherUrl, false ); // false for synchronous request
	jsonHttp2.send( null );
	var data = JSON.parse(jsonHttp2.responseText);
for (var count=0;count<40;count++)
		{
				if (document.getElementById("myDropdown").value == data.list[count].dt_txt)
				{
					var date = data.list[count].dt_txt;
					var main = data.list[count].weather[0].main;
					var desc = data.list[count].weather[0].description;
					document.getElementById("mainweather").innerHTML = 'Main weather: '+main+'';
					document.getElementById("weatherdesc").innerHTML = 'Weather description: '+desc+'';
					if (main=='Rain')
					{
						document.getElementById("weatherimage").src = "image/gif/rain.gif";
					}
					else if (main=='Clouds')
					{
						document.getElementById("weatherimage").src = "image/gif/clouds.gif";
					}
					else if (main=='Sunny')
					{
						document.getElementById("weatherimage").src = "image/gif/sunny.gif";
					}
				}
			
		}
}
</script>

</body>
</html>

