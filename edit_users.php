<?php 
if(isset($_GET['user_id'])){
$user_id=$_GET['user_id'];

$query="SELECT * FROM users WHERE user_id=$user_id";
$result = mysqli_query($connection,$query);
if(!$result){
  die("Connection Failed".mysqli_error($connection));
}
while($row=mysqli_fetch_assoc($result)){
  $user_id=$row['user_id'];
  $username=$row['username'];
  $user_password=$row['user_password'];
  $user_firstname=$row['user_firstname'];
  $user_lastname=$row['user_lastname'];
  $user_role=$row['user_role'];
  $user_email=$row['user_email'];


}
}

if(isset($_POST['edit_user'])){
$user_id=$_GET['user_id'];
$username=$_POST['username'];
$user_password=$_POST['user_password'];
$user_firstname=$_POST['user_firstname'];
$user_lastname=$_POST['user_lastname'];
$user_role=$_POST['user_role'];
$user_email=$_POST['user_email'];

$query="SELECT randSalt FROM users";
      $result=mysqli_query($connection,$query);
      if(!$result){
          die('Connection Failed'.mysqli_error($connection));
      }
      while($row=mysqli_fetch_assoc($result)){
          $salt=$row['randSalt'];
      }
$password=crypt($user_password,$salt);

$query1="UPDATE users SET username='$username', user_password='$password', user_firstname='$user_firstname', user_lastname='$user_lastname', user_role='$user_role', user_email='$user_email' WHERE user_id=$user_id ";

$result1 = mysqli_query($connection,$query1);
if(!$result1){
  die("Connection Failed".mysqli_error($connection));
}

}
?>

<form action="" method="post" enctype="multipart/form-data">
  <!-- <div class="form-group">
    <label for="title">ID</label>
    <input type="text" class="form-control" name="user_id">
</div> -->
<div class="form-group">
    <label for="title">Username</label>
    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
</div>
<div class="form-group">
    <label for="title">Password</label>
    <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
</div>
<div class="user_firstname">
    <label for="title">Firstname</label>
    <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
</div>
<div class="form-group">
    <label for="title">Lastname</label>
    <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
</div>

<div class="form-group">
    <select name="user_role">
      <option value="subscriber"> <?php echo $user_role; ?> </option>
      if($user_role=='admin'){
        <option value="subscriber">subscriber</option>
      }
      else{
        <option value="admin">admin</option> 
      }
      
    </select>
</div>
<div class="form-group">
    <label for="title">Email</label>
    <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ; ?>">
</div>

<div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
</div>
</form>