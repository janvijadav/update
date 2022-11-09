<head>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js"></script>
</head>
 

<?php
    $con=mysqli_connect("localhost","root","","janvi");
	if(!$con)
	{
		echo "error";
	}
	else
	{	
		if(isset($_POST['txtmail']))
		{
		$mail=$_POST['txtmail'];
		$psw=$_POST['txtpsw'];
		$sql="SELECT * from `show` WHERE email='$mail' AND password='$psw'";
		$res = mysqli_query($con,$sql);
		$count  = mysqli_affected_rows($con);
		if($count == 1)
		{
			session_start();
			$_SESSION['show'] = $mail;
			header("location:home.php");
		}
		else
		{
			echo	"wrong id or password ";
		}
	
	}		
}
        
?>
<form action="log1.php" method="POST">
  <div class="container mt-3">
    <input type="text" name="txtmail" class="form-control" placeholder="email" required></br>
   <input type="password" name="txtpsw" class="form-control" placeholder="password" required></br>
    <input type="submit" class="btn btn-success"  value="login"> 
  
   </div>
  
  </form> 