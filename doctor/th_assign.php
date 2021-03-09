<?php 
include('../config/db_connect.php');
session_start();
$id=$_SESSION['np_id'];
$user=$_SESSION['d_user'];
$email=$_SESSION['d_email'];

 ?>
 <!DOCTYPE html>
 <html>
 <?php include('../templates/header.php'); ?>
 <li><a href="doctor.php" style="font-size: 20px;">home</a></li>
				<li><a href="#" style="font-size: 20px;">about</a></li>
			</ul>
		</div>
	</nav>
	</header>
 <main>
 	<div class="left-align">
 		<h6>Patient name:</h6>
 	</div>
 	<div class="container" style="width:300px;padding-top: 110px;">
 	<?php 
 		if (isset($_POST['submit'])) 
	 	{
	 		$pid=$id;
	 		$tid=$_POST['therapist'];
	 		$sql="INSERT INTO th_assign values('$pid','$tid');";
	 		if (mysqli_query($conn,$sql)) {
					header('location: new_patient.php');
				}else{
					echo '<div class="red-text center-align" style="padding-bottom: 10px;">Already assigned with a Therapist</div>';
				}
				
	 	}
 		 $sql = "SELECT id,username FROM therapist;";
		      $result = $conn->query($sql);		
 	?>
		<form method="POST">
			<div class="input-field col s12">
    			<select name="therapist">
      			<option value="" disabled selected>SELECT THERAPIST</option>
      			<?php 
      				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
      			?>
      			<option value="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></option>
      			 <?php 
      				  }
				} else {
      	   		 ?>
      	   		 <option value="" disabled selected>There are no Therapists</option>
      	   		  <?php } ?>
    			</select>
  			</div>
			<div class="center">
				<input type="submit" name="submit" value="proceed" class="btn z-depth-0">
			</div>
		</form>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
    	$('select').formSelect();
  	});
	</script>
 </main>
 <?php include('../templates/footer.php'); ?>
 </html>