
<?php
session_start();
$eventname = $_GET['eventname'];
$username = $_GET['username'];
$url = 'Eventshared.php?eventname='.$eventname.'&username='.$username;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<script>
	var username = "<?php echo $username; ?>";
	var eventname = "<?php echo $eventname; ?>";
	
	var url = "<?php echo $url; ?>";
		// initialize and setup facebook js sdk
		window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '1297524923675994',
		      xfbml      : true,
		      version    : 'v2.5'
		    });
		    FB.getLoginStatus(function(response) {
		    	if (response.status === 'connected') {
		    		document.getElementById('status').innerHTML = 'Sharing...';
					share();
		    		document.getElementById('login').style.visibility = 'hidden';
					
		    	} else if (response.status === 'not_authorized') {
		    		document.getElementById('status').innerHTML = 'We are not logged in.'
					login();
		    	} else {
		    		document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
					login();
		    	}
		    });
		};
		(function(d, s, id){
		    var js, fjs = d.getElementsByTagName(s)[0];
		    if (d.getElementById(id)) {return;}
		    js = d.createElement(s); js.id = id;
		    js.src = "//connect.facebook.net/en_US/sdk.js";
		    fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
			function login() {
			FB.login(function(response) {
				if (response.status === 'connected') {
		    		document.getElementById('status').innerHTML = 'We are connected.';
		    		document.getElementById('login').style.visibility = 'hidden';
		    	} else if (response.status === 'not_authorized') {
		    		document.getElementById('status').innerHTML = 'We are not logged in.'
		    	} else {
		    		document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
		    	}
			}, {scope: 'publish_actions'});
			share();
		}
		// posting on user timeline
		function share() {
			FB.api('/me/feed', 'post', {message: url}, function(response) {
				document.getElementById('status').innerHTML = 'shared!';
				document.getElementById('navigate').innerHTML = 'Click me to Main Page';
			});
		}
	</script>
	<p id="status"></p>
	<a id="navigate" href="ddd.php"></p>
</body>
</html>