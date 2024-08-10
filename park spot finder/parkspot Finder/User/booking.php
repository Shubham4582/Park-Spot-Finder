
<?php 

 if (!isset($_SESSION)) {
       
        session_start();
       // print_r($_SESSION);
        // print_r($_POST);


  }
  include "index_head.php";

?>



        <!-- booking data -->

        <?php 
          
          if (isset($_GET['slot_id'])) {
              include "../database/database.php";
           
            $query="SELECT * from parking_slot WHERE s_id='".$_GET['slot_id']."'";
            
            $fire=mysqli_query($conn,$query);
             $row=mysqli_fetch_assoc($fire);
                
               
         ?>
         <div class="container">

         <div class="row">

          <div class="col-md-6">

<form action="booking.php" method="post" enctype="multipart/form-data"> 
                 <div class="card  justify-content-center">
                   
                   <!-- <div class="modal-dailog"> -->
                     <!-- <div class="modal-content"> -->
                       
                        <div class="card-header">
                          <h3 class="text-center">Book Parking</h3>

                        </div>

                        <div class="card-body">
                              
                           <div class="row">
                           
                             <div class="col-md-12">
                               <label class="text-dark">User Name</label>
                               <input type="text" name="u_name" value="<?=$_SESSION['u_name'];?>" class="form-control" readonly>
                             </div>

                              <div class="col-md-6">
                               <label class="text-dark">User ID</label>
                               <input type="text" name="u_id" value="<?=$_SESSION['u_id'];?>" class="form-control" readonly>
                             </div>


                              <div class="col-md-6">
                               <label class="text-dark">Spot Address</label>
                               <input type="text" name="address" value="<?=$row['address'];?>" class="form-control" readonly>
                               <input type="hidden" name="O_id" value="<?=$row['O_id'];?>" class="form-control" readonly>
                             </div>


                                
                                 <div class="col-md-6">
                               <label class="text-dark">Slot No</label>
                               <input type="hidden" name="s_id" value="<?=$row['s_id'];?>" class="form-control" >
                              
                               <input type="text" name="slot_no" value="<?=$row['slot_no'];?>" class="form-control" readonly>
                             </div>

                            <div class="col-md-6">
                               <label class="text-dark">Charge</label>
                               <input type="text" name="charge" value="<?=$row['charge'];?>" class="form-control" readonly>
                             </div>


                              <div class="col-md-6">
                               <label class="text-dark">Vehicle No</label>
                               <input type="text" name="vehicle_no" class="form-control" required>
                             </div>
                             

                              <div class="col-md-6">
                               <label class="text-dark">Booking Date</label>
                               <input type="date" name="b_date" class="form-control" required>
                             </div>
                            
                            

                              <div class="col-md-6">
                               <label class="text-dark">RC Book Image</label>
                               <input type="file" name="RC" class="form-control" required>
                             </div>

                              <div class="col-md-6">
                               <label class="text-dark">License Image</label>
                               <input type="file" name="license" class="form-control" required>
                             </div>

                             

                              <div class="col-md-6">
                               <label class="text-dark">Ariving time</label>
                               <input type="time" name="Ariving_time"  class="form-control" required>
                             </div>

                               <div class="col-md-6">
                               <label class="text-dark">Departure time</label>
                               <input type="time"  name="Departure time" class="form-control" required>
                             </div>

                                           
                            </div> <!--row close -->
                          </div>
                        <div class="card-footer">
                        <div class="col-md-12">
                         <!-- <a style="color: white;" href="payment.php?sid=<?=$row['s_id']?>" > <button style="background-color:mediumpurple;color: darkred;width:450px;" class="btn"> submit</button></a> -->
                         <button class="btn" style="background-color:mediumpurple;color: white;width:450px;">SUBMIT</button>
                        </div>
                      
                        </div>


                   <!--   </div>
                   </div> -->
                   
                 </div>
                   </form>
                 </div>


            


         </div></div>

               <?php }
              
               //     echo "<pre>";

               //    // print_r($_POST);
               //     // print_r($_FILES);
                  include "../database/database.php";

                    
                   function image($name,$size,$temp,$path)
                      {
                      $ext=explode(".",$name);
                      $a=rand(1,9999)."-parking_booking.".$ext[count($ext)-1];
                      move_uploaded_file($temp,"$path".$a);
                      return $a;

                      }

                   if (isset($_POST['vehicle_no'])) {
                  $conn = mysqli_connect('localhost:3307','root','','parkspot');
                      
                        $name=$_FILES['RC']['name'];
                        $size=$_FILES['RC']['size'];
                        $tmp=$_FILES['RC']['tmp_name'];
                        $path="../admin/assests/";
                        $RC=image($name,$size,$tmp,$path);

                         $name=$_FILES['license']['name'];
                        $size=$_FILES['license']['size'];
                        $tmp=$_FILES['license']['tmp_name'];
                        $path="../admin/assests/";
                        $license=image($name,$size,$tmp,$path);

                    $s_id=$_POST['s_id'];

                   $query="INSERT INTO parking_booking(u_id, slot_id,slot_no, charge,address,O_id, Vehicle_No, b_date, RC, license, Ariving_time, Departure_time) VALUES ('".$_POST['u_id']."','".$s_id."','".$_POST['slot_no']."','".$_POST['charge']."','".$_POST['address']."','".$_POST['O_id']."','".$_POST['vehicle_no']."','".$_POST['b_date']."','".$RC."','".$license."','".$_POST['Ariving_time']."','".$_POST['Departure_time']."')";

                    $fire=mysqli_query($conn,$query);

                    if ($fire) {
                       echo "<script>alert('Parking SLot Booking Successfully...!');window.location.href='payment.php?sid=$s_id';</script>";
                    }
                    else{
                      echo "error";
                    }


               }
                ?>
      
    </div>





        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  