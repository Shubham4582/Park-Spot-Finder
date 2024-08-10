
<?php 
 include 'dashboard/cdn.php';
?>
<head>
	<style type="text/css">
		body{
		background-image: url('https://img.freepik.com/free-vector/network-mesh-wire-digital-technology-background_1017-27428.jpg?size=626&ext=jpg');
			background-size: 100% 140%;

			background-repeat: no-repeat;
			
/*background-color: red;*/
		}
		.demo{
			color: red;
			 display: flex;
			 justify-content: center;
			 justify-items: center;
			 

		}
	</style>
</head>

<form action="login.php" method="post">
<div class="container">
	<div class="row justify-content-center mt-5 p-5" id="login">
		<div class="col-md-5">
			<div class="card">
				<div class="card-header" style="background-image: linear-gradient(royalblue,lightblue);">
					<h1 class="text-center font-weight-bold text-white text-Uppercase ">Park Owner Login</h1>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<label>Username :</label>
							<input type="text" name="username"  class="form-control">
							
							<label>Password :</label>
							<input type="password" name="password"  class="form-control">
							
					

					</div>
				</div>
								
<?php
// print_r($_POST);

   include "../database/database.php";
 if(isset($_POST['username']))
 {
 	$user=trim($_POST['username']);
 	$password=trim($_POST['password']);
 	$query="SELECT * from owner_registration where(email='".$user."' OR mobile='".$user."') AND password='".$password."'";
 	
 	
 	$q=mysqli_query($conn,$query);
 	if($ar=mysqli_fetch_assoc($q)){
 	// print_r($ar);
 	if(($user==$ar['mobile'] || $user==$ar['email']) &&
 	 $password==$ar['password'])
 	{
 		// echo "login success";
 		 //echo  $ar['name'];
 		 //echo  $ar['O_id'];

 		 session_start();
 		 $_SESSION['name']=$ar['name'];
 	        $_SESSION['O_id']=$ar['O_id'];
 		  header('location:dashboard/dashboard.php');
 	}}
 	else
 	{
 		echo'<p class="demo">Login Failed. Please Enter Correct password!..<p>';
 	}
 }
 
?>
	
			<div class="card-footer text-center">
				<button class="btn btn-white" style="background-image: linear-gradient(royalblue,lightblue);">Login</button><br>
				<b class="text-dark">New User ? <a href="register.php">Register Here</a></b>
			</div>
			</div>
		</div>
	</div>
</div>
</form>

