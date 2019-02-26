<!DOCTYPE html>
<html lang="en">
<head>
  <title>Codeigniter</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <center><b  class="text-primary"><h2>Insert Multiple Image Into Database</h2></b></center><br>
  <form method="post" enctype="multipart/form-data" action="<?php  echo base_url();   ?>multipleimageController/index">

    <div class="form-group">
      <label>Image:</label>
      <input type="file" multiple class="form-control" name="files[]">
    </div>

    <div class="form-group">
      <div class="offset-md-3 col-md-9">
      <input type="submit" class="btn btn-primary" name="submit" value="Submit" >
      </div>
    </div>

  </form>
</div>

</body>
</html>