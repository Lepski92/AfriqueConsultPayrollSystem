<?php

include ("./inc/connect.inc.php");
session_start();
if(!isset($_SESSION["user_login"])){
$usernam = "";
}
else
{
$usernam = $_SESSION["user_login"];
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Afrique E.P.S
</title>
<link href="./css/style.css" type="text/css" rel="stylesheet"/>
</head>
<body>

<div class="headerMenu">
<div id="wrapper">
<div class="logo">
<img src="./img/find_friends_logo.png" />
</div>
<div class="search_box">
    <?php
    if(isset($_SESSION["user_login"])){
    echo
'<form action="search.php" method="GET" id="search">
<input type="text" name="q" size="60" placeholder="Search..." />';
    }
 else {
      //Do nothing  
    }
    ?>


</form>

</div>
<div id="menu">
    <?php
    if(isset($_SESSION["user_login"])){
    echo
'<a href="home.php" />List</a>
<a href="add.php" />Add Employee</a>
<a href="'.$usernam.'" />Profile</a>
<a href="#" />Account</a>
<a href="#" />Admin</a>';
    }
 else {
        echo '<a href="afriqueconsult.com" />Afrique Home</a>'
     . '<a href="#" />Forgot Password?</a>'
                . '<a href="#" />Blog</a>';   
    }
?>

</div>
</div>
</div>