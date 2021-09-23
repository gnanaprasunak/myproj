<?php include_once "../includes/db.php" ?>
<?php session_start(); ?>
<?php
if(isset($_POST['login'])){
$username=$_POST['username'];
$password=$_POST['password'];
$username=mysqli_real_escape_string($connection,$username);
$password=mysqli_real_escape_string($connection,$password);
$query="SELECT * FROM users WHERE username='$username'";
$result=mysqli_query($connection,$query);
if(!$result){
  die ("Connection Failed".mysqli_error($connection));
}
$flag = 0;
while($row=mysqli_fetch_assoc($result)){
$user_id=$row['user_id'];
$db_username=$row['username'];
$user_password=$row['user_password'];
$user_firstname=$row['user_firstname'];
$user_lastname=$row['user_lastname'];
$user_role=$row['user_role'];
$user_email=$row['user_email'];

$password=crypt($password,$user_password);

if($username==$db_username && $password==$user_password){
  $flag=1;
  $_SESSION['username']=$db_username;
  $_SESSION['firstname']=$user_firstname;
  $_SESSION['lastname']=$user_lastname;
  $_SESSION['role']=$user_role;

  header('Location:../admin/index.php');
}

}
if($flag==0)
  header('Location:../index.php');
}

?>