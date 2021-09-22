<?php include "includes/header.php"; ?> 
<?php include "includes/navigation.php"; ?>
    <!-- Navigation -->
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
<?php 
$query="SELECT * FROM posts WHERE post_status='published' ";
$result = mysqli_query($connection,$query);
if(!$result){
    die ("Query Failed");
}
$count=0;
while($row=mysqli_fetch_assoc($result)){
    $count++;
    $post_id=$row['post_id'];
    $post_category_id=$row['post_category_id'];
    $post_title=$row['post_title'];
    $post_author=$row['post_author'];
    $post_date=$row['post_date'];
    $post_image=$row['post_image'];
    $post_content=$row['post_content'];
    $post_tags=$row['post_tags'];
    $post_comment_count=$row['post_comment_count'];
    $post_status=$row['post_status'];
?>
                
<!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August <?php echo $post_date; ?> at 10:00 PM</p>
                <hr>
                <a href="post.php?post_id=<?php echo $post_id ?>;">
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="" width="50%">
                </a>
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
    <?php 
}
    if($count==0){
    echo "<h1>NO POSTS SORRY</h1>";
}
?>

               
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

<?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
<?php include "includes/footer.php"; ?>