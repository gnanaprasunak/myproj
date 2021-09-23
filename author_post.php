<!DOCTYPE html>
<html lang="en">
<?php include "includes/header.php"; ?>
<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">

<div class="row">

    <!-- Blog Post Content Column -->
    <div class="col-lg-8">


<?php 
                if(isset($_GET['post_id'])){
                $post_id=$_GET['post_id'];
                $post_author=$_GET['post_author'];
                $query="SELECT * FROM posts WHERE post_author='$post_author'";
                $result=mysqli_query($connection,$query);
                if(!$result){
                    die("CONNECTION FAILED".mysqli_error($connection));
                }
                while($row=mysqli_fetch_assoc($result)){
                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_content=$row['post_content'];
                    $post_image=$row['post_image'];
               
                ?>
     


   
                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post_title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">

                <hr>

                <!-- Post Content -->
                
                <p><?php echo $post_content; ?></p>
                <hr>
            <?php 
                }       
            ?>           
                    <!-- Blog Comments -->
                <?php 
                if(isset($_POST['create_comment'])){
                    $post_id=$_GET['post_id'];
                    $comment_author=$_POST['comment_author'];
                    $comment_email=$_POST['comment_email'];
                    $comment_content=$_POST['comment_content'];
                    if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content))
                    {
                    $query="INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES ($post_id,'$comment_author','$comment_email','$comment_content','unapproved',now())";
                    $result=mysqli_query($connection,$query);
                    if(!$result){
                        die("Connection Failed".mysqli_error($connection));
                    }
                    $query="UPDATE posts SET post_comment_count=post_comment_count + 1 WHERE post_id=$post_id";
                    $result=mysqli_query($connection,$query);
                    if(!$result){
                        die("Connection Failed".mysqli_error($connection));
                    }

                    }
                    else 
                    echo "<script>alert('Fields Cannot empty')</script>";

                }
                ?>

                <!-- Comments Form -->
                
                <!-- Posted Comments -->

                
                <?php 
                 }
                ?>

            
               

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php"; ?>