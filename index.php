<?php include ("./inc/header.inc.php"); ?>
<?php
$reg = @$_POST['reg'];
///declaring variables to avoid errors
$fn = ""; //First Name
$ln = ""; //Last Name
$un = ""; //User Name
$em = ""; //Email
$em2 = ""; //Email 2
$pswd = ""; //Password
$pswd2 = ""; //Password2
$d = ""; //Sign up Date
$u_check ="";//Check if user name exists
//registration form
$fn = strip_tags(@$_POST['fname']);
$ln = strip_tags(@$_POST['lname']);
$un = strip_tags(@$_POST['username']);
$em = strip_tags(@$_POST['email']);
$em2 = strip_tags(@$_POST['email2']);
$pswd = strip_tags(@$_POST['password']);
$pswd2 = strip_tags(@$_POST['password2']);
$d = date("Y-m-d");// Year-Month-Day

if($reg){
if($em=$em2){
//Check if user already exists
$u_check = mysql_query("SELECT username FROM users WHERE username = '$un'");
//Count the amount of rows where username = $un
$check = mysql_num_rows($u_check);
if($check == 0) {
//Check if all the fields  have been filled in
if($fn&&$ln&&$un&&$em&&$em2&&$pswd&&$pswd2){
//Check if the passwords match
if($pswd==$pswd2){
//Check maximum number of username/firstname/lastname does not exceed 25 characters
if(strlen($un)>25||strlen($fn)>25||strlen($ln)>25){
echo "The maximum limit for user name/first name/last name should be 25 characters or less!";
}
else
{
//Check the maximum length of password  does not exceed 30 characters and is not less than five characters 
if(strlen($pswd)>30||strlen($pswd)<5){
echo "Your password must be between 5 and 30 characters long!";
}
else
{
//encrypt password and password2 using md5 before sending to database
$pswd = md5($pswd);
$pswd2 = md5($pswd2);
$query = mysql_query("INSERT INTO users VALUES('','$un','$fn','$ln','$em','$pswd','$d','0')");
die("<h2>Welcome to Petronila</h2> Login to your account to get started...");
}
}
}
else
{
echo "Your passwords do not match!";
}
}
else
{
echo "Please fill in all the fields!";
}
}
else
{
echo "There is a user registered with the same user name, please try again!";
}
}
else
{
echo "Your Email's don't match!";
}
}
//user login code
if(isset($_POST["user_login"]) && isset($_POST["password_login"])){
$user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]);// filter everything but number and letters
$password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]);// filter everything but number and letters
$password_login_md5 = md5($password_login);
$sql = mysql_query("SELECT id FROM users WHERE username = '$user_login' AND password = '$password_login_md5' LIMIT 1");
//check for their existence
$userCount = mysql_num_rows($sql);//count the number of rows returned
if($userCount == 1){
while($row = mysql_fetch_array($sql)){
$id = $row["id"];
}
$_SESSION["user_login"] = $user_login;
header("Location: home.php");
exit();
}
else
{
	echo 'The information is incorrect, please try again';
	exit();
}
}

?>

<div style="margin-top: 150px; margin-left: 450px;" >

<div style="width:800px; margin: 0px auto 0px auto;">
<table>
<tr>
<td width="60%" valign="top">
    <h2>Afrique Employee Management System</h2>
<form action="index.php" method="POST">
<input type="text" name="user_login" size="45" placeholder="Enter Email address" /><br /><br />
<input type="password" name="password_login" size="45" placeholder="Enter Password" /><br /><br />
<input type="submit" name="login" value="Sign in" >

</form>
</td>
</tr>
</table>
</div>
</div>
<?php include ("./inc/footer.inc.php"); ?>