<?php 
include('head.php');

?>


<head>
  <style type="text/css">
    .name{
      font-weight: bold;
      color: black;
    }
  </style>
</head>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Feedback Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <div class="container">
      <div class="row">
        <?php 
           
           include "../database/database.php";
                $query="SELECT * from user_feedback";
                $fire=mysqli_query($conn,$query);
                $i=1;
                while ($row=mysqli_fetch_assoc($fire)) {

        ?>

        <div class="card col-md-4">
            <div class="card-header">
               <span class="name">Name:</span><span> <?=$row['u_name'];?></span><br>
               <span class="name">Email:</span><span> <?=$row['u_email'];?></span><br>
               <span class="name">Mobile:</span><span> <?=$row['u_mobile'];?></span><br>
               <span class="name">Address:</span><span> <?=$row['u_address'];?></span><br>
            </div>

            <div class="card-body">
             <div class="row">
                  
                   <div class="col-md-12 mt-2">
                      <label>Were you satisfied with customer serivce we provided you </label>
                      <h5 class="text-danger"><?=$row['serivce_satisfaction'];?></h5>
                   </div><hr>


                      <div class="col-md-12">
                      <label>How long have you used our service </label>
                      <h5 class="text-danger"><?=$row['service_use'];?></h5>
                   </div><hr>

                      <div class="col-md-12">
                      <label>Would you use our serivce in the future </label>
                      <h5 class="text-danger"><?=$row['serivce_future_use'];?></h5>
                   </div><hr>

                   <div class="col-md-12">
                      <label> suggestion </label>
                      <h5 class="text-danger"><?=$row['suggestion'];?></h5>
                   </div><hr>

                    <div class="col-md-12">
                      <label>Rating </label>
                               

                    <?php 

                      
                      if ($row['rating']==1) {
                          
                    ?>
                
                 <span class="fa fa-star" style="color: red;"></span>
                 <span class="fa fa-star" ></span>
                 <span class="fa fa-star"></span>
                 <span class="fa fa-star"></span>
                 <span class="fa fa-star"></span>  

             <?php }
               if($row['rating']==2) {
 
                          
             ?>
                 <span class="fa fa-star" style="color: red;"></span>
                 <span class="fa fa-star" style="color: red;"></span>
                 <span class="fa fa-star"></span>
                 <span class="fa fa-star"></span>
                 <span class="fa fa-star"></span>  

             <?php }  if($row['rating']==3) { ?>


          
                 <span class="fa fa-star" style="color: green;"></span>
                 <span class="fa fa-star" style="color: green;"></span>
                 <span class="fa fa-star" style="color:green;"></span>
                 <span class="fa fa-star"></span>
                 <span class="fa fa-star"></span>  

             <?php } if($row['rating']==4) { ?>


                 <span class="fa fa-star" style="color: green;"></span>
                 <span class="fa fa-star" style="color: green;"></span>
                 <span class="fa fa-star" style="color:green;"></span>
                 <span class="fa fa-star" style="color:green;"></span>
                 <span class="fa fa-star"></span>  

             <?php } if($row['rating']==5) { ?>


            
                 <span class="fa fa-star" style="color: yellow;"></span>
                 <span class="fa fa-star" style="color: yellow;"></span>
                 <span class="fa fa-star" style="color:yellow;"></span>
                 <span class="fa fa-star" style="color:yellow;"></span>
                 <span class="fa fa-star" style="color:yellow;"></span>  

             <?php } ?>



                     </div>




             </div>

            </div>
        </div>

   <?php } ?>

      </div>
    </div>