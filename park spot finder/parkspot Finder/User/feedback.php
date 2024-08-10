<?php 

include 'index_head.php';
 if (!isset($_SESSION)) {
       
        session_start();
        print_r($_SESSION);
        // print_r($_POST);


  }


?>
 <?php 
             
             if (isset($_SESSION['u_id'])) {
               // code...
             
            include "../database/database.php";

            $query="SELECT * from user_registration where u_id='".$_SESSION['u_id']."'";
            $fire=mysqli_query($conn,$query);
            $row=mysqli_fetch_assoc($fire);

         
 
          ?>

         

<form action="feedback.php" method="post">
        <div class="container">
          <div class="row justify-content-center">

             
          	<div class="card col-md-6 ">

          		<div class="card-header">
          			<h1>Feedback</h1>
          		</div>

          		<div class="card-body">
          			 
          			 <div class="row">
          			 	 <div class="col-md-6">
              <label class="text-dark">Name</label>
              <input type="text" name="u_name" value="<?=$_SESSION['u_name'];?>" class="form-control">
              <input type="hidden" name="u_id" value="<?=$_SESSION['u_id'];?>" class="form-control">
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
            
            <label>1.Were you satisfied with our customer serivce ?<sup style="font-size: 15px;" class="text-danger">*</sup></label>
            	<br>
               <input type="radio" name="serivce_satisfaction"  value="Very Satisfied" required> Very Satisfied<br>
               <input type="radio" name="serivce_satisfaction"  value="Satisfied"> Satisfied<br>
               <input type="radio" name="serivce_satisfaction"  value="Unsatisfied"> Unsatisfied<br>
               <input type="radio" name="serivce_satisfaction"  value="Neutral"> Neutral<br>

            </div>


            <div class="col-md-12 mt-2">
            	<label>2.How long have you used our service ?<sup style="font-size: 15px;" class="text-danger">*</sup></label><br>
            	<input type="radio"  name="service_use" value="Less than a month" required>  Less than a month<br>
            	<input type="radio"  name="service_use" value="1-6 months">  1-6 months<br>
            	<input type="radio"  name="service_use" value="1-3 year">   1-3 year<br>
            	<input type="radio"  name="service_use" value="Never Used">  Never Used<br>

            </div>

            <div class="col-md-12 mt-3">

            	<label>3.Would you use our serivce in the future ?<sup style="font-size: 15px;" class="text-danger"> *</sup></label><br>

            	<input type="radio" name="serivce_future_use" value="Definitely" required> Definitely<br>
            	<input type="radio" name="serivce_future_use" value="probably"> probably<br>
            	<input type="radio" name="serivce_future_use" value="Not Sure"> Not Sure<br>
             </div>


             <div class="col-md-12 mt-5">
            	<sup style="font-size: 20px;color: red;">
            		<input type="number" placeholder="Enter rating outoff 5" onkeyup="data()"  id="rating1" name="rating" class="" required style="font-size:15px;">*</sup><br>
            

            	 <span class="fa fa-star" id="starrating" style="color: black;"></span>
            	 <span class="fa fa-star" id="starrating1"></span>
            	 <span class="fa fa-star" id="starrating2"></span>
            	 <span class="fa fa-star" id="starrating3"></span>
            	 <span class="fa fa-star" id="starrating4"></span>	
             </div>

             <div class="col-md-12 mt-4">
             	
             	<textarea class="form-control" name="suggestion" placeholder="Any Suggestion...."></textarea>
             </div>
     
             <div class="col-md-12 mt-5">
             	<hr>
             	<p style="margin-left:400px; font-size: 20px;font-family: sans;">Thank You</p>
             	
             </div>

          	</div>

          	<div class="card-footer text-center">
          		 
          		 <button class="btn btn-success text-center">Submit</button>

          	</div>


          		</div>
          	</div>


          </div>


        </div>
</form>
         <script type="text/javascript">
         	const  rate=document.getElementById('rating1');
          		

          		function data(){
          			const star=rate.value

          			if(star==1){

          				var element=document.querySelector('#starrating').style.color="red";
		      			var element=document.querySelector('#starrating1').style.color="black";
		      			var element=document.querySelector('#starrating2').style.color="black";
		      			var element=document.querySelector('#starrating3').style.color="black";
		      			var element=document.querySelector('#starrating4').style.color="black";
          			}

          			if (star==2) {
          				var element=document.querySelector('#starrating').style.color="red";
		      			var element=document.querySelector('#starrating1').style.color="red";
		      			var element=document.querySelector('#starrating2').style.color="black";
		      			var element=document.querySelector('#starrating3').style.color="black";
		      			var element=document.querySelector('#starrating4').style.color="black";

          			}

          			if (star==3) {
          				var element=document.querySelector('#starrating').style.color="green";
		      			var element=document.querySelector('#starrating1').style.color="green";
		      			var element=document.querySelector('#starrating2').style.color="green";
		      			var element=document.querySelector('#starrating3').style.color="black";
		      			var element=document.querySelector('#starrating4').style.color="black";

          			}
          			if (star==4) {
          				var element=document.querySelector('#starrating').style.color="green";
		      			var element=document.querySelector('#starrating1').style.color="green";
		      			var element=document.querySelector('#starrating2').style.color="green";
		      			var element=document.querySelector('#starrating3').style.color="green";
		      			var element=document.querySelector('#starrating4').style.color="black";

          			}

          			if (star==5) {
          			var element=document.querySelector('#starrating').style.color="yellow";
          			var element=document.querySelector('#starrating1').style.color="yellow";
          			var element=document.querySelector('#starrating2').style.color="yellow";
          			var element=document.querySelector('#starrating3').style.color="yellow";
          			var element=document.querySelector('#starrating4').style.color="yellow";

          			}

          		}

          	
          </script>
       
        <?php } 

        // print_r($_POST);
        if (isset($_POST['rating'])) {
            
             include "../database/database.php";

           $query="INSERT INTO user_feedback(u_name, u_id, u_email, u_mobile, u_address, serivce_satisfaction, service_use, serivce_future_use, rating, suggestion) VALUES ('".$_POST['u_name']."','".$_POST['u_id']."','".$_POST['u_email']."','".$_POST['u_mobile']."','".$_POST['u_address']."','".$_POST['serivce_satisfaction']."','".$_POST['service_use']."','".$_POST['serivce_future_use']."','".$_POST['rating']."','".$_POST['suggestion']."')";

          $fire=mysqli_query($conn,$query);
          if($fire)
          {
          	echo "<script>alert('Feedback Submit Successfully..');window.location.href='index.php';</script>";
          }

        }



        ?>



