<?php

  $conn=mysqli_connect("localhost","root","","project",) or die("connection failed");

  $sql="select * from project";
  $result=mysqli_query($conn,$sql);
  $update="";
  if(mysqli_num_rows($result)>0)
  {
      $update="<table><tr><td>id</td><td>mobile name</td><td>price</td><td>
      Delete
      </td></tr>";
      while($row=mysqli_fetch_assoc($result))
      {
        $update.="<tr><td>{$row["id"]}</td><td>
        {$row['mobile_name']}
        </td><td>
        {$row['price']}
        </td><td>
        <button class='btn btn-primary edit-data' data-eid='{$row["id"]}'>Edit </button>
        <button class='btn btn-danger delete-data' data-id='{$row["id"]}'>Delete</button>
        </td></tr>";
      }
      echo "</table>";
  }

echo $update;
 ?>
