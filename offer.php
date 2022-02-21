<?php
session_start();
include("connection.php");

?>


<!DOCTYPE html>
<html>
<head>
	<title>add date </title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/font.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	 <style>
		ul li{}
		ul li a {color:white;padding:40px; }
		ul li a:hover {color:white;}
	 </style>
</head>
<body style="background-color: #f5f5f5">

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  
    <a class="navbar-brand" href="index.php"><span style="color:green;font-family: 'Permanent Marker', cursive;">Food Hunt</span></a>
    <?php
	if(!empty($id))
	{
	?>
	<a class="navbar-brand" style="color:black; text-decoration:none;"><i class="far fa-user"><?php if(isset($id)) { echo $vr['fld_name']; }?></i></a>
	<?php
	}
	?>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
	
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="food.php">Home
                
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>

          <li class="nav-item">
          <a class="nav-link" href="adddate.php">Add Date</a>
        </li>

          <li class="nav-item">
          <a class="nav-link" href="res.php">Reservations</a>
        </li>
           <li class="nav-item">
          <a class="nav-link" href="offer.php">Add Offer</a>
        </li>

           <li class="nav-item">
          <a class="nav-link" href="myoffer.php">My Offer</a>
        </li>


		<li class="nav-item">
		  <form method="post">
          <?php
			if(empty($_SESSION['id']))
			{
			?>
		   <button class="btn btn-outline-danger my-2 my-sm-0" name="login">Log In</button>&nbsp;&nbsp;&nbsp;
            <?php
			}
			else
			{
			?>
			
			<button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Log Out</button>&nbsp;&nbsp;&nbsp;
			<?php
			}
			?>
			</form>
        </li>
		
		
      </ul>
	  
    </div>
	
</nav>

<div style="height: 140px;"></div>
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="card" style="padding-right: 20px;">
				<div class="card-heading" style="padding-right: 20px;">
					<h3>add New offer</h3>

				</div>

				<div class="card-body" style="padding-right: 20px;">
				 <form action="offer.php" method="post" enctype="multipart/form-data">
                                     <div class="form-group"><!--food_name-->
                                     <label for="food_name">Food Name:</label>
                                            <input type="text" class="form-control" id="food_name"  placeholder="Enter Food Name" name="food_name" required>
                                     </div>
									 
									 
                                     <div class="form-group"><!--cost-->
                                            <label for="cost">old price :</label>
                                            <input type="number" class="form-control" id="cost"  placeholder="10000" name="cost" required>
                                     </div>

                                       <div class="form-group"><!--cost-->
                                            <label for="cost">new Price :</label>
                                            <input type="number" class="form-control" id="cost"   placeholder="10000" name="newcost" required>
                                     </div>
									 
									 
	                                 <div class="form-group"><!--cuisines-->
                                            <label for="cuisines">Cuisines :</label>
                                            <input type="text" class="form-control" id="cuisines"  placeholder="Enter Cuisines" name="cuisines" required>
                                    </div>
							        
							       
							   
	                                <div class="form-group">
                                         <input type="file" accept="image/*" name="food_pic" required/>Food Snaps 
                                    </div>
   
                                    <button type="submit" name="add" class="btn btn-primary">ADD Item</button>
									<br>
									<span style="color:red;"><?php if (isset($msg)){ echo $msg;}?></span>
                               </form>
				   

					<?php
$food_name=isset($_POST['food_name'])?$_POST['food_name']:'';
$cost=isset($_POST['cost'])?$_POST['cost']:'';
$newcost=isset($_POST['newcost'])?$_POST['newcost']:'';
$cuisines=isset($_POST['cuisines'])?$_POST['cuisines']:'';
$food_picname=isset($_FILES['food_pic']['name'])?$_FILES['food_pic']['name']:'';
$food_pic=isset($_FILES['food_pic']['tmp_name'])?$_FILES['food_pic']['tmp_name']:'';

		
if(isset($_POST['add']))
{   
	echo $food_picname;	

			if(mysqli_query($con,"insert into offers(fldvendor_id,foodname,cost,cuisines,fldimage,newcost) 
				values('".$_SESSION['id']."','$food_name','$cost','$cuisines','$food_picname','$newcost')"))
			{
				move_uploaded_file($_FILES['food_pic']['tmp_name'],"img/".$_FILES['food_pic']['name']);
			}
			else{
				echo "failed";
			}
  	
			 
}
	




					?>
				</div>

			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>


</body>
</html>