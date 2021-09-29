<?php 
include "class1.php"; 
$obj=new Employee;
$empList=$obj->getAllEmployees();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LIST OF ALL EMPLOYEES</title>
</head>
<body>
  <h1>LIST OF ALL EMPLOYEES</h1>
  <?php if(count($empList)>0) 
  {
  ?>
  <table>
    <tr>
      <th>ID</th>
      <th>NAME</th>  
      <th>SALARY</th>
      <th>CITY</th>
    </tr>
    <?php
    foreach($empList as $emp)
    {
    ?>
    <tr>
      <td><?php echo $emp['id']; ?></td>
      <td><?php echo $emp['name']; ?></td>
      <td><?php echo $emp['salary']; ?></td>
      <td><?php echo $emp['city']; ?></td>
    </tr>
    <?php 
    }
    ?>
  </table>
  <?php 
}
?>
 
  
  
</body>
</html>