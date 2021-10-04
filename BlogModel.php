<?php 
class BlogModel extends CI_Model{
public function getAllBlogs()
{
  $data['articles']=array(
  array("title"=>"my first title1 is here1"),
  array("title"=>"my second title2 is here2"),
  array("title"=>"my third title3 is here3")
  );
  return $data;
}
}
?> 