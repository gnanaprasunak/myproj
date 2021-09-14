<?php 
function insert_categories(){
  //INSERT CATEGORY
  global $connection;
  if(isset($_POST['submit'])){
    $cat_title = $_POST['cat_title']; 
    if(empty($cat_title)){
      echo "This field should not be empty";
    }
    else{
    $query="INSERT INTO categories(cat_title) VALUES ('$cat_title')";
    $result=mysqli_query($connection,$query);
    if(!$result){
      die("Connection Failed");
    }
  }
}
}

function findAllCategories(){
  global $connection;
  //FIND ALL CATEGORIES
  $query="SELECT * FROM categories";
  $result=mysqli_query($connection,$query);
  if(!$result){
    die("Connection Failed".mysqli_error($connection));
  }
   
  while($row=mysqli_fetch_assoc($result)){
    $cat_id=$row['cat_id'];
    $cat_title=$row['cat_title'];
    echo "<tr>";
    echo "<td>$cat_id</td>";
    echo "<td>$cat_title</td>";
    echo "<td><a href='categories.php?update={$cat_id}'>EDIT</a></td>";
    echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
    echo "</tr>";
  }
}

function deleteCategories(){
  global $connection;
  //DELETE CATEGORY
  if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $query="DELETE FROM categories WHERE cat_id=$delete_id";
    $result=mysqli_query($connection,$query);
    if(!$result){
      die("Connection Failed".mysqli_error($connection));
    }
     header("Location:categories.php");
  }
}

function deletePosts(){
  global $connection;
  //DELETE POSTS
  if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $query="DELETE FROM posts WHERE post_id=$delete_id";
    $result=mysqli_query($connection,$query);
    if(!$result){
      die("Connection Failed".mysqli_error($connection));
    }
     header("Location:posts.php");
  }
}

function deleteComments(){
  global $connection;
  //DELETE COMMENTS
  if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $query="DELETE FROM comments WHERE comment_id=$delete_id";
    $result=mysqli_query($connection,$query);
    if(!$result){
      die("Connection Failed".mysqli_error($connection));
    }
     header("Location:comments.php");
  }
}

function ApproveComments(){
  global $connection;
  //DELETE COMMENTS
  if(isset($_GET['approve'])){
    $approve_comment_id=$_GET['approve'];
    $query="UPDATE comments SET comment_status='approved' WHERE comment_id=$approve_comment_id";
    $result=mysqli_query($connection,$query);
    if(!$result){
      die("Connection Failed".mysqli_error($connection));
    }
     header("Location:comments.php");
  }
}

function UnapproveComments(){
  global $connection;
  //DELETE COMMENTS
  if(isset($_GET['unapprove'])){
    $unapprove_comment_id=$_GET['unapprove'];
    $query="UPDATE comments SET comment_status='unapproved' WHERE comment_id=$unapprove_comment_id";
    $result=mysqli_query($connection,$query);
    if(!$result){
      die("Connection Failed".mysqli_error($connection));
    }
     header("Location:comments.php");
  }
}



?>



