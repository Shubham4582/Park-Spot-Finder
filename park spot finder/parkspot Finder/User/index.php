
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
  .data{
    color:orangered; 
    position: absolute;
    top: 20%;
    left: 40%;

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

              <!--  <li class="nav-item">
                <a class="nav-link" href="view_parking.php">View Parking</a>
              </li>
 -->
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
        
        <div class="find_form_container">
          <form action="index.php" method="post">
            <div class="form-row justify-content-center">
          
              <div class="col-md-4 px-0">
                <div class="form-group">
                  <label for="" class="text-center"></label>
                  <div class="input-group ">
                    <input type="text" name="search" style="border-radius: 20px;" class="form-control" placeholder="Search Here"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="btn-box" >
              <button type="submit" class="" style="background-image: linear-gradient(royalblue,lightblue);">
                <span>
                  Search Now
                </span>
              </button><br>
              
            </div>
 
          </form>
        </div>




        <div class="row mt-5">

        <?php 

       if(isset($_POST['search'])){
        $search=$_POST['search'];

          include "../database/database.php";


           $query="SELECT * from parking_area where(address like '%$search%' OR Pincode like '%$search%')";
               
               $fire=mysqli_query($conn,$query);
                //$ar=mysqli_fetch_assoc($fire);
                // print_r($ar);/
              
             
           
              
             
        
  
               $i=0;
                while ($row=mysqli_fetch_assoc($fire)) {
               
                // print_r($row);
       
          ?>

           <div class="col-md-4 mb-5">
                  <div class="card">
                    <div class="card-header" style="background-image: linear-gradient(royalblue,lightblue);">
                       <span><b><?=$row['address'];?></b></span><br>
                       <span><?=$row['Pincode'];?></span>
                    </div>

                     <div class="card-body">
                      <img src="../admin/assests/<?=$row['area_photo'];?>" style="width: 330px;height: 200px; margin-left: -5px;"><br>
                       <p style="font-size: 15px; margin-top: 5px;">Facilities: <?=$row['facilities'];?></p>
                       <p style="font-size: 15px;">Area: <?=$row['area'];?></p>
                       <p>Area Photo</p>
                         
                     </div>

                     <div class="card-footer text-center" style="background-color: whitesmoke;">
                        <a href="view_slot.php?id=<?=$row['O_id'];?>">View Slot</a>
                      </div>

                  </div>
                </div>


    <?php }
  }
     




     ?>
 
        

        </div>


  



              
          

    
  

        </div>
      </div>
    </section>
    <!-- end slider section -->

  </div>


  







  