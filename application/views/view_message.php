<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CodeIgniter</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
  <br><br><br><br><br><br>
   <div class="container">

   	<table class="table table-striped">
   		<thead>
   			<th>Name</th>
   			<th>Email</th>
   			<th>Mobile</th>
   		</thead>

   		<tbody>
   			<?php  if($datas)
   		{	
   			foreach ($datas as $value) {
   					
   			?>
   			
   		<tr>
   			<td><?php  echo $value['name'];  ?></td>
   			<td><?php   echo $value['email'];  ?></td>
   			<td><?php   echo $value['phone'];  ?></td>
   		</tr>
          <?php    } }?>
   		</tbody>
   	</table>
   <a href="<?php  echo base_url(); ?>Welcome/index">
    <button style="margin-left:510px; margin-top:13px;" class="btn btn-primary">Back</button>
  </a>
   </div>
          
</body>
</html>