<?php 
	ob_start();
	include('config/db_connect.php');
	$d_username=$d_password=$t_username=$t_password=$p_username=$p_password='';
	$errors=array('d_username'=>'','d_password'=>'','t_username'=>'','t_password'=>'','p_username'=>'','p_password'=>'');
	if (isset($_POST['d_submit'])) {
		$proceed=1;
		if (empty($_POST['d_username'])) {
			$errors['d_username'] ='username is required';
			$proceed=0;
		}
		else{
				$d_username=$_POST['d_username'];
			}
		if (empty($_POST['d_password'])) {
			$errors['d_password']='password is required';
			$proceed=0;
		}
		else{
			$d_password=$_POST['d_password'];
		}

	}
	else
	{
		echo '';
	}
	if (isset($_POST['t_submit'])) {
		$proceed=1;
		if (empty($_POST['t_username'])) {
			$errors['t_username'] ='username is required';
			$proceed=0;
		}
		else{
				$t_username=$_POST['t_username'];
			}
		if (empty($_POST['t_password'])) {
			$errors['t_password']='password is required';
			$proceed=0;
		}
		else{
			$t_password=$_POST['t_password'];
		}

	}
	else
	{
		echo '';
	}
	if (isset($_POST['p_submit'])) {
		$proceed=1;
		if (empty($_POST['p_username'])) {
			$errors['p_username'] ='username is required';
			$proceed=0;
		}
		else{
				$p_username=$_POST['p_username'];
			}
		if (empty($_POST['p_password'])) {
			$errors['p_password']='password is required';
			$proceed=0;
		}
		else{
			$p_password=$_POST['p_password'];
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

<main>
	<div class="container center-align" style="width: 500px;padding-top: 150px;">
	<ul class="collapsible">
    <li>
      <div class="collapsible-header container center-align"><i class="material-icons">local_hospital</i>DOCTOR</div>
      <div class="collapsible-body">
      	<div class="container center-align">
      		<form action="" method="POST">
      			<div class="row">
      				<div class="input-field col s6">
          			<input name="d_username" id="first_name" type="text" value="<?php echo htmlspecialchars($d_username);?>" >
          			<div class="red-text left-align" style="width: 200px;"><?php echo $errors['d_username']; ?></div>
          			<label for="first_name">USERNAME</label>
        			</div>
        		</div>
        		<div class="row">
        			<div class="input-field col s6">
        				<input name="d_password" id="first_name" type="text" value="<?php echo htmlspecialchars($d_password);?>" >
        				<div class="red-text left-align" style="width: 200px;"><?php echo $errors['d_password']; ?></div>
          				<label for="first_name">PASSWORD</label>
        			</div>
      			</div>
      			<div class="row" style="padding-right: 150px;">
      				<div class="center">
						<input type="submit" name="d_submit" value="SIGN IN" class="btn-small z-depth-0">
					</div>
					<h6>OR</h6>
					<div class="btn-small yellow">
						<a href="#">SIGN UP</a>
					</div>
      			</div>
      		</form>
      	</div>
      </div>
    </li>
    <li>
      <div class="collapsible-header container  center-align"><i class="material-icons">local_hospital</i>THERAPIST</div>
      <div class="collapsible-body">
      	<div class="container center-align">
      		<form action="" method="POST">
      			<div class="row">
      				<div class="input-field col s6">
          			<input name="t_username" id="first_name" type="text" value="<?php echo htmlspecialchars($t_username);?>" >
          			<div class="red-text left-align" style="width: 200px;"><?php echo $errors['t_username']; ?></div>
          			<label for="first_name">USERNAME</label>
        			</div>
        		</div>
        		<div class="row">
        			<div class="input-field col s6">
        				<input name="t_password" id="first_name" type="text" value="<?php echo htmlspecialchars($t_password);?>" >
        				<div class="red-text left-align" style="width: 200px;"><?php echo $errors['t_password']; ?></div>
          				<label for="first_name">PASSWORD</label>
        			</div>
      			</div>
      			<div class="row" style="padding-right: 150px;">
      				<div class="center">
						<input type="submit" name="t_submit" value="SIGN IN" class="btn-small z-depth-0">
					</div>
					<h6>OR</h6>
					<div class="btn-small yellow">
						<a href="#">SIGN UP</a>
					</div>
      			</div>
      		</form>
      	</div>
      </div>
    </li>
    <li>
      <div class="collapsible-header container center-align"><i class="material-icons">local_hospital</i>PATIENT</div>
      <div class="collapsible-body">
      	<div class="container center-align">
      		<form action="" method="POST">
      			<div class="row">
      				<div class="input-field col s6">
          			<input name="p_username" id="first_name" type="text" value="<?php echo htmlspecialchars($p_username);?>" >
          			<div class="red-text left-align" style="width: 200px;"><?php echo $errors['p_username']; ?></div>
          			<label for="first_name">USERNAME</label>
        			</div>
        		</div>
        		<div class="row">
        			<div class="input-field col s6">
        				<input name="p_password" id="first_name" type="text" value="<?php echo htmlspecialchars($p_password);?>" >
        				<div class="red-text left-align" style="width: 200px;"><?php echo $errors['p_password']; ?></div>
          				<label for="first_name">PASSWORD</label>
        			</div>
      			</div>
      			<div class="row" style="padding-right: 150px;">
      				<div class="center">
						<input type="submit" name="p_submit" value="SIGN IN" class="btn-small z-depth-0">
					</div>
					<h6>OR</h6>
					<div class="btn-small yellow">
						<a href="#">SIGN UP</a>
					</div>
      			</div>
      		</form>
      	</div>
      </div>
    </li>
  </ul>
  <script type="text/javascript">
  	$(document).ready(function(){
    $('.collapsible').collapsible();
  });
  </script>
</div>
</main>

<?php include('templates/footer.php'); ?>
</html>