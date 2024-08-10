<?php 
include('head.php');

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">User Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <div class="container">
    	<div class="row">

    		<div class="col-md-12 text-center">
    			<h2>User Details</h2>
    		</div>
    		<div class="col-md-12">
    			
               <table class="table table-bordered table-stripped">
               <tr>
               		<th>sr.no</th>
               	<th>name</th>
               	<th>gmail</th>
               	<th>mobile</th>
               	<th>address</th>
               </tr>
               <?php 
                
                 include "../database/database.php";
                $query="SELECT * from user_registration";
                $fire=mysqli_query($conn,$query);
                $i=1;
                while ($row=mysqli_fetch_assoc($fire)) {
                
                

               ?>

               <tr>
                <td><?=$i++;?></td>
                 <td><?=$row['u_name'];?></td>
                 <td><?=$row['u_email'];?></td>
                 <td><?=$row['u_mobile'];?></td>
                 <td><?=$row['u_address'];?></td>

                 <!-- <td>
                  <a href="user_details.php?id=<?=$row['u_id'];?>">Rebot me</a>
                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Booking Details</button>
                </td> -->


                <!-- <td>
                  <a href="user_details.php?id=<?=$row['u_id'];?>">rebot</a>
                  <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal2">Payment Details</button>
                </td>
 -->
                 <!-- <td><button>fee Details</button></td> -->

               </tr>
                 <?php } ?>

               </table>


    		</div>
         <?php 
           
           if (isset($_GET['id'])) {
               include "../database/database.php";
           $query="SELECT * from parking_booking WHERE u_id='".$_GET['id']."'";

             $fire=mysqli_query($conn,$query);
            while( $row=mysqli_fetch_assoc($fire)){

             // print_r($row);
           

        ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Booking  Details</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>

      <div class="modal-body">
       
        
        <div class="row">
           <div class="col-md-12">
             <span>Booking Id: </span><span> <?=$row['b_id'];?></span>
           </div>

           <div class="col-md-12">
             <span>SLot No: </span><span> <?=$row['slot_no'];?></span>
           </div>

            <div class="col-md-12">
             <span>Charge: </span><span> <?=$row['charge'];?></span>
           </div>

            <div class="col-md-12">
             <span>Spot Address: </span><span> <?=$row['address'];?></span>
           </div>

            <div class="col-md-12">
             <span>Vehicle No: </span><span> <?=$row['Vehicle_No'];?></span>
           </div>

           <div class="col-md-12">
             <span>Booking Date: </span><span> <?=$row['b_date'];?></span>
           </div>

           <div class="col-md-12">
             <span>Ariving time: </span><span> <?=$row['Ariving_time'];?></span>
           </div>

            <div class="col-md-12">
             <span>Departure time: </span><span> <?=$row['Departure_time'];?></span>
           </div>
             <br><br>

            <div class="col-md-12 mt-2">
             <span>RC Book: </span><span> <?=$row['RC'];?></span><br>
             <img src="assests/<?=$row['RC'];?>" style="width:400px;height: 200px;">
           </div>
           
            <div class="col-md-12 mt-5">
             <span>license: </span><span> <?=$row['license'];?></span><br>
             <img src="assests/<?=$row['license'];?>" style="width:400px;height: 200px;">
           </div>



        </div>



      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    	</div>
    </div>

<?php } }?>


      <?php  
   
      if (isset($_GET['id'])) {
        

        // print_r($_GET);
 include "../database/database.php";
   $query="SELECT * from payment where u_id='".$_GET['id']."'";
    $fire=mysqli_query($conn,$query);
     while($row=mysqli_fetch_assoc($fire))
     {
    // print_r($row);
      

?>



<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

       <div class="row">
           <div class="col-md-12">
             <span>card name: </span><span> <?=$row['cardname'];?></span>
           </div>

           <div class="col-md-12">
             <span>SLot Address: </span><span> <?=$row['address'];?></span>
           </div>

            <div class="col-md-12">
             <span>slot no: </span><span> <?=$row['slot_no'];?></span>
           </div>

            <div class="col-md-12">
             <span>Spot Address: </span><span> <?=$row['address'];?></span>
           </div>

            <div class="col-md-12">
             <span>Date: </span><span> <?=$row['b_date'];?></span>
           </div>

           <div class="col-md-12">
             <span>Charge: </span><span> <?=$row['charge'];?></span>
           </div>

           <div class="col-md-12">
             <span>card No: </span><span> <?=$row['cardno'];?></span>
           </div>

            <div class="col-md-12">
             <span>status: </span><span> <?=$row['status'];?></span>
           </div>

           
           </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<?php }}?>
 
  



  </main><!-- End #main -->


