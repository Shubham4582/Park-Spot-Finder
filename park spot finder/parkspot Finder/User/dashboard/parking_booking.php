<?php  
include 'head_dashboard.php';

 if (!isset($_SESSION)) {
 	session_start();
}

?>
<head>
  <style type="text/css">
    .input{
      border: none;

    }
    .main{
      background-image:url('photo.jpg');
      background-size: 100% 100%;
    }
    .box{
      border: none;
    }
    .ul{
      list-style: none;
      display: flex;

    }
  .li{
      margin-left: 10px;

    }
    .li:hover{
/*      color: red;*/
      text-decoration: underline;
    }
  </style>
</head>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">My Bookings</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


  


    <section>


        <div class="container">
              <?php 
                 
                 if (isset($_SESSION['u_id'])) {

                    // print_r($_SESSION);
                     
                     include "../../database/database.php";
                     $query="SELECT * from parking_booking WHERE u_id='".$_SESSION['u_id']."'";

                     $fire=mysqli_query($conn,$query);
                    while($row=mysqli_fetch_assoc($fire)){
                 

                ?>
            <div class="row justify-content-center">
            
                
                   <div class="card col-md-6">

                    <div class="card-header">
                        <h3 class="text-center">Booking</h3>
                    </div>

                    
            <div class="card-body">
              <div class="row">

              <div class="col-md-6">
                <span>Name: </span>
             
                <input type="text" name="" value="<?=$_SESSION['u_name'];?>" class="input form-control">
                 <hr>
              </div> 
             


               <div class="col-md-6">
                <span>Slot No: </span>
  
                <input type="text" name="" value="<?=$row['slot_no'];?>" class="input form-control">
                 <hr>
              </div>
             


               <div class="col-md-6">
                <span>Charge: </span>
                <input type="text" name="" value="<?=$row['charge'];?>" class="input form-control">
                  <hr>
              </div>


               <div class="col-md-6">
                <span>Vehicle No: </span>
                <input type="text" name="" value="<?=$row['Vehicle_No'];?>" class="input form-control">
                  <hr>
              </div>

               <div class="col-md-6">
                <span>Booking Date: </span>
                <input type="text" name="" value="<?=$row['b_date'];?>" class="input form-control">
                  <hr>
              </div>

              <div class="col-md-6">
                <span>Ariving time: </span>
                <input type="text" name="" value="<?=$row['Ariving_time'];?>" class="input form-control">
                  <hr>
              </div>
            


             <div class="col-md-12">
                <span>Departure time: </span>
    
                <input type="text" name="" value="<?=$row['Departure_time'];?>" class="input form-control">
                  <hr>
              </div>

               <div class="col-md-6">
                <span>RC Book: </span>
                <input type="text" name="" value="<?=$row['RC'];?>" class="input form-control">
                <img src="../../admin/assests/<?=$row['RC'];?>" style="width: 100px;height: 100px;">
                  <hr>
              </div>

               <div class="col-md-6">
                <span>RC Book: </span>
                <input type="text" name="" value="<?=$row['license'];?>" class="input form-control">
                <img src="../../admin/assests/<?=$row['license'];?>" style="width: 100px;height: 100px;">
                  <hr>
              </div>

 

                 


            </div>




              
                </div>
               
            
            </div>
            <?php  }} ?>
        </div>
    </section>