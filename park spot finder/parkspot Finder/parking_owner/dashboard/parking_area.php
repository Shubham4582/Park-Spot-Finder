<?php  
include 'head.php';

 if (!isset($_SESSION)) {
 	session_start();
}

?>
<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">ADD Parking</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   

 


		
<form action="parking_area.php"  method="post" enctype="multipart/form-data">
<div class="">
	<div class="row justify-content-center" id="login">
		<div class="col-md-9">
			<div class="card bg-white">
				<div class="card-header">
					<h1 class="text-center font-weight-bold text-primary text-Uppercase ">Add Your Area Location</h1>
				</div>
				<div class="card-body">
					<div class="row">
						

							<div class="col-md-12">
							<label>Parking Owner ID :</label>
							<input type="text" name="O_id" value="<?php echo  $_SESSION['O_id']; ?> " class="form-control" readonly>
						</div>

             <div class="col-md-12">
							 <label>Owner Name :</label> <!--  echo  $_SESSION['name']; ?> -->
							<input type="text" name="name" value="<?php echo  $_SESSION['name']; ?> " class="form-control" readonly>
						</div>
						
					
							
						<div class="col-md-12">
							<label>Spot Address :</label>
							<input type="text" name="address" class="form-control" required>
						</div>
						<div class="col-md-12">
							<label> Spot Pincode :</label>
							<input type="text" name="Pincode" class="form-control" required>
						</div>
						
						

							<div class="col-md-12">
							<label>Area in Squarefeet :</label>
							<input type="text" name="area" class="form-control" required>
						</div>

						<div class="col-md-12">
							<label>Parking Area Image :</label>
							<input type="file" name="area_photo" class="form-control" required>
						</div>


						<div class="col-md-6 mt-2">
							<label>Facilities Available :</label><br>
					<input type="checkbox" name="facilities[]" value="CCTV" >CCTV 
					<input type="checkbox" name="facilities[]" value="Security Guards" style="margin-left: 120px;">Security Guards<br>
					<input type="checkbox" name="facilities[]" value="Safety Locks">Safety Locks<br>
					<input type="checkbox" name="facilities[]" value="Monthly Passes">Monthly Passes<br>
					<input type="checkbox" name="facilities[]" value="E-vechile Charging point">E-vechile Charging point<br>
					<input type="checkbox" name="facilities[]" value="No Facilities available">No Facilities available<br>


						</div>

						<div class="col-md-12 card-footer text-center mt-3">
							<button class="btn btn-primary">Save Now</button>
			
						</div>
					</div>
				</div>
		
			</div>
		</div>
	</div>

</div>
</form>
 </main><!-- End #main -->
</body>

				<?php 
        echo "<pre>";
        print_r($_FILES);
			 	print_r($_POST);
				
           $conn=mysqli_connect('localhost:3306','root','','parkspot');
				function image($name,$size,$temp,$path)
                      {
                      $ext=explode(".",$name);
                      $a=rand(1,9999)."-parking_booking.".$ext[count($ext)-1];
                      move_uploaded_file($temp,"$path".$a);
                      return $a;

                      }


if(isset($_FILES['area_photo']))
{ 

	 $fac=implode(",",$_POST['facilities']);
           $conn=mysqli_connect('localhost:3307','root','','parkspot');
	 
	   $name=$_FILES['area_photo']['name'];
       $size=$_FILES['area_photo']['size'];
       $tmp=$_FILES['area_photo']['tmp_name'];
      $path="../../admin/assests/";
     $area_photo=image($name,$size,$tmp,$path);

  $query="INSERT INTO parking_area(O_id, address, Pincode, area,area_photo, facilities) VALUES ('".$_POST['O_id']."','".$_POST['address']."','".$_POST['Pincode']."','".$_POST['area']."','".$area_photo."','".$fac."')";
  	// $q=mysql_fetch_assoc($query);

  	$fire=mysqli_query($conn,$query);
      // $_SESSION['p_id']=$q['p_id'];
  	if ($fire) {
  		  
  		  

  		 echo "success";
  	}
  	else
  	{
  		echo "error";
  	}

}

?>


		</div> 
	</div> 

	

	
</body> 
</html>


