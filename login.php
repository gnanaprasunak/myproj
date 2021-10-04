<?php 
class login extends CI_Controller
{
public function index()
{
  $this->load->view("login_view");
  if(isset($_POST['submit']))
  {
    $username=$_POST['username'];
    $email=$_POST['email'];
    $this->load->model("login_model");
    $this->login_model->save($username,$email);
  }
}
}


?>