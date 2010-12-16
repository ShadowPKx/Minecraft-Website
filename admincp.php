<?
include "db.php";
session_start();
$_SESSION["prevpage"] = "admincp.php";
if(!session_is_registered("username")){ // if session variable "username" does not exist.
	header("location:login.php"); // Re-direct to login.php
}
elseif($_SESSION["level"] < 4){ //Must be level 4 or higher to get in
	header("location:index.php"); // Re-direct to index.php
}

//Create new article on front page
if (isset($_POST['title']) && isset($_POST['content']))
{
	$title = mysql_real_escape_string($_POST['title']); 
	$content = mysql_real_escape_string($_POST['content']); 
	
	//Insert into table
	$querry = "INSERT INTO frontpage (title, content) VALUES ('$title', '$content')";
	mysql_query($querry);
}

//Remove article from front page
if (isset($_POST['title']) && isset($_POST['confirm']))
{
	$title = mysql_real_escape_string($_POST['title']);
	$confirm = $_POST['confirm'];
	if($confirm == 1){
		$query_date = "UPDATE frontpage SET onfront=0 WHERE title='$title'";
		mysql_query($query_date) or die(mysql_error());
	}
}


?>

<?php
	$title = "Admin Control Panel";
	include("./includes/header.php"); 
?>

<!-- End Header -->  
  <div class="content">
    <?php
		echo "<h3>Add to Front Page</h3>";
		if ($_SESSION["level"] == 5) //Only have the ability to add if level 5 account
		{
			echo
				'<p>
					<form action="admincp.php" method="post">
							</p>
								<table>
									<tr>
										<td>Title: </td>
										<td><input name="title" type="text" /></td>
									</tr>
								</table>
							
								<textarea rows="4" cols="33" name="content"></textarea>
							</p>
							<input type="submit" value="Add to Front Page" />
						</form>
				</p>';
		}
		else
		{
			echo "<p>You are not level 5</p>";
		}
		echo "<h3>Remove from Front Page</h3>";
		if ($_SESSION["level"] == 5) //Only have the ability to remove article from front if level 5 account
		{
			echo
				'<p>
					<form action="admincp.php" method="post">
							</p>
								<table>
									<tr>
										<td>Title to Remove from Front: </td>
										<td><input name="title" type="text" /></td>
									</tr>
								</table>
								<input type="checkbox" name="confirm" value="1" />Are you sure?
							</p>
							<input type="submit" value="Remove from Front Page" />
						</form>
				</p>';
		}
		else
		{
			echo "<p>You are not level 5</p>";
		}
	?>
	
  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>