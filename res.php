<head>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.1/js/bootstrap.min.js"></script>
</head>
<form action ="res.php" method="POST">
<div class="container mt-3">
<b>REGISTER</b></br>
<input type="text" name="txtnm" class="form-control" placeholder="ENTER NAME" required></br>
<input type="email" name="txtmail" class="form-control" placeholder="ENTER EMAIL" required></br>
<input type="password" name="txtpsw" class="form-control" placeholder="PASSWORD" required></br>
<input type="mob" name="txtmob" class="form-control" placeholder="MOBILE NO." required></br>
<input type="submit" class="btn btn-primary" value="REGISTER">



</div>
</form>

<?php
     $con=mysqli_connect("localhost","root","","janvi");
	 if(isset($_POST['txtnm']))
	 {   
           
 	      $nm=$_POST['txtnm'];
		  $mail=$_POST['txtmail'];
		  $psw=$_POST['txtpsw'];
		  $mob=$_POST['txtmob'];
		  $sql="INSERT INTO `show`( `name`, `email`, `password`, `mobile`) VALUES ('$nm','$mail','$psw','$mob')";
		  if(mysqli_query($con,$sql))
		  {
		    header("location:log1.php");
		  }
	 }
	 
 ?> 
