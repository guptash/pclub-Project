<?php
$connect=mysql_connect("localhost","iitkanpur","iitk");
if(!$connect)
{
  die("Failed to connect: " . mysql_error());
}
$userid='ryan';
$password='abc';
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
