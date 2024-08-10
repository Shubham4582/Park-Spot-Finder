<?php  
include 'head.php';

 if (!isset($_SESSION)) {
 	session_start();
     

}

?>
<head>
  <style type="text/css">
    .title{
      font-weight: bold;

    }
    .input{
      border: none;

    }
  </style>
</head>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Slot Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <div class="row">
      <div class="col-md-12">
        <h2 class="text-center">Slot Details</h2>
      </div>
    </div>



    <div class="row">

      <?php 
      include "../../database/database.php";

       $query="SELECT * from parking_slot where O_id='".$_SESSION['O_id']."'";

        $fire=mysqli_query($conn,$query);

         while ($row=mysqli_fetch_assoc($fire)) {
            // echo "<pre>";
             // print_r($row);
         

      ?>
  
     
        
      
      <div class="col-md-4">
         <form action="slot_details.php" method="post">
 <div class="card">
        <div class="card-header bg-success text-white">
          <h3>Slot No:<?=$row['slot_no'];?>

           <input type="hidden" name="s_id" value="<?=$row['s_id'];?>"> </h3>
            <p>address:<?=$row['address'];?></p>
        </div>
        <div class="card-body">

          <span class="title">Status:</span> <span><?=$row['status'];?>
           <br><br>
           <input type="radio" name="status1" value="Available">Available
           <input type="radio" name="status1" value="Not Available">Not Available<br>
           <input type="radio" name="status1" value="Reserved">Reserved
  
          </span>
          <hr>
          <span class="title">Charge:</span> <span><input class="input" type="text" name="charge" value="<?=$row['charge'];?>"></span>
          <hr>

          <span class="title">Slot type:</span> <span><?=$row['slot_type'];?><br><br>
            
             <input type="radio" name="slot_type" value="Two Wheeler">Two Wheeler
           <input type="radio" name="slot_type" value="Four Wheeler">Four Wheeler<br>
           <input type="radio" name="slot_type" value="Heavy">Heavy



           
          </span>
          <hr>
          <span class="title">Available Space:</span> <span><input class="input" type="text" name="Available_Space" value="<?=$row['Available_Space'];?>"></span>
          <hr>

        </div>

        <div class="card-footer text-center">
          <a href=""><button class="btn btn-warning">Edit</button></a>
          
          <a href="slot_details.php?del_id=<?=$row['slot_no'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
        </div>

      </div>
 </div>
 </form>
 <?php 
}
 ?>

    </div> 

    <?php 

// echo "<pre>";
//   print_r($_POST);


    if (isset($_POST['status1'])) {
       
      include "../../database/database.php";

      $query="UPDATE parking_slot SET status='".$_POST['status1']."',charge='".$_POST['charge']."',slot_type='".$_POST['slot_type']."',Available_Space='".$_POST['Available_Space']."' where s_id='".$_POST['s_id']."'";

      $fire=mysqli_query($conn,$query);
      if ($fire) {
         
          echo "<script>alert('data update successfully...!.');window.location.href='slot_details.php';</script>";
      }
      echo "error";

     } 

     // delete

     if (isset($_GET['del_id'])) {
       
        $query="delete from parking_slot where slot_no='".$_GET['del_id']."'";

        $fire=mysqli_query($conn,$query);
        if ($fire) {
            
             echo "<script>alert('slot deleted successfully.');window.location.href='slot_details.php';</script>";
        }
     }

  ?>