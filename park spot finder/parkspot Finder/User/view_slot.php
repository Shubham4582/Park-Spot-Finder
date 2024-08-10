
<?php 

 if (!isset($_SESSION)) {
       
        session_start();
       // print_r($_SESSION);
        // print_r($_POST);


  }

?>


<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>ParkSpot Finder</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- nice selecy -->
  <link rel="stylesheet" href="../css/nice-select.min.css">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="../css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../css/responsive.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<style type="text/css">
  body{
    background-image: url('');
   
    background-repeat: no-repeat;
  }
</style>


</head>

<body>

  <div class="hero_area">
    <div class="bg-box">
      <img src="index.jpg" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              ParkSpot Finder
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-0">
              <li class="nav-item">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>

               <li class="nav-item">
                <a class="nav-link" href="dashboard/dashboard.php">Dashboard</a>
              </li>

               <li class="nav-item">
                <a class="nav-link" href="view_parking.php">View Parking</a>
              </li>

               <li class="nav-item">
                <a class="nav-link" href="feedback.php">Feedback</a>
              </li>

             

             
              <li class="nav-item">
                <a class="nav-link" href="#"></a>
              </li>
              <!--  <li class="nav-item">
                 <span class="nav-link text-warning" href="#"><h4 style="font-family: sans-serif;">Welcome <?php echo $_SESSION['u_name'];?></h4></span>
              </li> -->
              </li>

            </ul>
           
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div class="container">
        
        

        <table class="table bg-white text-dark table-bordered table-stripped table-calender">
          <tr style="background-color: lightblue;">
            <th>Sr.no</th>
            <th>Slot No</th>
            <th>Address</th>
            <th>Charge</th>
            <th>slot Type</th>
            <th>Available Space</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
                   <?php

 if(isset($_GET['id'])){
           include "../database/database.php";

      
       $query="SELECT * FROM parking_slot WHERE O_id='".$_GET['id']."'";
         $fire=mysqli_query($conn,$query);
           $i=1;
          while($row=mysqli_fetch_assoc($fire)){
             // echo "<pre>";
         // print_r($row);
   
 

      ?>

          <tr>
            <td><?=$i++;?></td>
            <td><?=$row['slot_no'];?></td>
            <td><?=$row['address'];?></td>
            <td><?=$row['charge'];?></td>
            <td><?=$row['slot_type'];?></td>
            <td><?=$row['Available_Space'];?></td>
            <td><?=$row['status'];?></td>
            <td>
              <?php if ($row['status']=="Available") {
               
              ?>

              <a href="booking.php?slot_id=<?=$row['s_id'];?>">
             <button class="btn btn-success"> Book</button></a>

           <?php } 
             else{
           ?>
               <p class=""> Booked</p>
              <?php } ?>
           </td>
          </tr>



  
       <?php }}?>

        </table>


     

 


    





        </div>
      </div>
    </section>
    <!-- end slider section -->

  </div>


  







  