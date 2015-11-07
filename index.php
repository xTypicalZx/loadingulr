<?php 
	require_once("settings.php");
	
	if ($SteamAPI_KEY == "8FC01A0822C9ED1E6E76CD12B82F931D") die("<b>Loading screen by Stebbzor</b><br /><br />Please edit <b>settings.php</b>");
	
	$Name = "Player Name";
	$Avatar  = 'img/noavatar.jpg';
	
	if (isset($_GET['steamid'])) 
	{
		$SteamAPI = 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . $SteamAPI_KEY . '&steamids=' . $_GET['steamid'];
		
		$SteamAPI_Returned = file_get_contents($SteamAPI);
		
		$steamAPI = json_decode($SteamAPI_Returned, true);
		
		if (isset($steamAPI['response']['players'][0]['personaname']))
		{
			$Name = $steamAPI['response']['players'][0]['personaname'];
		}
		
		if (isset($steamAPI['response']['players'][0]['avatarmedium']))
		{
			$Avatar = $steamAPI['response']['players'][0]['avatarmedium'];
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="css/load.css">
		<link rel="stylesheet" type="text/css" href="css/backgroundrotate.css" />
		<script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
	</head>
	<body id="page">
        <ul class="cb-slideshow">
            <li><span>Image 01</span><div></div></li>
            <li><span>Image 02</span><div></div></li>
            <li><span>Image 03</span><div></div></li>
            <li><span>Image 04</span><div></div></li>
            <li><span>Image 05</span><div></div></li>
            <li><span>Image 06</span><div></div></li>
        </ul>
		<div class="progress">
		  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="0" style="width: 0%">
			<span class="sr-only">40% Complete (success)</span>
		  </div>
		</div>
		
		<?php if ($Enable_Music) { ?>
		<audio autoplay loop>
		  <source src="<?php echo $Song_Link; ?>.mp3" type="audio/mpeg">
			Your browser does not support the audio element.
		</audio>
		<?php } ?>
		
		<center><span class="communityName"><?php echo $Community_Name; ?></span></center>
		
		<div class="container">
			<div class="cJumbotron" style="margin-top: 50px; padding-bottom: 17px;">
				<div class="avatarBG"><img class="avatar" width="64" height="64" src="<?php echo $Avatar; ?>" /></div>
				<span class="playerInfo"><?php echo $Name; ?></span><br />
				<span class="playerInfoSmall" id="joiningInfo"></span><br />
				<span class="playerInfoSmall" id="joiningInfoSrv"></span>
			</div>
		</div>
		<div class="container">
			<div class="cJumbotron" style="margin-top: 10px;">
				<center><h2>History</h2></center>
				<div class="consoleBox" id="console">
				</div>
			</div>
		</div>
		
		<!-- jQuery (Neccesary for loading.js and bootstrap) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/loading.js"></script>
	</body>
</html>