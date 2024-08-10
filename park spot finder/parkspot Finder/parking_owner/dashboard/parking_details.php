<?php  
include 'head.php';

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
          <li class="breadcrumb-item active">Parking Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->



  <table class="table table-stripped table-bordered table-calender">
      
  <tr>
     
      <th>Owner ID</th>
      <th>Spot Address</th>
      <th>Spot Pincode</th>
      <th>Area</th>
      <th colspan="2">Manage</th>
  </tr>

  <?php 
 include "../../database/database.php";
  $query="SELECT * from parking_area where O_id='".$_SESSION['O_id']."'";
  
   $fire=mysqli_query($conn,$query);

    while ($row=mysqli_fetch_assoc($fire)) {
        // print_r($row);
    

  ?>
<form action="parking_details.php" method="post">

  <tr>

    <td><input type="text" name="O_id1" value="<?=$row['O_id'];?>" class="form-control" readonly></td>
    <td><input type="text" name="address" value="<?=$row['address'];?>" class="form-control"></td>
    <td><input type="text" name="Pincode" value="<?=$row['Pincode'];?>" class="form-control"></td>
    <td><input type="text" name="area" value="<?=$row['area'];?>" class="form-control"> </td>
    <!-- <td><input type="text" name="facilities" value="" class="form-control"></td> -->
    <td><a href=""><button class="btn btn-warning">Edit</button></a></td>

     <td><a href="add_slot.php?address=<?=$row['address'];?>"><button  type="button" class="btn btn-info btn-sm">add slot</button></a></td>


    <td><a href="parking_details.php?id=<?=$row['p_id'];?>"><button  type="button" class="btn btn-danger">Delete</button></a></td>

   
      
  </tr>
</form>
<?php  } ?>



  </table>

  <?php 

 
 // print_r($_POST);
   
     if(isset($_POST['O_id1'])){
        include "../../database/database.php";
         $query="UPDATE parking_area SET address='".$_POST['address']."',Pincode='".$_POST['Pincode']."',area='".$_POST['area']."'";

         $fire=mysqli_query($conn,$query);
         if($fire){

              echo "<script>alert('data edit succesfully...!');window.location.href='parking_details.php';</script>";
         }
         else{
            echo "error";
         }
     }


     // delete
        

     if(isset($_GET['id'])){
             
     
   
        $query="DELETE from parking_area where p_id='".$_GET['id']."'";

        $fire=mysqli_query($conn,$query);
        if ($fire) {
             
               echo "<script>confirm('You are Sure...!');window.location.href='parking_details.php';</script>";
        }
        else{
            echo "error";
        }
     }


?>