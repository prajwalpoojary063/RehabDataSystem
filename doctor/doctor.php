<?php 
include('../config/db_connect.php');
session_start();
$id=$_SESSION['d_id'];
$user=$_SESSION['d_user'];
$email=$_SESSION['d_email'];		
 $sql = "SELECT id,username FROM patient,pt_visit WHERE id=pid AND did='$id';";
		      $result = $conn->query($sql);
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
 	<div class="row" style="padding-left:1200px;padding-top: 10px;">
 		<a href="../login.php" class="btn green">log out</a>
 	</div>
 	<?php 

 		if (isset($_POST['submit1']))
 		{
 			$_SESSION['np_id']=$_POST['n_p'];
 			header('location: new_patient.php');
 		}
 		if (isset($_POST['submit2']))
 		{
 			$_SESSION['np_id']=$_POST['e_p'];
 			header('location: existing_patient.php');
 		}
 	 ?>
 	<div class="container" style=" width: 400px; padding-top: 100px;">
 		<form method="POST">
 			<div class="input-field col s12" >
	    	<select name="n_p">
	    		<option value="" disabled selected>select patients</option>
			  	<?php 
	      				if ($result->num_rows > 0) {
					    while($row = $result->fetch_assoc()) {
					    	
	      		?>
			     <option value="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></option>
			    <?php 
	      				  }
					} else {
	      	    ?>
	      	    <option value="" disabled selected>No new patients</option>
	      	    <?php } ?>
			 </select>
			 <label style="color: green;">NEW PATIENTS</label>
			 <div class="center">
				<input type="submit" name="submit1" value="proceed" class="btn-small z-depth-0">
			</div>
			</div>
			<div class="input-field col s12" style="padding-top: 40px;">
				<?php 
				$sql = "SELECT id,username FROM patient,doctor_report WHERE id=pid AND did='$id';";
		      	$result = $conn->query($sql);

				 ?>
		    	<select name="e_p">
		    		<option value="" disabled selected>Existing Patients</option>
				  	<?php 
		      				if ($result->num_rows > 0) {
						    while($row = $result->fetch_assoc()) {
						    	
		      		?>
				     <option value="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></option>
				    <?php 
		      				  }
						} else {
		      	    ?>
		      	    <option value="" disabled selected>No new patients</option>
		      	    <?php } ?>
				 </select>
				 <label style="padding-top: 30px;color: green;">EXISTING PATIENTS</label>
				 <div class="center">
				<input type="submit" name="submit2" value="proceed" class="btn-small z-depth-0">
				</div>
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