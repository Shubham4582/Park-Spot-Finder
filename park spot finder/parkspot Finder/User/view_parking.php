<?php 

 if (!isset($_SESSION)) {
       
        session_start();
       // print_r($_SESSION);
        // print_r($_POST);


  }
  include 'index_head.php';

?>

<?php 

   
                include "../database/database.php";

                $query="SELECT * from  parking_area";
                $fire=mysqli_query($conn,$query);
                $i=1;
                while ($row=mysqli_fetch_assoc($fire)) {


?>

<form action="slot.php" method="post">
<div class="container">
<div class="row">

 <div class="col-md-3">
  <div class="card ">
         <div class="card-header  bg-danger"> 
             <h3><?=$row['address'];?></h3>
             <input type="hidden" name="O_id" value="<?=$row['O_id'];?>">
          </div>

          <div class="card-body">
                 <span>Pincode: <?=$row['Pincode'];?></span><br><hr>
                 <span>Area: <?=$row['area'];?></span><br><hr>
                 <span>Facilities: <?=$row['facilities'];?></span><br>

          </div>
          <div class="card-footer">
               <a href="slot.php?id=<?=$row['address'];?>"><button>view</button></a>
          </div>
  </div>
  </div>

</div> 
</div>
     </form>

<?php } ?>

        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

<?php 

print_r($_POST);


?>