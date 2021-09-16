<?php ob_start(); ?>
<?php include "../includes/admin_header.php"; ?>
    <div id="wrapper">
<?php include "../includes/admin_navigation.php"; ?>


        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                     
<?php
if(isset($_GET['source']))
    $source=$_GET['source'];
else
    $source='';
switch($source){
  case 'add_posts' :
    include "../includes/add_posts.php"; 
    break;
  case 'edit_posts' : 
    include "../includes/edit_posts.php"; 
    break;
  case '300' : echo "300"; break;

  default:
    include "../includes/view_all_comments.php";
 }
?>
                      
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
<?php include "../includes/admin_footer.php"; ?>
