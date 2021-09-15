
<table class="table table-bordered table-hover">
                         <thead>
                           <tr>
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
                         
                         