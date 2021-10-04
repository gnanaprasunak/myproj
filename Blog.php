<?php 
class Blog extends CI_Controller
{
  public function index()
  {
  $this->load->model("BlogModel");
  $blogs['articles']=$this->BlogModel->getAllBlogs();
  $this->load->view("Blog_view",$blogs);
  }
}
?>