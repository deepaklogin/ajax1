<?php
  $id=$_POST["id"];
  $conn=mysqli_connect("localhost","root","","project") or die("connection failed");

  $sql="select * from project where id={$id}";
  $result=mysqli_query($conn,$sql);
  $update="";
  if(mysqli_num_rows($result)>0)
  {
      while($row=mysqli_fetch_assoc($result))
      {
        $update.="<input type='text'  value='{$row["mobile_name"]}' id='fname' class='form-control'><br />
        <input type='text'  value='{$row["id"]}' id='id' class='form-control' disabled style='display:none'><br />
          <input type='text' value='{$row["price"]}' id='fprice' class='form-control'><br />";
      }

  }

echo $update;
 ?>
