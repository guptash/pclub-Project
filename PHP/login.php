<!DOCTYPE HTML> 
<html>
<head>
<style>
body {background-image:url("b1.jpg");}
background-repeat:repeat-x;
</style>
<style>
.error {color: #FF0000;}
</style>
<title>
AUTO-SHARE
</title>
</head>
<body> 
<?php
$useridErr = $passwordErr = "";
$userid = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $useridErr = "Username is required";
     } else {
     $userid = input($_POST["name"]);
   }
   
   if (empty($_POST["password"])) {
     $passwordErr = "password is required";
      } else {
     $password = input($_POST["password"]);
   }
     }

function input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<center><h1>AUTO SHARE</h1></center>
<br><br><br><br><br><br><br>
<center>
  <p><span class="error">* required field.</span></p></center>
<center><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 Username: <input type="text" name="userid">
   <span class="error">* <?php echo $useridErr;?></span>
   <br><br>
   Password: <input type="password" name="email">
   <span class="error">* <?php echo $passwordErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form></br>
<form action="signup.php">
<input type="submit" name="Sign Up" value="Sign Up">
</form><br>
</form>
<form action="for_my_password.php">
<input type="submit" name="Forgotten your Password?"value="Forgotten your Password?">
</form>
</center>
<?php
$connect=mysql_connect("localhost","iitkanpur","iitk");
if(!$connect)
{
  die("Failed to connect: " . mysql_error());
}
if(!mysql_select_db("database")){
die("Failed to select DB:" .mysql_error());
}
$results=mysql_query("SELECT * FROM login_table");  
$check=0;
while($row=mysql_fetch_array($results))
{
if(strcmp($row["userid"],$userid)==0)
{
  if(strcmp($row["password"],$password)==0){
    echo "Hello User";
  }
  else{
    echo "Wrong password";
  }
  $check=1;
  break;
}
}
if($check==0)
{echo "Unknown User";
}
?>
</body>
</html>
