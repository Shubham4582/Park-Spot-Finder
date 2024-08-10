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
  </style>
</head>
<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php 
    
     if (isset($_SESSION['u_id'])) {
        
        include "../../database/database.php";
         $query="SELECT * FROM user_registration WHERE u_id='".$_SESSION['u_id']."'";

         $fire =mysqli_query($conn,$query);
         $row=mysqli_fetch_assoc($fire);
     



    ?>
 <form action="profile.php" method="post">
    <section>
      <div class="container">
        <div class="row justify-content-center">

          <div class="card col-md-5">

            <div class="card-header">
                 <h3 class="text-center">Profile</h3>
            </div>


            <div class="card-body">
              <div class="row">

              <div class="col-md-3">
                <span>Name: </span>
              </div>
              <div class="col-md-9">
                <input type="text" name="name1"  value="<?=$row['u_name'];?>" class="input form-control">
              </div>


               <div class="col-md-3">
                <span>Gmail: </span>
              </div>
              <div class="col-md-9">
                <input type="text" name="u_email" value="<?=$row['u_email'];?>" class="input form-control">
              </div>


               <div class="col-md-4">
                <span>Mobile: </span>
              </div>
              <div class="col-md-8">
                <input type="text" name="u_mobile" value="<?=$row['u_mobile'];?>" class="input form-control">
              </div>

                 <div class="col-md-4">
                <span>Address: </span>
              </div>
              <div class="col-md-8">
                <input type="text" name="u_address" value="<?=$row['u_address'];?>" class="input form-control">
              </div>


                 <div class="col-md-4">
                <span>Password: </span>
              </div>
              <div class="col-md-8">
                <input type="text" name="u_password" value="<?=$row['u_password'];?>" class="input form-control">
              </div>
            </div>

            <div class="col-md-12 text-center mt-5">
              <button class="btn btn-warning">Edit</button>
            </div>
            
          </div>


          </div>
        </div>
      </div>
    </section>
    </form>
    <?php }

     if (isset($_POST['name1'])) {
       // code...
         include "../../database/database.php";
         $query="UPDATE user_registration SET u_name='".$_POST['name1']."',u_email='".$_POST['u_email']."',u_mobile='".$_POST['u_mobile']."',u_address='".$_POST['u_address']."',u_password='".$_POST['u_password']."' WHERE u_id='".$_SESSION['u_id']."'";

         $fire=mysqli_query($conn,$query);
         if ($fire) {
           // code...
          echo "<script>alert('profile updated successfully...');window.location.href='profile.php';</script>";
         }

     }



     ?>