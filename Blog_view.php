<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>ARTICLES</h1>
  <?php 
  if(count($articles)>0)
  {
  ?>
 
    <?php foreach($articles as $art)
    {
     echo "<pre>";
     print_r($articles);
    } 
    ?>
  
  <?php
  }
  else
  {
    echo "no records found";
  }
  ?>
</body>
</html>