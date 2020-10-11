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
</head>
<body>

<div class="container text-center mt-4">
  <button type="button" name="button" id="load-data" class="btn btn-primary">Load Data</button>
</div>
<div class="table" id="table">
<h1>Data Will display here</h1>
</div>
</body>
<script type="text/javascript">
  $(document).ready(function(){
    $('#load-data').on("click",function(e){
      $.ajax({
          url:"getdata.php",
          type:"POST",
          success:function(data)
          {
            $('#table').html(data);
          }
      });
    });
  });
</script>
</html>
