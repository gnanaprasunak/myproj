
<table class="table table-bordered table-hover">
                         <thead>
                           <tr>
                             <th>ID</th>
                             <th>Author</th>
                             <th>Comment</th>
                             <th>Email</th>
                             <th>Status</th>
                             <th>In Response to</th>
                             <th>Date</th>
                             <th>Approve</th>
                             <th>Unapprove</th>
                             <th>Delete</th>
                             
                           </tr>
                         </thead>
                       <tbody>
                         <?php 
                       $query="SELECT * FROM comments";
                       $result=mysqli_query($connection,$query);
                       if(!$result){
                         die("Connection Failed".mysqli_error($connection));
                       }
                       while($row=mysqli_fetch_assoc($result)){
                         $comment_id=$row['comment_id'];
                         $comment_post_id=$row['comment_post_id'];
                         $comment_author=$row['comment_author'];
                         $comment_email=$row['comment_email'];
                         $comment_content=$row['comment_content'];
                         $comment_status=$row['comment_status'];
                         $comment_date=$row['comment_date'];
                
                        
                          echo "<tr>";
                          echo "<td>$comment_id</td>";
                          echo "<td>$comment_author</td>";
                          echo "<td>$comment_content</td>";
                          echo "<td>$comment_email</td>";
                          echo "<td>$comment_status</td>";
                        $query1="SELECT * FROM posts WHERE post_id=$comment_post_id";
                        $result1=mysqli_query($connection,$query1);
                        if(!$result1){
                          die("Connection Failed".mysqli_error($connection));
                        }
                        while($row1=mysqli_fetch_assoc($result1)){
                          $post_title=$row1['post_title'];
                          echo "<td><a href='../post.php?post_id=$comment_post_id'>$post_title</a></td>";
                        }
                          echo "<td>$comment_date</td>";
                          echo "<td><a href='comments.php?approve={$comment_id}'>Approve</td>";
                          echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</td>";
                          echo "<td><a href='comments.php?delete={$comment_id}'>Delete</td>";
                          echo "</tr>";
                       } 
                
                        ?>
                       </tbody>
                         </table>
                         <?php 
                         deleteComments();
                         ?> 
                         <?php 
                          ApproveComments();
                         ?> 
                         <?php 
                         UnapproveComments();
                         ?> 
                         