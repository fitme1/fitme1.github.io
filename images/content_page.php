<?php include('connection.php') ?>
<!--start code product details -->
<?php
$norow='';
$sprice=0;
$eprice=100000;
$custom_size='';
$typeoff='';
$typefull='';
$typeplain='';
$typechecked='';

if (isset($_POST['apply'])) {
    if (isset($_POST['fullhand'])) { $typefull=$_POST['fullhand']; }
    if (isset($_POST['offhand'])) { $typeoff=$_POST['offhand']; }
    if (isset($_POST['plain'])) { $typeplain=$_POST['plain']; }
    if (isset($_POST['checked'])) { $typechecked=$_POST['checked']; }
    if (isset($_POST['sprice'])) { $sprice=$_POST['sprice']; }
    if (isset($_POST['eprice'])) { $eprice=$_POST['eprice']; }
    if (isset($_POST['custom_size'])) { $custom_size=$_POST['custom_size']; }
    
	//$filter="SELECT DISTINCT p_detail.p_id,p_detail.p_name,p_detail.p_price,p_detail.p_type,p_fimg.p_image FROM p_detail,p_fimg WHERE p_detail.p_id=p_fimg.p_id  and p_detail.p_price >= $sprice and p_detail.p_price<= $eprice and p_detail.p_type like '$typefull%' and p_detail.p_type like '$typeoff%' and p_detail.p_type like '$typeplain%' and p_detail.p_type like '$typechecked%' ";

     $filter="SELECT DISTINCT p_detail.p_id,p_detail.p_name,p_detail.p_price,p_detail.p_type,p_size.p_size,p_fimg.p_image FROM p_detail,p_size,p_fimg WHERE p_detail.p_id=p_size.id AND p_size.p_size LIKE '$custom_size%' AND p_fimg.p_id=p_detail.p_id 
 ";

	$res=mysqli_query($con,$filter);
	$result=mysqli_num_rows($res);
	
	/* 
	while ($row=mysqli_fetch_assoc($res)) {
	  $p_image=$row['p_fimg.p_image'];
	  $p_name=$row['p_detail.p_name'];
	  $p_type=$row['p_detail.p_type'];

	}
	*/
}
else
{
	$showall="SELECT DISTINCT p_detail.p_id,p_detail.p_name,p_detail.p_price,p_detail.p_type,p_fimg.p_image,p_offer.p_off FROM p_detail,p_fimg,p_offer WHERE p_detail.p_id=p_fimg.p_id AND p_detail.p_id=p_offer.p_id";
	$res=mysqli_query($con,$showall);

}


?>

<!--end code -->
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta charset="utf-8">

<head>
	<title>design</title>
</head>
<style type="text/css">
	
	@media only screen and (max-width: 768px){
	#row
	{ 
		width: 100%;
	}
	img
	{
		width: 100%;
	}
	
	}
 @media only screen and (min-width: 800px){
	#row
	{ 
		    margin-left: 10px;

	}
	img
	{
		width: 100%;
		height: 300px;
	}
	
	}
	 
	
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="fa.min.css">
  <link href="fas/css/fontawesome.css" rel="stylesheet">
  <link href="fas/css/brands.css" rel="stylesheet">
  <link href="fas/css/solid.css" rel="stylesheet">

<body>
	<table>
	<form method="post">
<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header" style="float: left;">
					<button name="back" type="button" onclick="window.location.href='#home'" style="background-color: transparent;border: none;"><i class="fa fa-chevron-left fa-lg" style="color: white; font-size: 40px; margin-top: 10px; background-color: transparent;border: none;"></i></button>
					<h3 style="float: right; margin-top: 13px;" class="text-primary">Shirt</h3>
				</div>
				<div class="navbar-header" style="float: right;">
					<button class="btn btn-primary " type="button" style="margin-right: 31px;margin-top: 8px;" name="choice" data-toggle="modal" data-target="#mymodal"><i class="fas fa-tshirt" ></i>  Your Choice</button>

				</div>
				
			</div>
		</nav>

<div class="container">
	<div id="offer" style="margin-top: 57px;height: 160px;width: 100%;">
		<img src="images/01.jpg" style="height: 150px;width: 125px;">
		<img src="images/01.jpg" style="height: 150px;width: 125px;">
	</div>
	<div class="row">
	<?php	
    if (isset($_POST['apply'])) {
    	# code...
	if ($result ==0) { 
	
		$norow='No Products for availble this filter'; ?>
		<h1 class="text-muted" style="margin-top: 80px;"><?php echo $norow; ?></h1>
        <a href="content_page.php" class="text-info">Clear All Filter</a>
		 <?php

	}
}?>
		
		<?php 
		while ($row=mysqli_fetch_assoc($res)) { ?>	
		
		<div class="col-md-3 well" id="row" onclick="location.href='show_product.php?id=<?php echo $row["p_id"]; ?>' "  style="cursor: pointer;">
			<img src="data:image/jpeg;base64,<?php echo $row['p_image'];?>">
             <div class="row">
			<div class="col-md-6 float-left"  style="width: 66%; float: left; " >
			     <h3 class="text-info float-left"><?php echo $row['p_name']; ?></h3>
                  <h4><?php echo $row['p_type']; ?></h4>

			 </div>
		   <div class="col-md-6 float-left" style="width: 33%;float: right;margin-top: 15px;"><h4 class="text-primary float-left"><i class="fas fa-inr"></i><?php echo $row['p_price']; ?></h4>
            <h5 id="ptype" class="text-info">offer <?php echo $row['p_off']; ?>%</h5>
		   </div>
			</div>
		</div>
	<?php } ?>
	</div>
	
</div>

<div class="modal fade" id="mymodal" role="dialog">
	<div class="modal-dialog-sm">
		<div class="modal-content">
			<div class="modal-header btn-primary">
				<button type="button" class="close" data-dismiss="modal"><i class="fas fa-times fa-lg btn-danger" style="color: white"></i></button>
				<h4 class="modal-title">Your Choice</h4>
			</div>
			<div class="modal-body">
				<div class="row well">
				<label class="header text-primary">Price</label><br>
				<input type="text" class="form-control" name="sprice" placeholder="Starting Price" value="0"><br>
				<input type="text" class="form-control" name="eprice" placeholder="Ending Price" value="1000000"><br>
				</div>
				<div class="row well">
					<label class="text-primary">Size</label><br>
					<input type="text" class="form-control" name="custom_size" placeholder="CUSTOM SIZE(Enter the size)"><br>
				</div>
				<div class="row well">
					<label class="text-primary">Type</label><br>
					<label for="fhand"><input type="checkbox" name="fullhand" value="fullhand">Full-Hand</label><br>
					<label for="fhand"><input type="checkbox" name="offhand" value="offhand">OFF-Hand</label><br>
					<label for="fhand"><input type="checkbox" name="plain" value="plain">Plain</label><br>
					<label for="fhand"><input type="checkbox" name="checked" value="Checked">Checked</label><br>


				</div>
				

			</div>
			<div class="modal-footer fixed-bottom">
			
				<button type="submit" class="btn btn-primary btn-block" style="float: left; " name="apply">Apply</button>
			</div>

		</div>
	</div>
	
</div>


</form>
</table>
</body>
</html>