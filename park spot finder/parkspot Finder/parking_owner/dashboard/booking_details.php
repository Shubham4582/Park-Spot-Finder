<?php 
include('head.php');

?>


<head>
  <style type="text/css">
    .data{
      width: 300px;
      height: 300px;
      background: lightblue;
      position: absolute;
      margin-top: -200px;
      margin-left: 300px;

    }
  
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Booking Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   <div class="container mt-5">
     <div class="row">

       <div class="col-md-12">
         <table class="table table-bordered table-stripped">
           <tr>
             <th>Sr.No</th>
           <th>Booking ID</th>
           <th>Slot address</th>
           <th>Slot No</th>
           <th>Charge</th>
           <th>Vehicle No</th>
           <th>Booking Date</th>
           <th>Ariving TIme</th>
           <th>Departure TIme</th>
           <th>RC Book</th>
           <th>License</th>
           <th>Status</th>
           </tr>

           <?php 
           
           include "../../database/database.php";
           $query="SELECT * from  parking_booking where O_id='".$_SESSION['O_id']."'";
           $fire=mysqli_query($conn,$query);
           $i=1;
            while ($row=mysqli_fetch_assoc($fire)) {
                 // print_r($row);
            


           ?>


           <tr>
            <td><?=$i++;?></td>
             <td><?=$row['b_id'];?></td>
          
             <td><?=$row['address'];?></td>
             <td><?=$row['slot_no'];?></td>
             <td><?=$row['charge'];?></td>
             <td><?=$row['Vehicle_No'];?></td>
             <td><?=$row['b_date'];?></td>
             <td><?=$row['Ariving_time'];?></td>
             <td><?=$row['Departure_time'];?></td>
             <td>
               <img src="../../admin/assests/<?=$row['RC'];?>" style="width: 100px;">
               <a href="booking_details.php?idd=<?=$row['RC'];?>">View Image</a>
             </td>
             <td>
              
               <img src="../../admin/assests/<?=$row['license'];?>" style="width: 100px;">
                <a href="booking_details.php?idd=<?=$row['license'];?>">View Image</a>
              </td>
             <td><a href="payment_details.php?id=<?=$row['b_id'];?>"><button class="btn btn-warning btn-sm">Payment Details</button></a> </td>

              <td><a href="booking_details.php?id=<?=$row['b_id'];?>&img1=<?=$row['RC'];?>&img2=<?=$row['license'];?>"><button class="btn btn-danger">Delete</button></a> </td>
              
              
            
             

           </tr>
         <?php } ?>




         </table>
       </div>

     </div>
   </div>
 <?php 
  if (isset($_GET['idd'])) {
    
     

 ?>

   <div class="data">
     <div class="row">
       <div class="col-md-12 ml-5">
         <button class="btn btn-warning mb-5" id="close">Close</button>
         <img src="../../admin/assests/<?=$_GET['idd'];?>" style="width: 300px;height: 200px;">
       </div>
     </div>
   </div>

<?php } ?>



  </main><!-- End #main -->

  <?php 
  
   if (isset($_GET['id'])) {
     include "../../database/database.php";
      $query="DELETE from parking_booking where b_id='".$_GET['id']."'";
      $data="DELETE from payment where b_id='".$_GET['id']."'";
       $path ='../../admin/assests/'.$_GET['img1'];
       unlink($path);
       $path1 ='../../admin/assests/'.$_GET['img2'];
       unlink($path1);
        
        $q=mysqli_query($conn,$data);
      $fire=mysqli_query($conn,$query);
      if ($fire) {
         

         echo "<script>alert('Booking Deleted Successfully.');window.location.href='booking_details.php'</script>";
      }
   }
   
?>

<script type="text/javascript">
  $(document).ready(function(){
  $('#close').click(function(){
     $('.data').hide();
    window.location.replace('booking_details.php');

  });

});
</script>