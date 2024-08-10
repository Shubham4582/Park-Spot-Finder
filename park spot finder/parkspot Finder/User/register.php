
<?php
 include '../parking_owner/dashboard/cdn.php';

?>
<head>
	<style type="text/css">
		body{
		background-image: url('https://img.freepik.com/free-vector/network-mesh-wire-digital-technology-background_1017-27428.jpg?size=626&ext=jpg');
			background-size: 100% 140%;

			background-repeat: no-repeat;
			
/*background-color: red;*/
		}
	</style>
</head>

<form action="Register.php" method="post">
<div class="container">
	<div class="row justify-content-center mt-5 p-5" id="login">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header" style="background-image: linear-gradient(royalblue,lightblue);">
					<h1 class="text-center font-weight-bold text-white text-Uppercase "> User Registration</h1>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<label>Name :</label>
							<input type="text" name="u_name" class="form-control" required>
						</div>
						<div class="col-md-6">
							<label>Email :</label>
							<input type="text" name="u_email" class="form-control" required>
						</div>
						<div class="col-md-6">
							<label>Mobile :</label>
							<input type="text" name="u_mobile" class="form-control" required>
						</div>
							
							
						<div class="col-md-6">
							<label>Address :</label>
							<input type="text" name="u_address" class="form-control" required>
						</div>
						<div class="col-md-6">
							<label>Password :</label>
							<input type="password" name="u_password" class="form-control" required>
						</div>
						<div class="col-md-6">
							<label>Confirm Password :</label>
							<input type="password" name="confirm_pass" class="form-control" required>
						</div>
						<div class="col-md-12 card-footer text-center mt-3">
							<button class="btn text-white" style="background-image: linear-gradient(royalblue,lightblue);">Register Now</button>
						</div>
					</div>
				</div>
			<div class="card-footer text-center">
				<b class="text-dark">Already Registered ?<a href="login.php">Login Here</a> </b>
			</div>
			</div>
		</div>
	</div>
</div>
</form>

</body>
</html>

<?php 


//print_r($_POST);
if (isset($_POST['u_name'])){

	if ($_POST['u_password']==$_POST['confirm_pass']){

            include "../database/database.php";

$query="INSERT INTO user_registration(u_name,u_email,u_mobile,u_address,u_password) VALUES ('".$_POST['u_name']."','".$_POST['u_email']."','".$_POST['u_mobile']."','".$_POST['u_address']."','".$_POST['u_password']."') ";
$fire=mysqli_query($conn,$query);
if($fire){
	header('location:login.php');
}
else{
	echo "not Register";
}
}
	else{
		echo "not Match Password and confirm password....";
}
}
?>


