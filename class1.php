<?php 
class Employee{
  private $con;
  public function __construct()
  {
    $this->con=mysqli_connect("localhost","root","","ci1");
  }
  public function __destruct()
  {
    mysqli_close($this->con);
  }
  public function getAllEmployees()
  {
    $result=mysqli_query($this->con,"SELECT * FROM emp");
    $data=[];
    if(mysqli_num_rows($result)>0)
    {
      while($row=mysqli_fetch_assoc($result))
      {
        $data[]=$row;
      }
      return $data;
    }
    else
    {
      return $data;
    }
  }
  public function getMaxSalary()
  {
    $result=mysqli_query($this->con,"SELECT * FROM emp ORDER BY salary DESC LIMIT 1");
    if($row=mysqli_fetch_assoc($result))
    {
      return $row;
    }
  }
  public function getMinSalary()
  {
    $result=mysqli_query($this->con,"SELECT * FROM emp ORDER BY salary ASC LIMIT 1");
    if($row=mysqli_fetch_assoc($result))
    {
      return $row;
    }
  }
}

?>