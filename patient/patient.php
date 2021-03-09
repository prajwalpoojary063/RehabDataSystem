<?php 
include('../config/db_connect.php');
session_start();
$id=$_SESSION['p_id'];
$user=$_SESSION['p_user'];
$email=$_SESSION['p_email'];		
 ?>
 <!DOCTYPE html>
 <html>
 <?php include('../templates/header.php'); ?>
 <li><a href="patient.php" style="font-size: 20px;">home</a></li>
				<li><a href="#" style="font-size: 20px;">about</a></li>
			</ul>
		</div>
	</nav>
	</header>
 <main>
 	<div class="row" style="padding-left:1200px;padding-top: 10px;">
 		<a href="../login.php" class="btn green">log out</a>
 	</div>
 	<div class="container">
 		<div class=" row">
 			<h6>Patient name :</h6>
 			<h6 class="flow-text"><?php echo $user; ?></h6>
 		</div>
 	</div>
 	<?php
 	if (isset($_POST['submit'])) 
 	{
 		$pid=$id;
 		$did=$_POST['doctor'];
 		$sql="INSERT INTO pt_visit values('$pid','$did');";
 		if (mysqli_query($conn,$sql)) {
				header('location: ../login.php');
			}else{
				echo '<div class="red-text center-align" style="padding-bottom: 10px;">you are already selected a doctor</div>';
			}
			
 	}
 	$sql = "SELECT id,username FROM doctor";
		      $result = $conn->query($sql);
 	?>
 	<div class="container" style=" width: 300px; padding-top: 50px;">
 		 <form method="POST">
			<div class="input-field col s12">
    			<select name="doctor">
      			<option value="" disabled selected>Select your Doctor</option>
      			<?php 
      				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
      			 ?>
      			<option value="<?php echo $row["id"]; ?>"><?php echo  $row["username"]; ?></option>
      			<?php 
      				  }
				} else {
      			 ?>
      			 <option value="" disabled selected><?php echo "0 results"; ?></option>
      			<?php } ?>
    			</select>
    			<label>Doctor list</label>
  			</div>
  			<div class="center">
				<input type="submit" name="submit" value="proceed" class="btn z-depth-0">
			</div>
  		</form>
 	</div>
 	<?php 
 		$sql="SELECT p.username,d.injury_name,d.des FROM patient p,doctor_report d WHERE p.id=d.pid AND d.pid='$id'; ";
 		$result = mysqli_query($conn,$sql);
 	 ?>
 	<div class="container" style="padding-top: 50px;">
 		<div class="row">

 			<ul class="collapsible">
	    		<li>
			      <div class="collapsible-header flow-text">My Report</div>
			      <div class="collapsible-body">
			      	<div class="container">

		 				<?php 
		      				if ($result->num_rows > 0) {
						    while($row = $result->fetch_assoc()) {
		      			 ?>
		 			
			      		<div class="row">

			      			<table>
						        <thead>
						          <tr>
						              <th>Patient</th>
						              <th><?php echo $row['username']; ?></th>
						          </tr>
						        </thead>
						    </table>
			      			
			      		</div>
			      		<div class="row">
			      			<table>
						        <thead>
						          <tr>
						              <th>Injury name</th>
						              <th><?php echo $row['injury_name']; ?></th>
						          </tr>
						        </thead>
						    </table>
			      			
			      		</div>
			      		<div class="row">
			      			<table>
						        <thead>
						          <tr>
						              <th>Doctor Description</th>
						              <th><?php echo $row['des']; ?></th>
						          </tr>
						        </thead>
						    </table>	
			      		</div>
			      		<?php 
		      				  }
						} else {
		      			 ?>
		      			 <div class="row">Doctor report is not at generated</div>
					      		<?php 
					      	}
			      			$sql="SELECT des FROM therapist_report  WHERE pid='$id'; ";
					 		$result = mysqli_query($conn,$sql);
							
		      				if ($result->num_rows > 0) {
						    while($row = $result->fetch_assoc()) {
			      		 ?>
			      		 <div class="row">
			      			<table>
						        <thead>
						          <tr>
						              <th>Therapist Description</th>
						              <th><?php echo $row['des']; ?></th>
						          </tr>
						        </thead>
						    </table>	
			      		</div>
			      		<?php 
		      				  }
						} else {
		      			 ?>
		      			 <div class="row">Therapist report is not at generated</div>
		      			<?php } ?>
			      		<div class="row">
			      			<h6 class="blue-text">Assigned Medicenes</h6>
			      			<ol>
			      			<?php 
			      				$sql="SELECT mc.name FROM medicate mt,medicene mc WHERE mt.mid=mc.mid AND mt.pid='$id'; ";
						 		$result = mysqli_query($conn,$sql);
								 if ($result->num_rows > 0) {
							    while($row = $result->fetch_assoc()) {
			      			 ?>
			      			 <li><?php echo $row['name']; ?></li>
			      			 <?php 
			      			 	}
			      			 }
			      			  ?>
			      			</ol>
			      		</div>
			      	</div>
			      </div>
			    </li>
  			</ul>
 		</div>
 	</div>
 	<script type="text/javascript">
		$(document).ready(function(){
    	$('select').formSelect();
  	});
	</script>
 	<script type="text/javascript">
  		$(document).ready(function(){
		    $('.collapsible').collapsible();
		  });
  	</script>
 </main>
 <?php include('../templates/footer.php'); ?>
 </html>