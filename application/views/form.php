<!DOCTYPE html>
<html lang="en">
<head>
  <!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <title>Codeigniter</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <center><b  class="text-primary">Insert Form Data Into Database</b></center><br>
  <form method="post" enctype="multipart/form-data" action="<?php  echo base_url();   ?>InsertController/Insert">

    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Your Name" name="name">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Your email" name="email">
    </div>
   

   <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date">Date</label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
      </div>


    <div class="form-group">
      <label>Image:</label>
      <input type="file" class="form-control" name="image">
    </div>

    <div class="form-group">
      <label for="email">Phone:</label>
      <input type="number" class="form-control" id="email" placeholder="Enter Your Phone Number" name="phone">
    </div>

    <div class="form-group">
                    <div class="offset-md-3 col-md-9">
                        <input type="submit" name="submit" value="Submit" >
                    </div>
                </div>


  </form>
</div>

</body>
</html>


<script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>