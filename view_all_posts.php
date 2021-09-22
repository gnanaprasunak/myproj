<?php 
if(isset($_POST['checkBoxArray'])){
  $checkBoxArray=$_POST['checkBoxArray'];
  $bulkoption=$_POST['bulkoptions'];
  // $query="";
  foreach($checkBoxArray as $post_id){
    switch($bulkoption){
      case 'published':
        $query="UPDATE posts SET post_status='published' WHERE post_id=$post_id";
        break;
      // case 'draft':
      //     $query="UPDATE posts SET post_status='draft' WHERE post_id=$post_id";
      //     break;
      case 'delete':
          $query="DELETE FROM posts WHERE post_id=$post_id";
          break;
      }
      $result=mysqli_query($connection,$query);
        if(!$result){
            die("Connection Failed".mysqli_error($connection));
        }
    
  }
   
  }




?>


<form action="" method="post">
<table class="table table-bordered table-hover">
  <div id="bulkOptionContainer" class="col-xs-4">
    <select class="form-control" name="bulkoptions">
      <option value="">Select Option</option>
      <option value="published">Publish</option>
      <!-- <option value="darft">Draft</option> -->
      <option value="delete">Delete</option>
    </select>
  </div>
  <div class="col-xs-4">
    <input type="submit" name="submit" class="btn btn-success" value="Apply">
    <a class="btn btn-primary" href="posts.php?source=add_posts">Add New </a>
  </div>
                         <thead>
                           <tr>
                             <th><input type="checkbox" id="selectAllBoxes"></th>
                             <th>ID</th>
                             <th>Category</th>
                             <th>Title</th>
                             <th>Author</th>
                             <th>Date</th>
                             <th>Image</th>
                             <th>Tags</th>
                             <th>Comments</th>
                             <th>Status</th>
                             <th>Action</th>
                             <th>Action</th>

                           </tr>
                         </thead>
                       <tbody>
                       </form>
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
                        
                          echo "<tr>";
                          echo "<td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='$post_id'></td>";
                          echo "<td>$post_id</td>";
                          echo "<td>$post_category_id</td>";
                          echo "<td>$post_title</td>";
                          echo "<td>$post_author</td>";
                          echo "<td>$post_date</td>";
                          echo "<td><img src='../images/$post_image' alt='image' width='100' height='100'></td>";
                          echo "<td>$post_tags</td>";
                          echo "<td>$post_comment_count</td>";
                          echo "<td>$post_status</td>";
                          echo "<td><a href='posts.php?source=edit_post&post_id={$post_id}'>EDIT</td>";
                          echo "<td><a href='posts.php?delete={$post_id}'>DELETE</td>";
                          echo "</tr>";
                       } 
                
                        ?>
                       </tbody>
                         </table>
                         <?php 
                         deletePosts();
                         ?>
                         
                         