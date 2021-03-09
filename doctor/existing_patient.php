<?php 
include('../config/db_connect.php');
session_start();
$pid=$_SESSION['np_id'];
$id=$_SESSION['d_id'];
$user=$_SESSION['d_user'];
$email=$_SESSION['d_email'];
$sql = "SELECT * FROM patient,therapist_report WHERE id=pid AND pid='$pid';";
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
 	<div class="left-align">
 		<h6>Patient name:</h6>
 	</div>
 	<div class="container" style="padding-top: 50px;">
 		<div class="row">
 			<ul class="collapsible">
	    		<li>
			      <div class="collapsible-header">Therapist Report</div>
			      <div class="collapsible-body">
			      		<div class="container">
			      			<?php 

			      				if ($result->num_rows > 0){
					 		if($result){
					 			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
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
						              <th>Therapy name</th>
						              <th style="padding-right: 80px;"><?php echo $row['therapy_name']; ?></th>
						          </tr>
						        </thead>
						    </table>
			      			
			      		</div>
			      		<div class="row">

			      			<table>
						        <thead>
						          <tr>
						              <th>Patient</th>
						              <th><?php echo $row['des']; ?></th>
						          </tr>
						        </thead>
						    </table>
			      			
			      		</div>
			      		<?php 
					      		}
					      	}
					 		else
					 		{
			      	 ?>
			      	 <div class="flow-text">Report not at generated</div>
			      	<?php } ?>

			      		</div>
			      </div>
			    </li>
  			</ul>
 		</div>
 		<div class="row">
 			<a href="report.php" class="btn">Genereate another report</a>
 		</div>
 	</div>
  	<script type="text/javascript">
  		$(document).ready(function(){
		    $('.collapsible').collapsible();
		  });
  	</script>
 </main>
 <?php include('../templates/footer.php'); ?>
 </html>