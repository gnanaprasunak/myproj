<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page_title; ?></title>
</head>
<body>
  <h1><?php echo $heading1; ?></h1>
  <!-- <?php 
  echo "<pre>";
  echo print_r($employee); 
  ?> -->
  <table>
    <tr>
     <th>ID</th>
     <th>Name</th>
     <th>Salary</th>
     <th>Email</th>
    </tr>
      <?php 
      foreach($employee as $emp)
      {
      ?>
       <tr>
      <td><?php echo $emp['id']; ?></td>
      <td><?php echo $emp['name']; ?></td>
      <td><?php echo $emp['salary']; ?></td>
      <td><?php echo $emp['email']; ?></td>
      </tr>
      <?php 
      }
    ?>
<!-- <tr>
  <td>1</td>
  <td>prasuna</td>
  <td>100</td>
  <td>prasu@gmail.com</td>
 </tr>
 <tr>
  <td>2</td>
  <td>siri</td>
  <td>200</td>
  <td>siri@gmail.com</td>
 </tr> -->
   
  </table>
</body>
</html>