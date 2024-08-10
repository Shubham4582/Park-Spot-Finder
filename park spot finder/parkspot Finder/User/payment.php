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

     $query="SELECT * from parking_booking where u_id='".$_SESSION['u_id']."' AND slot_id='".$_GET['sid']."'";
      $fire=mysqli_query($conn,$query);

       if($row=mysqli_fetch_assoc($fire));
              // echo "<pre>";
        // print_r($row);
       
       


 ?>
 <head>
   <style type="text/css">
     .input{
      border: none;
    
     }
     .input1{
      width: 400px;
      border: none;

     }
   </style>
   <link rel="stylesheet" type="text/css" href="payment.css">
 </head>

 
 <form action="payment.php" method="post"> 

<div class="container">
  <div id="Checkout" class="inline">
      <h1>Pay Invoice</h1>
      <div class="card-row">
          <span class="visa"></span>
          <span class="mastercard"></span>
          <span class="amex"></span>
          <span class="discover"></span>
      </div>
      <form>

         <div class="row">
                
                <div class="col-md-12">
                       <label class="ml-3">Name:</label>
               <input type="text" class="input" name="u_name" value="<?=$_SESSION['u_name'];?>" readonly>
               <input type="hidden" class="input" name="u_id" value="<?=$_SESSION['u_id'];?>" readonly>
               <input type="hidden" class="input" name="b_id" value="<?=$row['b_id'];?>" readonly>
                </div>

                <div class="col-md-12">
                       <label class="ml-3">Spot Address:</label>
               <input type="text" class="input1" name="address" value="<?=$row['address'];?>" readonly>

                </div>

                <div class="col-md-12">
                       <label class="ml-3">Slot No:</label>
               <input type="text" class="input" name="slot_no" value="<?=$row['slot_no'];?>" readonly>

                </div>


                   <div class="col-md-12">
                       <label class="ml-3">b_date:</label>
               <input type="text" class="input" name="Departure_time" value="<?=$row['b_date'];?>" readonly>

                </div>


                 <div class="col-md-5">
                       <label class="ml-3">Ariving time:</label>
               <input type="text" class="input ml-3" name="Ariving_time" value="<?=$row['Ariving_time'];?>" readonly>

                </div>

                   <div class="col-md-7">
                       <label class="ml-3">Departure time:</label>
               <input type="text" class="input ml-3" name="Departure_time" value="<?=$row['Departure_time'];?>" readonly>



         </div>
<br>


          <div class="form-group">
              <label for="PaymentAmount" class="ml-4">Payment amount</label>
              <div class="amount-placeholder">
                  <span class="ml-5">Rs.</span>
               <input type="text" class="input" name="charge" value="<?=$row['charge'];?>" readonly>

                 
              </div>
          </div>
          <div class="form-group">
              <label or="NameOnCard" class="">Name on card</label>
              <input  name="cardname" class="form-control" type="text"></input>
          </div>
          <div class="form-group">
              <label for="CreditCardNumber" class="ml-4">Card number</label>
              <input  style="margin-left: 30px;" name="cardno" class="form-control" type="text"></input>
          </div>
          <div class="expiry-date-group form-group">
              <label for="ExpiryDate" style="margin-left:50px">Expiry date</label>
              <input style="margin-left:50px" name="expiry_date" class="form-control" type="text" placeholder="MM / YY"></input>
          </div>
          <div class="security-code-group form-group">
              <label for="SecurityCode" style="margin-left:30px">Security code</label>
              <div class="input-container" >
                  <input style="margin-left:30px" name="security_code" class="form-control" type="password" ></input>
                  <i id="cvc" class="fa fa-question-circle"></i>
              </div>
              <!-- <div class="cvc-preview-container two-card hide">
                  <div class="amex-cvc-preview"></div>
                  <div class="visa-mc-dis-cvc-preview"></div>
              </div> -->
          </div>
          <div class="zip-code-group form-group">
              <label for="ZIPCode" style="margin-left:50px">ZIP/Postal code</label>
              <div class="input-container">
                  <input style="margin-left:50px" name="ZIPCode" class="form-control" type="text"></input>
              
              </div>
          </div>
          <button id="PayButton" class="btn btn-block btn-success submit-button" type="submit">
              <span class="submit-button-lock"></span>
              <span class="align-middle">Pay RS.<?=$row['charge'];?>.00</span>
          </button>
      </form>
  </div>
</div>
 
</form>

 </div>







        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <script type="text/javascript">
         $(function () {
  $('[data-toggle="popover"]').popover();
  
  $('#cvc').on('click', function(){
    if ( $('.cvc-preview-container').hasClass('hide') ) {
      $('.cvc-preview-container').removeClass('hide');
    } else {
      $('.cvc-preview-container').addClass('hide');
    }    
  });
  
  $('.cvc-preview-container').on('click', function(){
    $(this).addClass('hide');
  });
});
  </script>

<?php 
// include "footer.php";
print_r($_POST);
    
     if (isset($_POST['cardno'])) {
       // code...
     
    include "../database/database.php";

     $query="INSERT INTO payment(u_name, u_id,b_id, address, slot_no, Ariving_time, Departure_time,b_date, charge,cardname, cardno, expiry_date, security_code, ZIPCode) VALUES ('".$_POST['u_name']."','".$_POST['u_id']."','".$_POST['b_id']."','".$_POST['address']."','".$_POST['slot_no']."','".$_POST['Ariving_time']."','".$_POST['Departure_time']."','".$_POST['b_date']."','".$_POST['charge']."','".$_POST['cardname']."','".$_POST['cardno']."','".$_POST['expiry_date']."','".$_POST['security_code']."','".$_POST['ZIPCode']."')";
      $fire=mysqli_query($conn,$query);

      if($fire)
      {
        echo "<script>alert('payment successfully.');</script>";
        echo "<script>alert('booking Under Verfication......');window.location.href='index.php';</script>";
      }

    }



?>