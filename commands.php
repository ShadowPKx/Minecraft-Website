<?
include "db.php";
// You may copy this PHP section to the top of file which needs to access after login.
session_start(); // Use session variable on this page. This function must put on the top of page.
$_SESSION["prevpage"] = "commands.php";
if(!session_is_registered("username")){ // if session variable "sername" does not exist.
	header("location:login.php"); // Re-direct to index.php
}
?>

<?php
	$title = "Commands";
	include("./includes/header.php");
	//Insert items here to include in HTML Head section
	include("./includes/lowerheader.php"); 
?>

<!-- End Header -->
  <div class="content">
    <h1>List of Commands</h1>
    <p>Here is a list of most of the commands that can be used by all players as well as a short instruction on what they do or how to use them.</p>
    <ul>
		<li>/flashlight - Enable/Disable the flashlight effect when holding a torch.</li>
    	<li>/listwarps - Lists all available warp locations for use with the /warp command.</li>
        <li>/warp &#60;warpname> - Warps your character to the warp specified.</li>
        <li>/playerlist - Lists all players currently in the server.</li>
        <li>/lwc create private - Add your username to the end of this command then left click on a chest.  Only you will be able to see inside the chest afterwards.</li>
		<li>/lwc free chest - Removes all restrictions on a chest that you own.</li>
		<li>/lwc info - Shows information about a chest</li>
        <li>/lottery - Trade 128 dirt and 256 cobblestone for a chance to win big!</li>
        <li>/sethome - Allows you to set a point in which you can return to with /home.</li>
        <li>/home - Returns you to the point set with /sethome.</li>
        <li>/spawn - Returns you to the spawn.</li>
        <li>/kit  - Lists all the kits you can use.</li>
        <li>/kit &lt;kitname&gt; - Gives you the kit specified.</li>
        <li>/motd - Displays the Message of the Day.</li>
        <li>/compass - Displays the direction you are facing.</li>
        <li>/tp &lt;playername&gt; - Teleports you to playername.</li>
        <li>/msg &lt;playername&gt; &lt;message&gt; - Sends a private message to playername.</li>
    </ul>
  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>