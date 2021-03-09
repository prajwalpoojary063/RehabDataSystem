<?php 
include('../config/db_connect.php');	
session_start();
$id=$_SESSION['t_id'];
$user=$_SESSION['t_user'];
$email=$_SESSION['t_email'];
$pid=$_SESSION['np_id'];	
 ?>
 <!DOCTYPE html>
 <html>
 <?php include('../templates/header.php'); ?>
 <li><a href="therapist.php" style="font-size: 20px;">home</a></li>
				<li><a href="#" style="font-size: 20px;">about</a></li>
			</ul>
		</div>
	</nav>
	</header>
 <main>
 	<div class="left-align">
 		<h6>Patient name:</h6>
 	</div>
 	<?php 
 		if(isset($_POST["submit"]))
	 		{
	 			$th_name=$_POST['th_name'];
	 			$des=$_POST['des'];
		 		$sql="INSERT INTO therapist_report values('$pid','$id','$th_name','$des');";
		 		if (mysqli_query($conn,$sql)) {
		 			$sql="DELETE FROM th_assign WHERE tid='$id';";
		 				mysqli_query($conn,$sql);
						header('location: therapist.php');
		 		}
		 		else{
		 			echo "<div class='green-text flow-text'>Report already generated</div>";
		 		}
		 		
	 		}
 	 ?>
 	<div class="container" style="padding-top: 50px;">
 		<div class="row">
	      <form class="col s12" method="POST">
	        <div class="row">
	          <div class="input-field col s6">
	            <input id="input_text" type="text" data-length="10" name="th_name">
	            <label for="input_text">Therapy name</label>
	          </div>
	        </div>
	        <div class="row">
	          <div class="input-field col s12">
	            <textarea id="textarea2" class="materialize-textarea" data-length="120" name="des"></textarea>
	            <label for="textarea2">Description</label>
	          </div>
	        </div>
	        <div class="center">
				<input type="submit" name="submit" value="proceed" class="btn z-depth-0">
			</div>
	      </form>
	    </div>
 	</div>
 	<script type="text/javascript">
 		$(document).ready(function(){
		    $('select').formSelect();
		  });
 	</script>
 </main>
 <?php include('../templates/footer.php'); ?>
 </html>