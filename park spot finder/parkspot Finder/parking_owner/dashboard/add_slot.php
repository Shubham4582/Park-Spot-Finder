
<?php 
 
 include 'head.php';
 if (!isset($_SESSION)) {
       
        session_start();
       // print_r($_SESSION);




  }


?>
 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Add Parking</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<div class="container">
	<div class="row justify-content-center" id="login">


		<div class="col-md-9">
			<div class="card bg-white">
				<div class="card-header">
					<h1 class="text-center font-weight-bold text-primary text-Uppercase ">Add Parking Slot</h1>
				</div>

				<div class="card-body">      
           <form method="post" action="add_slot.php">
					<div class="row">
						      <?php 
 

  if(isset($_SESSION['O_id'])){
   include "../../database/database.php";
  $query="SELECT * from parking_area where O_id='".$_SESSION['O_id']."'";

  $fire=mysqli_query($conn,$query);

    $row=mysqli_fetch_assoc($fire);
    // print_r($row);

  
   

      ?>
						<div class="col-md-6">
							<label> Owner ID:</label>
					<input type="text" name="O_id" value="<?php echo $_SESSION['O_id'];?>" class="form-control" readonly>
						</div>
						<div class="col-md-6">
							<label>Slot Address :</label>
							<!-- <input type="text" name="address" class="form-control" required> -->
							<input type="text" name="address" value="<?php echo $_GET['address']?>" class="form-control">
						</div>

						<div class="col-md-6">
							<label>Slot No :</label>
							<input type="text" name="slot_no" class="form-control" required>
							
						</div>


						<div class="col-md-6">
							<label>Status :</label>
							<!-- <input type="text" name="status" class="form-control" required> -->
							<select name="status" class="form-control">
								<option>Available</option>
							   <option>Book</option>
							   <option>Not Available</option>
							</select>

						</div>
							
							
						<div class="col-md-6">
							<label>Charge :</label>
							<input type="text" name="charge" class="form-control" required>
						</div>
						<div class="col-md-6">
							<label>Slot Type :</label>
							<!-- <input type="text" name="slot_type" class="form-control" required> -->

                          <select name="slot_type" class="form-control">
                          	<option>Two Wheeler</option>
                          	<option>Four Wheeler</option>
                          	<option>Heavy Vehicle</option>
                          </select>

						</div>
						
							<div class="col-md-6">
							<label>Available Space:</label>
							<input type="text" name="Available_Space" class="form-control" required>
						</div>

						<div class="col-md-12 card-footer text-center mt-3">
							<button class="btn btn-primary">Save Now</button>
				
						</div>
					</div>
				</div>
		

							<?php 

                }

                            // print_r($_POST);
							 if (isset($_POST['charge'])) {
							 
                               include "../../database/database.php";
                                $query="INSERT INTO parking_slot(O_id, slot_no,address, status, charge, slot_type, Available_Space) VALUES (
                                	'".$_POST['O_id']."','".$_POST['slot_no']."','".$_POST['address']."','".$_POST['status']."','".$_POST['charge']."','".$_POST['slot_type']."','".$_POST['Available_Space']."')";
                                      
                                     $fire=mysqli_query($conn,$query);
                                     if($fire){
                                     	echo "<script>alert('slot added Success!!!!');window.location.href='slot_details.php';</script>";
                                     } 
                                     else
                                     {
                                     	echo "error";
                                     }
                                }
							?>
				
</div>
</form>

</div>
</div>
</div></div></div></main>