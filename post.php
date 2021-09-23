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
                $query="SELECT * FROM posts WHERE post_id=$post_id";
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
     
                

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

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
                <?php 
                }       
            ?>     

                <!-- Post Content -->
                
                <p><?php echo $post_content; ?></p>
                <hr>

           
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
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="Author">Author</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                        <label for="Comment">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment" >Create Comment</button>
                    </form>
                </div>

                <hr>
                

                <!-- Posted Comments -->
<?php 
$query="SELECT * FROM comments WHERE comment_post_id=$post_id AND comment_status='approved' ORDER BY comment_id DESC";
$result=mysqli_query($connection,$query);
if(!$result){
    die("connection failed".mysqli_error($connection));
}
while($row=mysqli_fetch_assoc($result)){
    $comment_date=$row['comment_date'];
    $comment_content=$row['comment_content'];
    $comment_author=$row['comment_author'];
?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_date; ?>
                            <small><?php echo $comment_content; ?></small>
                        </h4>
                        <?php echo $comment_author; ?>
                    </div>
                </div>
                <?php 
                 }
                ?>

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