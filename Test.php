<?php 
class Test extends CI_Controller{
public function _remap($action)
{
if($action==="greeting")
{
  $this->greeting();
}
else if($action==="welcome")
{
  $this->welcome("prasuna",10);
}
else if($action==="index")
{
  $this->index();
}
else
{
  $this->defaultMethod();
}
}
public function welcome($name,$id)
{
echo "Welcome to kurnool"." ".$name." " .$id;
}
public function greeting()
{
  echo "Greetings to you";
}
public function index()
{
echo "This is a example method";
}
public function defaultMethod()
{
  echo "Sorry This method not available!!";
}
  
}

?>