<?php 
include('../config/db_connect.php');
session_start();
$did=$_SESSION['d_id'];
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
 	<?php 
 		$id=$_SESSION['np_id'];
 		if (isset($_POST['submit'])) 
	 	{
	 		$count=0;
	 		if(isset($_POST["med"]))
	 		{
		 		foreach ($_POST['med'] as $m) {
		 			$sql="INSERT INTO medicate values('$id','$m');";
		 			mysqli_query($conn,$sql);
		 			$count+=1;
		 		}
	 		}
	 		if($count>0)
	 			echo "<div class='flow-text green'>Medicine successfully assigned</div>";

	 	}
	 	$errors=array('injury'=>'','des'=>'');
	 	if(isset($_POST['proceed']))
	 	{
	 		if (empty($_POST['injury'])) {
			$errors['injury']='Please fill this part';
			}
			else{
				$injury=$_POST['injury'];
			}
			if (empty($_POST['des'])) {
			$errors['des']='Please fill this part';
			}
			else{
				$des=$_POST['des'];
			}
	 		
	 		if (array_filter($errors)) {
		
			}
			else
			{
				$sql="INSERT INTO doctor_report values('$id','$did','$injury','$des');";
		 		if (mysqli_query($conn,$sql)) {
		 				$sql="DELETE FROM pt_visit WHERE pid='$id';";
		 				mysqli_query($conn,$sql);
						header('location: doctor.php');
					}
				else
				{
						echo "<div class='green-text flow-text'>Report updated successfully</div>";
						$sql="UPDATE  doctor_report SET injury_name='$injury',des='$des' WHERE pid='$id';";
						mysqli_query($conn,$sql);
				}
			}
	 		
	 	}
 	 ?>
 	<div class="container" style="padding-top: 50px;">
 		<div class="row">
	      <form class="col s12" method="POST">
	        <?php 
		 		 $sql = "SELECT mid,name FROM medicene;";
				      $result = $conn->query($sql);		
		 	?>
	        <div class="row">
	        	<div class="input-field col s12">
				    <select name = "med[]" multiple size = 6>   
				    	<?php 
		      				if ($result->num_rows > 0) {
						    while($row = $result->fetch_assoc()) {
		      			?>
		                <option value = "<?php echo $row['mid']; ?>"><?php echo $row['name']; ?></option> 
		                 <?php 
		      				  }
						} else {
		      	   		 ?>
		      	   		 <option value = "" disabled selected>There is no medicene</option>
		      	   		 <?php } ?>
		            </select> 
				    <label>Medicines</label>
				 </div>
	        </div>
	        <div class="center">
				<input type="submit" name="submit" value="Assign Medicines" class="btn z-depth-0">
			</div>
	      </form>
	    </div>
	    <div class="row">
	    	<form class="col s12" method="POST">
	        <div class="row">
	        	<div class="red-text"><?php echo $errors['injury']; ?></div>
	          <div class="input-field col s6">
	            <input id="input_text" type="text" data-length="10" name="injury">
	            <label for="input_text">Injury name</label>
	          </div>
	        </div>
	        <div class="row">
	          <div class="input-field col s12">
	            <textarea id="textarea2" class="materialize-textarea" data-length="120" name="des"></textarea>
	            <label for="textarea2">Description</label>
	          </div>
	           <div class="red-text"><?php echo $errors['des']; ?></div>
	        </div>
	        <div class="center">
				<input type="submit" name="proceed" value="proceed" class="btn z-depth-0">
			</div>
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