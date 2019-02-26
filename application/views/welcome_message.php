<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CodeIgniter</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<center><b>Insert And Update And Delete Demo</b></center>
	<a href="<?php  echo base_url(); ?>Add">
		<button style="margin-left:60px; margin-top:30px;" class="btn btn-primary">Add New</button>
	</a><br><br>
  
                   <?php 
                   $message = $this->session->flashdata('addcategory_success');
                   if(!empty($message)) { ?>
                      <div class="alert alert-success alert-dismissible">
                        <a href="#" style="text-decoration: none;" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo '<strong>Success! </strong> '.$message; 
                        ?>
                      </div>
                <?php } ?>


                 <?php 
                   $message = $this->session->flashdata('editcategory_success');
                   if(!empty($message)) { ?>
                      <div class="alert alert-success alert-dismissible">
                        <a href="#" style="text-decoration: none;" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo '<strong>Success! </strong> '.$message; 
                        ?>
                      </div>
                <?php } ?>

                <?php 
                   $message = $this->session->flashdata('editcategory_error');
                   if(!empty($message)) { ?>
                      <div class="alert alert-success alert-dismissible">
                        <a href="#" style="text-decoration: none;" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo '<strong>Error! </strong> '.$message; 
                        ?>
                      </div>
                <?php } ?>


                  <?php 
                   $message = $this->session->flashdata('deletecategory_success');
                   if(!empty($message)) { ?>
                      <div class="alert alert-success alert-dismissible">
                        <a href="#" style="text-decoration: none;" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo '<strong>Success! </strong> '.$message; 
                        ?>
                      </div>
                <?php } ?>

<form method="post">
   <div class="container">

   	<table class="table table-striped">
   		<thead>
   			<th>Sl No.</th>
   			<th>Name</th>
   			<th>Email</th>
   			<th>Image</th>
   			<th>Mobile</th>
        <th>Status</th>
   			<th>Action</th>
   		</thead>

   		<tbody>
   			<?php  if(!empty($datas))
   			{
          // echo "<pre>";
          // print_r($datas);
          // exit();
   				$counter=1;
   				foreach ($datas as $value) {
   					
   			?>
   			
   		<tr>
   			<!-- <td><?php echo  $counter;  ?></td> -->
        <td><?php  echo $value['id'];  ?></td>
   			<td><?php  echo $value['name'];  ?></td>
   			<td><?php   echo $value['email'];  ?></td>
   			<td><img class="img-thumbnail img-responsive" style="width:73px; height: 73px; border-radius: 50%;"  src="<?php echo  $value['image'];   ?>" /></td>
   			<td><?php   echo $value['phone'];  ?></td>
        <?php   if ($value['status'] == 1) {  ?>

          <td style="cursor: pointer;" class="changeUserStatus" data-userId="<?php echo $value['id'];?>" data-changedTo='0'><span class="btn btn-primary">Active</span></td>

        <?php  } else {  ?>

       <td style="cursor: pointer;" class="changeUserStatus" data-userId="<?php echo $value['id'];?>" data-changedTo='1'><span class="btn btn-danger">Deactive</span></td>
        <?php  }  ?>
   			<td><a href="<?php   echo base_url();  ?>Update/<?php  echo $value['id'];  ?>"><i style="color:orange;" class="fa fa-edit"></i></a>&nbsp;

   			<a href="<?php   echo base_url();  ?>InsertController/delete/<?php  echo $value['id'];  ?>"><i style="color:red;" class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;

   		<a href="<?php   echo base_url();  ?>View/<?php  echo $value['id'];  ?>"><i style="color:blue;" class="fa fa-eye" aria-hidden="true"></i></a></td>
   		</tr>
          <?php $counter++; }
          
                     } ?>
   		</tbody>
   	</table>
   	<?php  echo $this->pagination->create_links();  ?>

    
   </div>
</form>
<script>
$(document.body).on("click",".changeUserStatus",function(event) {
    var userId = $(this).attr('data-userId');
    var changeStatusTo = $(this).attr('data-changedTo');
    var current = $(this);
    $.ajax({
        url:"<?php echo base_url('Welcome/changeStatus'); ?>",
        method: "POST",
        data: {
                userId          : userId,
                changeStatusTo  : changeStatusTo
        },
        success: function(response) {
            if(response == 'success') {
                if(changeStatusTo == '1'){
                    current.attr('data-changedTo','0');
                    current.html('<span class=" btn btn-primary">Active</span>');
                }else{
                    current.attr('data-changedTo','1');
                    current.html('<span class="btn btn-danger">Deactive</span>');
                }
            }
            
        }
    });
});
</script>
</body>
</html>