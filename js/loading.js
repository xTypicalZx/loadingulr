/*CONFIG FOR TESTING THE LOADING SCREEN*/
var isDevelopmentMode = false; //Set to true if you wanna test it
/*-------------------------------------*/

var counter = 0;
var maxLines = 26
var filesTotal = 0;
var filesNeeded = 0;
var filesDownloaded = 0;
var extensions = new Array();
extensions["jpg"] = "jpeg";
extensions["peg"] = "jpeg";
extensions["bsp"] = "map";
extensions["vmt"] = "texture";
extensions["vtf"] = "texture";
extensions["png"] = "png";
extensions["vtx"] = "models";
extensions["mdl"] = "models";
extensions["phy"] = "models";
extensions["vvd"] = "models";
extensions["wav"] = "sounds";
extensions["mp3"] = "sounds";
extensions["pcf"] = "particles";
extensions["ttf"] = "fonts";

function SetFilesTotal( total ) {
	filesTotal = total;
}

function SetFilesNeeded( needed ) {
	filesNeeded = needed;
}

function GameDetails( servername, serverurl, mapname, maxplayers, steamid, gamemode ) {
	$("#joiningInfoSrv").append("You are entering the gamemode <span style='font-weight: 500 !important'>" + gamemode + "</span> on the map <span style='font-weight: 500 !important'>" + mapname + "</span>");
	$("#joiningInfo").append("You are playing on <span style='font-weight: 500 !important'>" + servername + "</span>");
}

function SetStatusChanged( status ) {
	$("#console").prepend("<p id='gamedetails'>" + status + "</p>");
	counter++;
	
	if (counter > maxLines)
	{
		$("#console p:last-child").remove()
	}
}

function DownloadingFile( fileName ) {
	var extension = fileName.substr(fileName.length - 3);

	filesDownloaded++;
	
	$("#console").prepend("<p class='status' id='" + extensions[extension] + "'>" + fileName + " <small id='white'> (" + filesDownloaded + "/" + filesTotal + ")</small></p>");
	counter++;
	
	if (counter > maxLines)
	{
		$("#console p:last-child").remove()
	}
	
	$('.progress-bar').css('width', filesNeeded*2+'%').attr('aria-valuenow', filesNeeded*2); 
	$('.progress-bar').attr('aria-valuemax', filesTotal); 
}

if (isDevelopmentMode) {
	SetFilesTotal(50);
	SetFilesNeeded(25);

	/*
	for (var p = 0; p <= 25; p++)
	{
		DownloadingFile("Downloading materials/mycommunity/background_image_" + p + ".png");
	}
	*/

	DownloadingFile("Downloading materials/mycommunity/image.jpeg");
	DownloadingFile("Downloading materials/mycommunity/second_image.jpeg");
	DownloadingFile("Downloading materials/mycommunity/gm_construct.bsp");
	DownloadingFile("Downloading materials/mycommunity/texture_file.vmt");
	DownloadingFile("Downloading materials/mycommunity/some_texture.vmt");
	DownloadingFile("Downloading materials/mycommunity/background_image.png");
	DownloadingFile("Downloading materials/mycommunity/crazy_hud.png");
	DownloadingFile("Downloading materials/mycommunity/hatsune_miku.mdl");
	DownloadingFile("Downloading materials/mycommunity/pink_terrorist.mdl");
	DownloadingFile("Downloading materials/mycommunity/mysong.mp3");
	DownloadingFile("Downloading materials/mycommunity/yelling.mp3");
	DownloadingFile("Downloading materials/mycommunity/my_particles.pcf");
	DownloadingFile("Downloading materials/mycommunity/second_particles.pcf");
	DownloadingFile("Downloading materials/mycommunity/bebasnueue.ttf");
	DownloadingFile("Downloading materials/mycommunity/overusedfont.ttf");


	SetStatusChanged("Sending client info..");
	SetStatusChanged("Receiving client info..");
	GameDetails( "24/7 Prop Hunt [Version 2]", "asdf.com", "cs_office", 20, "asdf", "Prop Hunt" );
}

$( document ).ready(function() {
    $('audio').prop('volume', 0.50);
});