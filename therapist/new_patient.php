<?php 
include('../config/db_connect.php');
session_start();
$id=$_SESSION['t_id'];
$user=$_SESSION['t_user'];
$email=$_SESSION['t_email'];
$pid=$_SESSION['np_id'];
echo $pid;
 ?>
 <!DOCTYPE html>
 <html>
 <?php include('../templates/header.php'); ?>
 <li><a href="therapist.php" style="font-size: 40px;">home</a></li>
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
			      <div class="collapsible-header">Doctor Report</div>
			      <div class="collapsible-body">
			      	<div class="container">
			      		<?php 
 		
					 		$sql="SELECT username,did,injury_name,des FROM doctor_report,doctor WHERE did=id AND pid='$pid';";
					 		$result = mysqli_query($conn,$sql);
					 		if ($result->num_rows > 0){
					 		if($result){
					 			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
					 		
							
					 	 ?>
			      		<div class="row">

			      			<table>
						        <thead>
						          <tr>
						              <th>Doctor</th>
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
						              <th>Description</th>
						              <th><?php echo $row['des']; ?></th>
						          </tr>
						        </thead>
						    </table>
			      			
			      		</div>
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
 		<div class="row" style="padding-left: 220px;">
 			<a href="report.php" class="btn">Genereate report</a>
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