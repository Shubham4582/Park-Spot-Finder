<?php

 include '../parking_owner/dashboard/cdn.php';



?>
<head>
	<style type="text/css">
		.demo{
			color: red;
			 display: flex;
			 justify-content: center;
			 justify-items: center;
			 

		}
		body{
		background-image: url('https://img.freepik.com/free-vector/network-mesh-wire-digital-technology-background_1017-27428.jpg?size=626&ext=jpg');
			background-size: 100% 140%;

			background-repeat: no-repeat;
			
/*background-color: red;*/
		}
	</style>
</head>

<form action="login.php" method="post">
<div class="container-fluid">
	<div class="row p-5 justify-content-center" id="login">
		<div class="col-sm-4">
			<div class="card">
				<div class="card-header" style="background-image: linear-gradient(royalblue,lightblue);">
					<h1 class="text-center font-weight-bold text-white text-Uppercase ">User Login</h1>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<label>Username :</label>
							<input type="text" name="username" class="form-control" required="">
							<label>Password :</label>
							<input type="password" name="password" class="form-control" required="">
						</div>
						
					</div>
				</div>


<?php
// print_r($_POST);

include "../database/database.php";
   
 if(isset($_POST['username']))
 {
 	$user=trim($_POST['username']);
 	$password=trim($_POST['password']);
 	$query="SELECT * from user_registration where(u_email='".$user."' OR u_mobile='".$user."') AND u_password='".$password."'";
 	
 	
 	$q=mysqli_query($conn,$query);
 	if($ar=mysqli_fetch_assoc($q)){
 	// print_r($ar);
 	if(($user==$ar['u_mobile'] || $user==$ar['u_email']) &&
 	 $password==$ar['u_password'])
 	{
 		// echo "login success";
 		session_start();
 		$_SESSION['u_name']=$ar['u_name'];
 		$_SESSION['u_id']=$ar['u_id'];
 		// 
 		echo "<script>alert('login Successfully.');window.location.href='index.php';</script>";
 		// header('location:index.php');
 		/// print_r($_SESSION);
 	}
 }
 	else
 	{
 		echo'<p class="demo">Login Failed. Please Enter Correct password!..<p>';
 	}
 }
 
?>
			<div class="card-footer text-center" >
				<button class="btn text-white" style="background-image: linear-gradient(royalblue,lightblue);">Login</button><br>
				<b class="text-dark" >New User ? <a href="register.php">Register Here</a> </b><br>
			</div>
			</div>
		</div>
	</div>
</div>
</form>
				
		

</body>
</html>

