<?php 
class Base extends CI_Controller
{
  public function index()
  {
    $data['subjects']=["HTML","CSS","BOOTSTRAP","PHP","CODE IGNITER"];
    $data['page_title']="List";
    $this->load->view("sample",$data);
  }

}



?>