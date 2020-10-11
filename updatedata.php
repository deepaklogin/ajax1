<?php

  $name=$_POST['n'];
  $price=$_POST['p'];
  $id=$_POST['id'];

  $conn=mysqli_connect("localhost","root","","project") or die("connection failed");
  $sql="update project set mobile_name='$name',price='$price' where id='$id'";
  $q=mysqli_query($conn,$sql) ;
  if($q)
  {
    echo 1;
  }
  else {
    echo 0;
  }



 ?>
