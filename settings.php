<?php 
	/*
		Loading screen created by Stebbzor
		Contact Via: http://steamcommunity.com/id/stebbzor/
		or Message on ScriptFodder.com
		
		Thank you for supporting me by buying this script.
		
		Need a Steam API key?
		Simply go on http://steamcommunity.com/dev/apikey and sign in.
		
		When you have signed in you'll need to fill out a website url, just put your website in there, doesn't have to be the exact url to the loading screen.
		When you are done it should give you a Key, similar to this
		
		Key: 8EF05470DE2640B829E2DBD8750618D1
		
		Except the code after Key: will be one specifically for you.
		
		Copy that code and replace it with the "YOUR KEY HERE" below
		
		When you're done with that you'll have to go into your server.cfg file
		and add this line
		
		sv_loadingurl "http://yourdomain.com/loadingscreen/?steamid=%s"
		
		Then restart your server and wait for it to kick in.
	*/
	
	$SteamAPI_KEY = "8EF05470CE2640C828A2DBD8750618D1"; //Steam API Key goes here!
	
	$Community_Name = "Stebbzor's Dev Server";
	
	$Enable_Music = true;
	$Music_Folder = "music";
	$Number_Of_Songs = 0; //DO NOT TOUCH THIS
	
    $dir = $Music_Folder . '/';
    if ($handle = opendir($dir)) {
        while (($file = readdir($handle)) !== false){
            if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) 
                $Number_Of_Songs++;
        }
    }
	
	$Selected_Song = mt_rand(1, $Number_Of_Songs);
	
	$Song_Link = $Music_Folder . '/' . $Selected_Song;
?>