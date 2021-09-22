<?php 
                       $query="SELECT * FROM posts";
                       $result=mysqli_query($connection,$query);
                       if(!$result){
                         die("Connection Failed".mysqli_error($connection));
                       }
                       while($row=mysqli_fetch_assoc($result)){
                         $post_id=$row['post_id'];
                         $post_category_id=$row['post_category_id'];
                         $post_title=$row['post_title'];
                         $post_author=$row['post_author'];
                         $post_date=$row['post_date'];
                         $post_image=$row['post_image'];
                         $post_tags=$row['post_tags'];
                         $post_comment_count=$row['post_comment_count'];
                         $post_status=$row['post_status'];
                         $post_content=$row['post_content'];
                        
                       }
                       if(isset($_POST['update_post'])){
                        $post_category_id=$_POST['post_category'];
                        $post_title=$_POST['post_title'];
                        $post_author=$_POST['post_author'];
                        $post_date=date('d-m-y');
                        $post_image=$_FILES['image']['name'];
                        $post_image_temp=$_FILES['image']['tmp_name'];
                        $post_tags=$_POST['post_tags'];
                        $post_comment_count=4;
                        $post_status=$_POST['post_status'];
                        $post_content=$_POST['post_content'];
                        move_uploaded_file($post_image_temp,"../images/$post_image");  

                        if(empty($post_image)){
                            $query="SELECT * FROM posts WHERE post_id=$post_id";
                            $result=mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($result)){
                                $post_image=$row['post_image'];
                            }
                        }

                        $query="UPDATE posts SET post_category_id=$post_category_id,post_title='$post_title',post_author='$post_author',post_date=$post_date,post_image='$post_image',post_tags='$post_tags',post_comment_count=$post_comment_count,post_status='$post_status',post_content='$post_content' WHERE post_id=$post_id";
                        $result=mysqli_query($connection,$query);
                        if(!$result){
                            die("connection failed".mysqli_error($connection));
                        }
                        echo "<p class='bg-success'>Record Updated <a href='../post.php?post_id=$post_id'>View Post</a> or <a href='posts.php'>Edit More Posts</a></p> ";
                        }
                       
                    
?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Post Category</label>
    <select name="post_category" class="form-control" id="post_category">
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
<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="post_title" value=<?php echo "$post_title"; ?>>
</div>
<div class="form-group">
    <label for="title">Post Author</label>
    <input type="text" class="form-control" name="post_author" value=<?php echo "$post_author"; ?>>
</div>
<div class="form-group">
    <label for="title">Post Date</label>
    <input type="text" class="form-control" name="post_date" value=<?php echo "$post_date"; ?>>
</div>
<div class="form-group">
    <label for="title">Post Image</label>
    <img width="100" src="../images/<?php echo $post_image; ?>">
    <input type="FILE" class="form-control" name="image" value=<?php echo "$post_image"; ?>>
</div>
<div class="form-group">
    <label for="title">Post Tags</label>
    <input type="text" class="form-control" name="post_tags" value=<?php echo "$post_tags"; ?>>
</div>
<div class="form-group">
    <label for="title">Post Commentcount</label>
    <input type="text" class="form-control" name="post_comment_count" value=<?php echo "$post_comment_count"; ?>>
</div>
<div class="form-group">
    <label for="title">Post Status</label>
    <select name="post_status">
        <option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>
            if($post_status=='published'){
                echo "<option value='draft'>Draft</option>";
                
            }
            else
            echo "<option value='published'>Published</option>";
        
    </select>
    <!--<input type="text" class="form-control" name="post_status" value=<?php echo "$post_status"; ?>>-->
</div>
<div class="form-group">
    <label for="title">Post Content</label>
    <textarea type="text" class="form-control" name="post_content" width="30" height="10"><?php echo "$post_content"; ?></textarea>
    
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_post" value="update_Post">
</div>
</form>

