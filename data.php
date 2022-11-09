<?php
	$con = mysqli_connect("localhost","root","","janvi");
	if(isset($_POST['txtsnm']))
	{
			$snm = $_POST['txtsnm'];
			$cr = $_POST['txtcr'];
			$cn = $_POST['txtcn'];
			$sql ="INSERT INTO `stud_info`( `stud name`, `course`, `contact`) VALUES ('$snm','$cr','$cn')";
			$res=mysqli_query($con,$sql);
	}
?>
	
<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js"></script>
	</head>

		<div class="container mt-2">
			<form action="data.php" method="POST">
				<input type="text" name="txtsnm" class="form-control" placeholder="stud name" required></br>
				<input type="text" name="txtcr" class="form-control" placeholder="course   " required></br>
				<input type="text" name="txtcn" class="form-control" placeholder="contact number  "></br>
				<input type="submit" class="btn btn-primary w-100" value="Save">
				
			</form>
		    <table class="table table-bordered text-center">
			<tr>
			     <th>sr.
				 <th>stud_name
				 <th>course
                 <th>contact_number
                  <th>action
		<?php
       
	           $sql="SELECT * FROM `stud_info`";
				$res=mysqli_query($con,$sql);
				$i=1;
				while($row=mysqli_fetch_assoc($res))
				{
				    	
	    ?>			  
                 <tr>     
                    <td><?php echo $i;?>
					<td><?php echo $row['stud name'];?>
					<td><?php echo $row['course'];?>
					<td><?php echo $row ['contact'];?>
					<td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
					<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-snm="<?php echo $row['stud name']; ?>" data-bs-cr="<?php echo $row['course']; ?>" data-bs-cn="<?php echo $row['contact'];?>" data-bs-id="<?php echo $row['id']; ?>">Update</button>     
                   
					
          <?php					
					 $i++;
		       } 
		 ?>	  
  </table>
      </div>
	         <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="staticBackdropLabel">Update Record</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<form action="data.php" method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">stud_name</label>
            <input type="text" name="txtsnm1" class="form-control" id="name">
            <input type="text" name="txtid" class="form-control" id="id" hidden>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">course</label>
            <input type="text" name="txtcr1" class="form-control" id="course">
		<div class="mb-3">
            <label for="message-text"class="col-form-label">contact_number</lable>
            <input type="text" name="txtcn1" class="form-control" id="contact">
           </div>			
          </div>
		  </div>
		  <div class="modal-footer">
			<button type="submit" class="btn btn-primary w-100">Update</button>
		  </div>
		  </form>
		</div>
	 </div>
		</div>	
	</body>
</html>	

  
<?php 

   if(isset($_POST['txtid']))
	{
		$id = $_POST['txtid'];
		$snm = $_POST['txtsnm1'];
		$cr = $_POST['txtcr1'];
		$cn = $_POST['txtcn1'];
		$sql="UPDATE `stud_info` SET `stud name`='$snm',`course`='$cr',`contact`='$cn' WHERE `id`='$id'";
		echo $sql;
		$res=mysqli_query ($con,$sql);
		header("location:data.php");
		 
	}	  
 
?>	  
		  
<script>
	const exampleModal = document.getElementById('staticBackdrop')
	exampleModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget
    const snm = button.getAttribute('data-bs-snm')
    const cr = button.getAttribute('data-bs-cr')
    const cn = button.getAttribute('data-bs-cn')
    const id = button.getAttribute('data-bs-id')
    const modalTitle = exampleModal.querySelector('.modal-title')
	modalTitle.textContent = `Update Record ID ${id}`
    document.getElementById('name').value = snm;
	document.getElementById('course').value = cr;
	document.getElementById('contact').value = cn;
	document.getElementById('id').value = id;
})
</script>

		  

		  
		  
		  
	  