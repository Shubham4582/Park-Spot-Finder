<?php 
 
 include 'head.php';
 if (!isset($_SESSION)) {
       
        session_start();
       // print_r($_SESSION);




  }


?>
<head>
       <style type="text/css">
              .color{
                     font-weight: bold;
              }
              .style{
                     
                     font-size: 18px;
                     margin-left:10px;
              }
       </style>
</head>


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


<form method="post" action="payment_details.php">

    <div class="container">
           <div class="row">
              <div class="col-md-12"> <h2>Payment Details</h2> </div>


                   <?php 
         // print_r($_GET['id']);
          if (isset($_GET['id'])) {
              include "../../database/database.php";
        $query="SELECT * from payment where b_id='".$_GET['id']."'";
  
   $fire=mysqli_query($conn,$query);

    while ($row=mysqli_fetch_assoc($fire)) {    

  ?>
        
             <div class="col-md-4">
                    <div class="card">
                           <div class="card-header text-center">
                                  <span>Slot No:</span><span><?=$row['slot_no'];?></span>
                           </div>

                           <div class="card-body">
                                  
                                  <div class="row">

                                         <div class="col-md-12">
                                                <span class="color">Name: </span><span class="style"> <?=$row['u_name'];?></span>
                                         </div><br>

                                         <div class="col-md-12">
                                                <span class="color">address: </span><span class="style"> <?=$row['address'];?></span>
                                         </div><br><hr>

                                         <div class="col-md-12">
                                                <span class="color">Ariving time: </span><span class="style"> <?=$row['Ariving_time'];?></span>
                                         </div><br><hr>


                                         <div class="col-md-12">
                                                <span class="color"> Departure time: </span><span class="style"> <?=$row['Departure_time'];?></span>
                                         </div><br><hr>


                                         <div class="col-md-12">
                                                <span class="color">cardname: </span><span class="style"> <?=$row['cardname'];?></span>
                                         </div><br><hr>

                                         <div class="col-md-12">
                                                <span class="color">charge: </span><span class="style"> <?=$row['charge'];?></span>
                                         </div>
                                             <br><hr>
                                          <div class="col-md-12">
                                                <span class="color">Status: </span><span style="font-weight: bold;">Payment Success</span>

                                                <input type="hidden" name="success" value="success" class="form-control">

                                                <input type="hidden" name="p_id" value="<?=$row['p_id'];?>" class="form-control">
                                         </div>


              

                                  </div>

                                  <div class="card-footer">

                                   <?php

                                   if ($row['status']=="") {
                                          echo "<button class='btn btn-success'>Confirm Booking</button>";
                                   }
                                      
                                   else{
                                          echo "<button type='button' class='btn btn-warning'>booked</button>";

                                   }

                                   ?>
                                      
                                       

                                   </div>
                                      

                           </div>
                    </div>
             </div> 

   
   <?php }} ?>
    
    </div>
</div>
</form>
<?php 

// print_r($_POST);

 if (isset($_POST['success'])) {

      $id=$_POST['p_id'];

     include "../../database/database.php";
     $query="UPDATE payment SET status='".$_POST['success']."' where p_id='$id'";
      $fire=mysqli_query($conn,$query);

      if($fire)
      {
        echo "<script>alert('Booking Confirm.');window.location.href='booking_details.php';</script>";
        ;
      }

    }

?>









        
   