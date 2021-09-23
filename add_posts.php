<?php 
if(isset($_POST['create_post'])){
$post_category_id=$_POST['post_category_id'];
$post_title=$_POST['post_title'];
$post_author=$_POST['post_author'];
$post_date=date('d-m-y');
$post_image=$_FILES['image']['name'];
$post_image_temp=$_FILES['image']['tmp_name'];
$post_tags=$_POST['post_tags'];
$post_comment_count=0;
$post_status=$_POST['post_status'];
$post_content=$_POST['post_content'];
move_uploaded_file($post_image_temp,"../images/$post_image");

$query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_tags,post_comment_count,post_status,post_content) VALUES($post_category_id,'$post_title','$post_author',$post_date,'$post_image','$post_tags',$post_comment_count,'$post_status','$post_content')";
$result = mysqli_query($connection,$query);
if(!$result){
  die("Connection Failed".mysqli_error($connection));
}
$post_id=mysqli_insert_id($connection);
echo "<p class='bg-success'>Record created <a href='../post.php?post_id=$post_id'>View Post</a> or <a href='posts.php'>Edit More Posts</a></p> ";
}
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="title">Post Category</label>
    <select name="post_category_id" class="form-control" id="post_category">
        <?php 
        $query="SELECT *FROM categories";
        $result=mysqli_query($connection,$query);
        if(!$result){
            die("Connection Failed".mysqli_error($connection));
        }
        while($row=mysqli_fetch_assoc($result)){
            $cat_id=$row['cat_id'];
            $cat_title=$row['cat_title'];
            echo "<option value='$cat_id'>$cat_title</option>";
        }
        

        ?>
    </select>
</div>
  <!-- <div class="form-group">
    <label for="title">Post Category</label>
    <input type="text" class="form-control" name="post_category_id">
</div> -->
<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="post_title">
</div>
<div class="form-group">
    <label for="title">Post Author</label>
    <input type="text" class="form-control" name="post_author">
</div>
<div class="form-group">
    <label for="title">Post Date</label>
    <input type="text" class="form-control" name="post_date">
</div>
<div class="form-group">
    <label for="title">Post Image</label>
    <input type="FILE" class="form-control" name="image">
</div>
<div class="form-group">
    <label for="title">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
</div>
<div class="form-group">
    <label for="title">Post Commentcount</label>
    <input type="text" class="form-control" name="post_comment_count">
</div>
<div class="form-group">
    <label for="title">Post Status</label>
    <select name="post_status">
        <option value="draft">Select Options</option>
        <option value="published">Published</option>
        <option value="draft">Draft</option>
            
        
    </select>
</div>
<!-- <div class="form-group">
    <label for="title">Post Status</label>
    <input type="text" class="form-control" name="post_status">
</div> -->
<div class="form-group">
    <label for="title">Post content</label>
    <textarea class="form-control" name="post_content" id="" rows="10" cols="30"></textarea>
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
</div>
</form>