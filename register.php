<?php 
	ob_start();
	include('config/db_connect.php');
	$email=$name=$password=$role='';
	$errors=array('email'=>'','name'=>'','password'=>'','role'=>'');

	if (isset($_POST['submit'])) {
		if (empty($_POST['email'])) {
			$errors['email'] ='email is required';
		}
		else{
			$email=$_POST['email'];
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				$errors['email']='enter valid email address';
			}
		}
		if (empty($_POST['name'])) {
			$errors['name']='username is required';
		}
		else{
			$name=$_POST['name'];
		}
		if (empty($_POST['password'])) {
			$errors['password']='password is required';
		}
		else{
			$password=$_POST['password'];
		}
		if (empty($_POST['role'])) {
			$errors['role']='select one option';
		}
		else{
			$role=$_POST['role'];
		
		    
		}

		if (array_filter($errors)) {
		
		}
		else{
			$email=mysqli_real_escape_string($conn,$_POST['email']);
			$name=mysqli_real_escape_string($conn,$_POST['name']);
			$password=mysqli_real_escape_string($conn,$_POST['password']);
			$role=mysqli_real_escape_string($conn,$_POST['role']);
			$sql="SELECT * FROM $role WHERE username='$name';";
			$res=mysqli_query($conn,$sql);
			if ($res->num_rows > 0){
				$errors['name']='username exists';
			}
			else{
			$sql="INSERT INTO $role(email,username,password) VALUES('$email','$name','$password')";
			if (mysqli_query($conn,$sql)) {
				header('location: login.php');
			}else{
				echo 'query error'.mysqli_error($conn);
			}
			}
			
		}
	}
	else
	{
		echo '';
	}
 ?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>
<li><a href="login.php" style="font-size: 20px;">home</a></li>
				<li><a href="#" style="font-size: 20px;">about</a></li>
			</ul>
		</div>
	</nav>
	</header>

<main>
	<div class="container" style="width:300px;padding-top: 50px;">
		<form method="POST">
			<div class="input-field col s12">
    			<select name="role">
      			<option value="" disabled selected>Choose your option</option>
      			<option value="doctor">DOCTOR</option>
      			<option value="therapist">THERAPIST</option>
      			<option value="patient">PATIENT</option>
    			</select>
    			<label>Register as</label>
  			</div>
  			<div class="red-text left-align" style="width: 200px;"><?php echo $errors['role']; ?></div>
			<label>Your email</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email);?>">
			<div class="red-text left-align" style="width: 200px;"><?php echo $errors['email']; ?></div>
			<label>User Name</label>
			<input type="text" name="name" value="<?php echo htmlspecialchars($name);?>">
			<div class="red-text left-align" style="width: 200px;"><?php echo $errors['name']; ?></div>
			<label>password</label>
			<input type="text" name="password" value="<?php echo htmlspecialchars($password);?>">
			<div class="red-text left-align" style="width: 200px;"><?php echo $errors['password']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn z-depth-0">
			</div>
		</form>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
    	$('select').formSelect();
  	});
	</script>
</main>

<?php include('templates/footer.php'); ?>
</html>