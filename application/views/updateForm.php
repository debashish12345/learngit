<!DOCTYPE html>
<html lang="en">
<head>
  <style type="text/css">
  .mybutt
  {
    margin-left: 500px !important;
  }
</style>
  <title>Codeigniter</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
  <center><b  class="text-primary">Update Form Data Into Database</b></center><br>
<?php   if($datas)
{
  // echo  "<pre>";
  // print_r($datas);
  // exit();
 ?>
  <form method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" value="<?php echo  $datas[0]['name'];   ?>" id="email" placeholder="Enter Your Name" name="name">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" value="<?php echo  $datas[0]['email'];   ?>" class="form-control" id="email" placeholder="Enter Your email" name="email">
    </div>


    <div class="form-group">
      <label for="email">Phone:</label>
      <input type="number" value="<?php echo  $datas[0]['phone'];   ?>" class="form-control" id="email" placeholder="Enter Your Phone Number" name="phone">
    </div>

    
      <div class="form-group">
      <label>Image:</label>
      <input type="file" class="form-control" name="image" onchange="readURL(this);">
      <img src="<?php   echo  $datas[0]['image'];?>" style="width:100px; height:110px; margin-top:20px;" id="imagePreview" />
    
    </div>

    <div class="form-group">
                    <div class="offset-md-3 col-md-9">
                        <input type="submit" style="margin-left:400px; margin-bottom:-47px;  " class="btn btn-primary" name="submit" value="Submit" >
                    </div>
                </div>

  </form>
<a href="<?php  echo base_url(); ?>Welcome/index">
<button class="mybutt btn btn-primary">Back</button></a>
            <?php   } ?>

</div>

<script>
     function readURL(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

</body>
</html>