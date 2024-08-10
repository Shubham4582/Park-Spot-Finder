<?php 

 if (!isset($_SESSION)) {
       
        session_start();
       // print_r($_SESSION);
        print_r($_POST);
        // print_r($_GET);


  }
  include 'index_head.php';

?>
    
  
     
<div class="container">
       <div class="row">

              <div class="col-md-12"> 
                
                <h1 class="text-center">slot Details</h1>
              </div>

              <?php 
      include "../database/database.php";


       $query="SELECT * from parking_slot where O_id='".$_POST['O_id']."'";

        $fire=mysqli_query($conn,$query);

         while ($row=mysqli_fetch_assoc($fire)) {


              ?>
       <div class="col-md-4">
         <div class="card">

        <div class="card-header bg-success text-white">
          <h3>Slot No:<?=$row['slot_no'];?>
           <input type="hidden" name="s_id" value="<?=$row['s_id'];?>"> </h3>
           <input type="hidden" name="O_id" value="<?=$row['O_id'];?>"> </h3>
        </div>

        <div class="card-body">
          <span class="title">Status:</span> <span><?=$row['status'];?>
           <br>
          </span>
          <hr>
          <span class="title">Charge:</span> <span><?=$row['charge'];?></span>
          <hr>

          <span class="title">Slot type:</span> <span><?=$row['slot_type'];?><br><br>
          </span>
          <hr>
          <span class="title">Available Space:</span> <span><?=$row['Available_Space'];?></span>
          <hr>
        </div>

        <div class="card-footer text-center">
          <a href="booking.php?slot_id=<?=$row['s_id'];?>"><button class="btn btn-warning">Book</button></a>
         
        </div>

      </div>
  </div>
 
 <?php } ?>


              </div>
       </div>
</div>



        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>
