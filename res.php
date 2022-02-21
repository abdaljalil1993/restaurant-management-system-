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
			<h1 class="text-danger">All My Reservations</h1>
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>Id</th>
						<th>Day</th>
						<th>Time</th>
						<th>state</th>

						<th>delete</th>
					
						
					</tr>
				</thead>
				<tbody>
					<?php
						$r=mysqli_query($con,"select * from restdate where rest_name='".$_SESSION['id']."'");

						while($row=mysqli_fetch_array($r))
						{
							echo'

							<tr>
							<td>'.$row['id'].'</td>
							<td>'.$row['day'].'</td>
							<td>'.$row['time'].'</td>
							<td>'.$row['state'].'</td>
							<td><a href="res.php?id='.$row['id'].'" class="btn btn-danger btn-sm">delete</a></td>
							</tr>






							';
						}


						if(isset($_GET['id']))
						{
							$r1=mysqli_query($con,"delete from restdate where id='".$_GET['id']."'");

							echo'<meta http-equiv="refresh" content="0;url=res.php">';
						}


					?>
				</tbody>
			</table>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>


</body>
</html>