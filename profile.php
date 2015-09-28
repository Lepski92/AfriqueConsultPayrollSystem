<?php include ("./inc/header.inc.php"); ?>
<link href = "css/profile.css" rel = "stylesheet" type = "text/css" />
<?php
if(isset($_GET['u']))
{
$username = mysql_real_escape_string($_GET['u']);
if(ctype_alnum($username)){
//check user exists
$check = mysql_query("SELECT username, first_name, last_name FROM users WHERE username = '$username'");
if(mysql_num_rows($check) === 1)
{
$get = mysql_fetch_assoc($check);
$username = $get['username'];
$firstname = $get['first_name'];
$lastname = $get['last_name'];
}
else
{
echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/index.php\">";
exit();
}
}
}
?>


<div id = "Container">
<div id = "Sideleft">

<div id = "Imageleftside">

<img src = "" height = "200" width = "150"/>
</div>
<div id = "Aboutthisguy">
<div id = "HeaderSet">
<?php echo $firstname; ?> <?php echo $lastname; ?>'s Profile.
</div>
Some contents about this person
</div>
<div id = "FriendsOfThisGuy">
<div id = "HeaderSet">
<?php echo $firstname; ?> <?php echo $lastname; ?>'s Friends.
</div>
<img src = "#" height = "50" width = "40" />&nbsp;&nbsp;
<img src = "#" height = "50" width = "40" />&nbsp;&nbsp;
<img src = "#" height = "50" width = "40" />&nbsp;&nbsp;
<img src = "#" height = "50" width = "40" />&nbsp;&nbsp;
<img src = "#" height = "50" width = "40" />&nbsp;&nbsp;
<img src = "#" height = "50" width = "40" />&nbsp;&nbsp;
<img src = "#" height = "50" width = "40" />&nbsp;&nbsp;
<img src = "#" height = "50" width = "40" />&nbsp;&nbsp;
<img src = "#" height = "50" width = "40" />&nbsp;&nbsp;
<img src = "#" height = "50" width = "40" />&nbsp;&nbsp;
<img src = "#" height = "50" width = "40" />&nbsp;&nbsp;
<img src = "#" height = "50" width = "40" />&nbsp;&nbsp;
</div>
</div>
<div id = "SideRight">
<div id = "PostFormHolder">
postform goes here
</div>
<div id = "PostsGoHere">
Posts goes here....
</div>
</div>
</div>

<?php include ("./inc/footer.inc.php"); ?>