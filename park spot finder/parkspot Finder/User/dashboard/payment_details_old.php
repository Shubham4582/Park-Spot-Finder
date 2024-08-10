<?php  
include 'head_dashboard.php';

 if (!isset($_SESSION)) {
    session_start();
}

?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Payment Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <div class="container">

 <?php 
          
          include "../../database/database.php";
          $query="SELECT * from payment where u_id='".$_SESSION['u_id']."'";
          $fire=mysqli_query($conn,$query);
          while ($row=mysqli_fetch_assoc($fire)) {
            
              // print_r($row);
             $success=$row['status'];
             $i=111;
if (!empty($success)) {
               // print_r($row);
               
             

        ?>

      <div class="row">
        <div class="col-md-10">
          <div class="card">

           <div class="card-header">
             <h4 class="text-center">Payment Receipt</h4>

             <div class="col-md-12 text-end">
               <span style="font-size: 20px;color: black;"><i class="fa-solid fa-print"></i></span>
               <a href="" download="receipt.pdf"><span style="font-size:20px;color: black;"> Print</span></a>
             </div>
           </div>
           <div class="card-body">
             <div class="row">          
              <?php 
                   
          include "../../database/database.php";
          $query="SELECT * from user_registration where u_id='".$_SESSION['u_id']."'";
          $fire=mysqli_query($conn,$query);
          while ($row=mysqli_fetch_assoc($fire)) {

              // print_r($row);
              ?>

                <div class="col-md-6"><br><br><br>
                   <span>Name: </span><span><?=$row['u_name'];?></span><br>
                   <span>Email: </span><span><?=$row['u_email'];?></span><br>
                   <span>Mobile: </span><span><?=$row['u_mobile'];?></span><br>
                   <span>Address: </span><span><?=$row['u_address'];?></span><br>
                </div>
              <?php } ?>


            <?php 
          
          include "../../database/database.php";
          $query="SELECT * from payment where u_id='".$_SESSION['u_id']."'";
          $fire=mysqli_query($conn,$query);
          while ($row=mysqli_fetch_assoc($fire)) {
            
              // print_r($row);
             $success=$row['status'];
             // $i=111;

        ?>
                <div class="col-md-6 text-end">
                      <span>Invoice No: </span><span><?=$i++;?></span><br>
                <span>Date: </span><span><?=$row['b_date'];?></span><br><br>


                  <span>Booking NO: </span><span><?=$row['p_id'];?></span><br>
                   <span>Slot NO: </span><span><?=$row['slot_no'];?></span><br>
                   <span>Address: </span><span><?=$row['address'];?></span><br>
                   <span>Charge: </span><span><?=$row['charge'];?></span><br>
                </div>
                <hr>


               <div class="col-md-12 mt-3">
                 <table class="table table-bordered border-stripped">

                   <tr>
                     <th>Card No</th> 
                   <th>Card Name</th> 
                   <th>Zip Code</th> 
                   <th>Charge</th> 
                   <th>Ariving Time</th> 
                   <th>Departure Time</th> 
                   <th>Status</th> 
                   </tr>

                   <tr>
                       <td><?=$row['cardno'];?></td>
                       <td><?=$row['cardname'];?></td>
                       <td><?=$row['ZIPCode'];?></td>
                       <td>RS.<?=$row['charge'];?>.00</td>
                       <td><?=$row['Ariving_time'];?>PM</td>
                       <td><?=$row['Departure_time'];?>PM</td>
                       <td><?=$row['status'];?></td>

                   </tr>
                   
                 </table>
               </div>
             </div>
           </div>
            <div class="card-footer text-primary">             
                 <h3 class="text-center" style="font-family: cursive;">Thank You</h3>             
            </div>

          </div>
  </div>

<?php } }

 else{



 ?>





        <div class="col-md-12">
          <marquee scrollamount='25'><h3 class="text-danger">Payment under Verification check After Sometime...</h3></marquee>
        </div>

        <div class="col-md-12 text-center mt-3">
          <img src="../../images/data.png" width="200px">
          <br>
          <h2>NO Data TO Show...!</h2>
        </div>

<?php }?>

    
      </div>
 <?php }  ?>



 </div>     <!--container close -->


