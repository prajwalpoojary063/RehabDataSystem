<?php 
include('../config/db_connect.php');
session_start();
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
 	<div class="container" style="width: 300px;padding-top: 150px">
 		<a href="th_assign.php" class="btn-large">Assign a Therapist</a>
 	</div>
 	<div class="container" style="width: 280px;padding-top: 50px">
 		<a href="report.php" class="btn-large">Generate Report</a>
 	</div>
 </main>
 <?php include('../templates/footer.php'); ?>
 </html>