<?php include ("./inc/header.inc.php"); ?>

<b><p style="color: black; margin-left: 10px; margin-top: 5px;">Hallo <?php echo $_SESSION['user_login']; ?>, Welcome Afrique Employee Management System.</p></b>
<b><p style="color: black; margin-left: 10px;">Would you like to log out? <a href = "logout.php">Logout</a></p></b>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<div id = "HomeContainer" style="">
    <div id="Menu"></div>
    <div id="Main"></div>
    
    
</div>

<?php include ("./inc/footer.inc.php"); ?>