<?php
session_start();
include("connection.php");

?>


<!DOCTYPE html>
<html>
<head>
	<title> Restaurant information</title>
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
          <a class="nav-link" href="index.php">Home
                
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
          <a class="nav-link" href="allrest.php">all Restaurant</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="alloffer.php">Offers</a>
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
    
    <?php






    if(isset($_GET['id']))
     {
       $x=$_GET['id'];

      
   $r= mysqli_query($con,"select* from parking where restname='$x' and state=0");
   if(mysqli_num_rows($r)>0)
   {
    while($row=mysqli_fetch_array($r))
    {
      echo'

<div class="col-md-4 " style="background-color:#fff;padding:30px;border-radius:14px;box-shadow:0px 0px 1px 1px #cfcfcf;">


<h3>  '.$row['restname'].'</h3>
<h5 style="color:red"> Parking number '.$row['parknumber'].'</h5>



<a href="park.php?dateid='.$row['id'].'" class="btn btn-danger"> reservation</a>




</div>

      ';
    }
   }

   else{
    echo'<div class="alert alert-danger">
<h1>no Restaurant Dates available</h1>
    </div>';
   }
     }


if(isset($_GET['dateid']))
     {
       $dateid=$_GET['dateid'];
        $r1= mysqli_query($con,"insert into parkreserve(parkid,cust_id)
          values('$dateid','".$_SESSION['cust_id']."')");

        echo'<div class="alert alert-success">
<h1>reserved Successfully</h1>
    </div>';

$r1= mysqli_query($con,"update parking set state=1 where id='$dateid'");
header( "refresh:1;url=allrest.php" );
     }
    ?>
  </div>
</div>
