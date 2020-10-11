<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ajax tutorial</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style >
     #model{
      text-align: center;
      margin-left: 300px;
    }
      </style>
</head>
<body>

<div class="container text-center mt-4">
  <form id="form">

  <input type="text" class="form-control" id="name" name="" value=""><br />
  <input type="text" class="form-control" name=""  id="price" value="">
  <br />  <!-- <button type="button" name="button" id="load-data" class="btn btn-primary">insert Data</button> -->
  <div class="" id="er"></div>
  <div class="" id="su"></div>
  <input type="submit" class="btn btn-primary" id="load-data" name="" value="Insert data">
</form>

</div>
<div id="model" class="col-md-6 mx-auto" style="display:none; height:300px">
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class=" btn btn-danger" id="closem">&times;</button>
      </div>
      <div class="show" id="show">
      </div>
      <input type="submit" name="" value="Update Value" class="btn btn-success" id="edit-submit">
</div><br />
<div class="col-md-6 mx-auto">
  <table id="table" class="table table-stripped">
  </table>
</div>
</body>


<script type="text/javascript">
  $(document).ready(function(){
    function loaddata(){
      $.ajax({
          url:"getdata.php",
          type:"POST",
          success:function(data)
          {
            $('#table').html(data);
          }
      });
    }
    loaddata();

    $("#load-data").on("click",function(e){
      e.preventDefault();
      // console.log("click");
      var name=$("#name").val();
      var price=$("#price").val();
      if(name==""||price=="")
      {
        $("#er").html("All field are requireds").slideDown('slow');
        $("#su").slideUp();
      }
      else {
      $.ajax({
        url:"insertdata.php",
        type:"POST",
        data:{mname:name,mprice:price},
        success:function(data){
          if(data==1)
          {
            loaddata();
            $("#form").trigger("reset");
            $("#su").html("Data Inserted Successfully").slideDown('slow');
            $("#er").slideUp();
          }
          else {
            $("#er").html("Can't save records").slideDown('slow');
            $("#su").slideUp();
          }
        }
      });
    }
  });

    $(document).on("click",".delete-data",function(){
      if(confirm("Do You Really Want To Delete This Records"))
      {
      var stdid=$(this).data("id");
      // alert(stdid);
      var element=this;
      $.ajax({
        url:"delete.php",
        type:"POST",
        data:{id:stdid},
        success:function(data)
        {
          if(data==1)
          {
            // alert("data deleted Successfully");
            $(element).closest('tr').fadeOut();
            loaddata();
          }
          else {
            alert("something is wrong");
          }
        }
      });
      }
    });

    $(document).on("click",".edit-data",function(){
      $("#model").show();
      // if(confirm("Do You Really Want To Delete This Records"))
      // {
      var stdeid=$(this).data("eid");
      // alert(stdeid);
      // var element=this;
      $.ajax({
        url:"update.php",
        type:"POST",
        data:{id:stdeid},
        success:function(data)
        {
          $("#show").html(data);
        }
      });
      // }
    });

    $("#closem").on("click",function(){
  $("#model").hide();
})
    $("#edit-submit").on("click",function(e){
      var n=$("#fname").val();
      var uid=$("#id").val();
      var p=$("#fprice").val();
      console.warn(n);
      console.warn(p);
      console.warn(uid);

      $.ajax({
        url:"updatedata.php",
        type:"POST",
        data:{n:n,p:p,id:uid},
        success:function(data)
        {
          if(data==1)
          {
            alert("data update successfully");
            loaddata();
          }
          else{
            alert("something is wrong");
          }
        }
      })
    })
  });
</script>
</html>
