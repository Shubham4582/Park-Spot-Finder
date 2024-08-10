<?php 
include('head.php');

?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Owner Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <div class="container">
    	<div class="row">
         
         <div class="col-md-12 text-center">

             <h2>Owner Details</h2>
          </div>



          <div class="col-md-12">
          	<table class="table table-bordered table-stripped table-calender">

          		<tr>
                <th>sr.no</th>
                <th>Name</th>
                <th>EMail</th>
                <th>Mobile</th>
                <th>Address</th>
          		</tr>

             
                 <?php 
                
                 include "../database/database.php";
                $query="SELECT * from owner_registration";
                $fire=mysqli_query($conn,$query);
                $i=1;
                while ($row=mysqli_fetch_assoc($fire)) {
  

               ?>
               <tr>
                <td><?=$i++;?></td>
                <td><?=$row['name'];?></td>
                <td><?=$row['email'];?></td>
                <td><?=$row['mobile'];?></td>
                <td><?=$row['address'];?></td>

               <!--  <td><a href="Owner_details.php?id=<?=$row['O_id'];?>">Rebot me</a>
                  <button class="btn btn-warning"  data-toggle="modal" data-target="#parking">View Parking Area</button></td> -->

              </tr>

            <?php } ?>


          	</table>
          </div>


    	 </div>
    </div>

    <?php 
      
         
              if (isset($_GET['id'])) {
                // code...
                 include "../database/database.php";
                $query="SELECT * from parking_area where O_id='".$_GET['id']."'";
                $fire=mysqli_query($conn,$query);
                $i=1;
                while ($row=mysqli_fetch_assoc($fire)) {
                  // print_r($row);


    ?>



<!-- Modal -->
<div class="modal fade" id="parking" tabindex="-1" aria-labelledby="parking" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="parking">Parking Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <div class="row">
           <div class="col-md-12">
             <span>Owner Id: </span><span> <?=$row['O_id'];?></span>
           </div>

           <div class="col-md-12">
             <span>Parking id: </span><span> <?=$row['p_id'];?></span>
           </div>

            <div class="col-md-12">
             <span>Parking Address: </span><span> <?=$row['address'];?></span>
           </div>

            <div class="col-md-12">
             <span>Area Pincode: </span><span> <?=$row['Pincode'];?></span>
           </div>

            <div class="col-md-12">
             <span>area: </span><span> <?=$row['area'];?></span>
           </div>

           <div class="col-md-12">
             <span>facilities: </span><span> <?=$row['facilities'];?></span>
           </div>
      </div>
        
      </div>
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<?php } } ?>