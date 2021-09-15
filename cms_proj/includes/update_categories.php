<form action="" method="post">
    <div class="form-group">
     <label for="cat-title">Edit Category</label> 
        
    </div> 
    <?php 
    //GET CATEGORY NAME
    if(isset($_GET['update'])){
      $cat_id=$_GET['update'];
      $query1="SELECT * FROM categories WHERE cat_id=$cat_id";
      $result1=mysqli_query($connection,$query1);
      if(!$result1){
        die("Connection Failed".mysqli_error($connection));
      }
      while($row=mysqli_fetch_assoc($result1)){
        
        $cat_title=$row['cat_title'];
     
    ?>
    <input type="text" class="form-control" name="cat_title" value=<?php echo $cat_title; ?>> 
    <?php 
      }
     }
    ?>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" name="update_category" value="update_category">   
    </div>  
</form>
<?php 
//UPDATE CATEGORY
if(isset($_POST['update_category'])){
  $cat_id=$_GET['update'];
  $cat_title=$_POST['cat_title'];
  $query="UPDATE categories SET cat_title='{$cat_title}' WHERE cat_id = {$cat_id}";
  $result=mysqli_query($connection,$query);
  if(!$result){
    die("Query Failed".mysqli_error($connection));
  }
}
?>