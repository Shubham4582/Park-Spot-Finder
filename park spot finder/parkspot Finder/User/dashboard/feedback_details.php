<?php  
include 'head_dashboard.php';

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
          <li class="breadcrumb-item active">Feedback Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

 <form action="feedback_details.php" method="post">
     
    <div class="container">
          <div class="row justify-content-center">

             
            <div class="card col-md-6 ">
                <?php 

                  if(isset($_SESSION['u_id'])){
                   
                  include "../../database/database.php";

                   $query="SELECT * from user_feedback where u_id='".$_SESSION['u_id']."'";
                   $fire=mysqli_query($conn,$query);
                   $row=mysqli_fetch_assoc($fire);

                    


                ?>

                <div class="card-header">
                    <h1>Feedback Details</h1>
                </div>

                <div class="card-body">
                     
                     <div class="row">
                         <div class="col-md-6">
              <label class="text-dark">Name</label>
              <input type="text" name="u_name" value="<?=$_SESSION['u_name'];?>" class="form-control">
            </div>

             <div class="col-md-6">
              <label class="text-dark">Gmail</label>
              <input type="text" name="u_email" value="<?=$row['u_email'];?>" class="form-control">
            </div>

             <div class="col-md-6">
              <label class="text-dark">Mobile</label>
              <input type="text" name="u_mobile" value="<?=$row['u_mobile'];?>" class="form-control">
            </div>
            

             <div class="col-md-6">
              <label class="text-dark">Mobile</label>
              <input type="text" name="u_address" value="<?=$row['u_address'];?>" class="form-control">
            </div>


            <div class="col-md-12 mt-3">
            
            <label>Were you satisfied with customer serivce we provided you ?<sup style="font-size: 15px;" class="text-danger">*</sup></label>
                <br>

                <p class="text-danger"><?=$row['serivce_satisfaction'];?></p class="text-danger">

               <input type="radio" name="serivce_satisfaction1"  value="Very Satisfied" required> Very Satisfied<br>
               <input type="radio" name="serivce_satisfaction1"  value="Satisfied"> Satisfied<br>
               <input type="radio" name="serivce_satisfaction1"  value="Unsatisfied"> Unsatisfied<br>
               <input type="radio" name="serivce_satisfaction1"  value="Neutral"> Neutral<br>

            </div>


            <div class="col-md-12 mt-2">
                <label>How long have you used our service <sup style="font-size: 15px;" class="text-danger">*</sup></label><br>

                <p class="text-danger"><?=$row['service_use'];?></p>


                <input type="radio"  name="service_use" value="Less than a month" required>  Less than a month<br>
                <input type="radio"  name="service_use" value="1-6 months">  1-6 months<br>
                <input type="radio"  name="service_use" value="1-3 year">   1-3 year<br>
                <input type="radio"  name="service_use" value="Never Used">  Never Used<br>

            </div>

            <div class="col-md-12 mt-3">

                <label>Would you use our serivce in the future <sup style="font-size: 15px;" class="text-danger"> *</sup></label><br>

                <p class="text-danger"><?=$row['serivce_future_use'];?></p>


                <input type="radio" name="serivce_future_use" value="Definitely" required> Definitely<br>
                <input type="radio" name="serivce_future_use" value="probably"> probably<br>
                <input type="radio" name="serivce_future_use" value="Not Sure"> Not Sure<br>
             </div>


             <div class="col-md-12 mt-5">
                <!-- <sup style="font-size: 20px;color: red;">
                    <input type="number" placeholder="Enter your rating" onkeyup="data()"  id="rating1" name="rating" class="" required>*</sup> -->
                    <label>rating:</label><input type="text" name="rating">

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







             <div class="col-md-12 mt-4">
                
              <label>suggestion</label>
              <input type="text" name="suggestion" value="<?=$row['suggestion'];?>">
             </div>
     

            </div>

            <div class="card-footer text-center">
                 
                 <a href=""><button class="btn btn-success text-center">Submit</button></a>

            </div>


                </div>
            </div>
  <?php } ?>

          </div>


        </div>
</form>

<?php 
  
  print_r($_POST);

  if (isset($_POST['serivce_satisfaction1'])) {
    
     include "../../database/database.php";

     $query="UPDATE user_feedback SET serivce_satisfaction='".$_POST['serivce_satisfaction1']."',service_use='".$_POST['service_use']."',serivce_future_use='".$_POST['serivce_future_use']."',rating='".$_POST['rating']."',suggestion='".$_POST['suggestion']."' WHERE u_id='".$_SESSION['u_id']."'";

     $fire=mysqli_query($conn,$query);
     if ($fire) {
         
         echo "<script>alert('data Updated Succesfully...');window.location.href='feedback_details.php'</script>";
     }

     else{
        echo "errpr";
     }


 

  }


?>