<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.1/css/bootstrap.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js"></script>
<?php
	session_start();
	if(!$_SESSION['show'])
	{
		header("location:lon1.php");
	}
     $con=mysqli_connect("localhost","root","","janvi");
	 if(!$con) 
	 {
		 echo "Error DB";
	 }
	 else
	 {
		$oldmail=$_SESSION['show'];
		$sql="SELECT * FROM `show` WHERE email='$oldmail'";
		$res=mysqli_query($con,$sql);	
	 }	 
?>
<div class="container-fluid mt-2 text-center">
 <?php
			$count  = mysqli_affected_rows($con);
			if($count == 1)
			{
				
				$row = mysqli_fetch_assoc($res);
			
			}
	?>
  <form action="home.php" method="POST" enctype="multipart/form-data">
		<?php
			if($row['profile_pic']!="")
			{
		?>
		<img class="img-circle" src="<?php echo "image/".$row['profile_pic']; ?>" alt="No Image" height="100" width="100" name="usrimg" id="usrimg"></br>
		<?php
			}
			if($row['profile_pic']=="")
			{
		?>
		<img class="img-circle" src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="No Image" height="100" width="100" name="usrimg" id="usrimg"></br></br>
		<input type="file" class="form-control" id="fileupload" name="fileupload" accept=".JPEG,.JPG,.PNG"></br>
	<?php
			}
	?>
		<input type="text" value="<?php echo $row['name']; ?>" name="txtnm" class="form-control" required></br>
		<input type="email" value="<?php echo $row['email']; ?>" name="txtmail" class="form-control" disabled></br>
		<input type="text" value="<?php echo $row['mobile']; ?>" name="txtmob" class="form-control" required></br>
		<input type="password" value="<?php echo $row['password']; ?>" name="txtpsw" class="form-control" required></br>
		<input type="submit" value="Save Changes" class="btn btn-primary w-100"></br></br>
		<a href="logout.php"  class="btn btn-danger">LOGOUT</a>
	</form>
</div>
<?php
	if(isset($_POST['txtnm']))
	{
		$nm = $_POST['txtnm'];
		$mob = $_POST['txtmob'];
		$psw = $_POST['txtpsw'];
		$target_dir = "image/";
		$temp = explode(".", $_FILES["fileupload"]["name"]);
		$newfilename = round(microtime(true)) . '.' . end($temp);
		echo $newfilename;
		if(move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_dir.$newfilename))
		{
			$sql = "update `show` set name='$nm', mobile='$mob', password='$psw', profile_pic='$newfilename' where email='$oldmail'";
		}
		else
		{
			$sql = "update `show` set name='$nm', mobile='$mob', password='$psw' where email='$oldmail'";
		}
		if(mysqli_query($con,$sql))
		{
			header("location:home.php");
		}
	}
?>
<script>
	fileupload.onchange = evt => {
  const [file] = fileupload.files
  if (file) {
    usrimg.src = URL.createObjectURL(file)
  }
}
</script>
