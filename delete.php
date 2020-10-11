<?php

  $id=$_POST['id'];
  $conn=mysqli_connect("localhost","root","","project") or die("connection failed");
  $sql="delete  from project where id={$id}";
  $q=mysqli_query($conn,$sql);
  if($q)
  {
    echo 1;
  }
  else {
    echo 0;
  }

 ?>
