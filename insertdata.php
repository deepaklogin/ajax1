<?php

  $name=$_POST['mname'];
  $price=$_POST['mprice'];
  if(!empty($name)&&!empty($price))
  {
  $conn=mysqli_connect("localhost","root","","project") or die("connection failed");
  $sql="insert into project(mobile_name,price) values('{$name}','{$price}')";
  $q=mysqli_query($conn,$sql) ;
  if($q)
  {
    echo 1;
  }
  else {
    echo 0;
  }
}
else {
  echo 0;
}


 ?>
