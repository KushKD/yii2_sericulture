<?php
   /* @var $this \yii\web\View */
   /* @var $content string */
   
  
   use yii\helpers\Html;
   ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
   <head>
      <meta charset="<?= Yii::$app->charset ?>">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php $this->registerCsrfMetaTags() ?>
      <title><?= Html::encode($this->title) ?></title>
      <?php $this->head() ?>
  
  
   <script>
    //addCooconProduction
    var countClicks = 0;







//Adding the Data Cell
function addCooconProduction() {

//validateFields();
if (true) {
	countClicks++;
	if (countClicks == 1) {

   // year, quantity of seed, Quantity of Green Coocons, Rate, Total Amount

		var html = "";
		html += "<table id='parameterTable' class='table table-hover table-bordered' style='width:100%''>";
		html += "<thead> ";
		html += "<td class='text-center' style='width:5%;color:black;padding:10px;'>S.No</td> ";
		html += "<td class='text-center' style='width:15%;color:black;padding:10px;'> Year </td>";
		html += "<td class='text-center' style='width:15%;color:black;padding:10px;'> Quantity of seed reared (ounce)</td>";
	//	html += "<td class='text-center' style='width:5%;background-color: darkcyan ; color:white;padding:10px;'></td> ";
		html += "<td class='text-center'style='width:10%;color:black;padding:10px;'>Quantity of Green Coocons Harvested (kg) </td>";
	//	html += "<td class='text-center' style='width:5%;background-color: grey ; color:white;padding:10px;'></td>";
		html += "<td class='text-center'style='width:10%;color:black;padding:10px;'>Rate (Rs)/Spring Crop</td>";
		html += "<td class='text-center' style='width:10%; color:black;padding:10px;'>Total Amount</td> ";
		html += "<td class='text-center' style='width:10%;color:black; padding:10px;'>Remove</td>";
		html += "</thead>";
		html += "<tr>";
		html += "<td class='text-center' style='width:5%'>1</td> ";
		html += "<td style='width:15%'><input class=' form-control' readonly type='text' id='coocon_year_' /></td>";
		html += "<td style='width:15%;'><input class=' form-control' readonly type='text' id='coocon_seed_quantity_' /></td>";
	//	html += "<td class='text-center' style='width:5%; background-color: darkcyan ; color:white' >></td>";
		html += "<td style='width:10%'><input class=' form-control ' onkeypress='return isNumberKey(event);' type='text' id='green_coocon_harvested_' /></td> ";
	//	html += "<td class='text-center' style='width:5% ; background-color: grey ; color:white' ><=</td> ";
		html += "<td style='width:10%'><input class=' form-control ' onkeypress='return isNumberKey(event);' type='text' id='rate_spring_crop_' /></td> ";
    html += "<td style='width:10%'><input class=' form-control ' onkeypress='return isNumberKey(event);' type='text' id='amount_realized_' /></td> ";


		html += "<td style='width:10%'><a onclick='deleteRow(this)' id='delPOIbutton' class='btn btn-info'> Remove </a></td> ";
		html += "</tr>";
		html += "</table>";
		document.getElementById("coocon_table").innerHTML = html;
		coocon_year_.value = document.getElementById('coocon_year').selectedOptions[0].text;
    coocon_seed_quantity_.value = document.getElementById('coocon_seed_quantity').value;
    green_coocon_harvested_.value = document.getElementById('green_coocon_harvested'). value;
    rate_spring_crop_.value = document.getElementById('rate_spring_crop').value;
    amount_realized_.value = document.getElementById('amount_realized').value;
	//	coocon_year_.innerHTML = document.getElementById('coocon_year').value;
   // alert(coocon_year_.innerHTML);
	//	parameter_id.value = document.getElementById('parameter').value;

	} else {
//checking goes here
//alert("Alert for countClicks" + countClicks);
//checkParameterID();
insRow();
}
}

}

function insRow() {

var x = document.getElementById('parameterTable');
var new_row = x.rows[1].cloneNode(true);
var len = x.rows.length;
new_row.cells[0].innerHTML = len;

var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
inp1.id += len;
inp1.value = document.getElementById('coocon_year').selectedOptions[0].text;
inp1.innerHTML = document.getElementById('coocon_year').value;


var inpx = new_row.cells[2].getElementsByTagName('input')[0];
inpx.id += len;
inpx.value = document.getElementById('coocon_seed_quantity').value;
inpx.innerHTML = document.getElementById('coocon_seed_quantity').value;


var inp2 = new_row.cells[3].getElementsByTagName('input')[0];
inp2.id += len;
inp2.value = document.getElementById('green_coocon_harvested').value; 
inp2.innerHTML = document.getElementById('green_coocon_harvested').value;

var inp3 = new_row.cells[4].getElementsByTagName('input')[0];
inp3.id += len;
inp3.value = document.getElementById('rate_spring_crop').value;
inp3.innerHTML = document.getElementById('rate_spring_crop').value;


var inp4 = new_row.cells[5].getElementsByTagName('input')[0];
inp4.id += len;
inp4.value =  document.getElementById('amount_realized').value;
inp4.innerHTML = document.getElementById('amount_realized').value;


x.appendChild(new_row);
}

function deleteRow(row) {
var i = row.parentNode.parentNode.rowIndex;
document.getElementById('parameterTable').deleteRow(i);

countClicks--;

}



   </script>
   
   
   
   
   
   
   
   </head>







   <body>
      <?php $this->beginBody() ?>

 <div>
          <h1><i class="fa fa-dashboard"></i> Sericulture Common Application Form</h1>
          <p>Common Application Form For Seeking Assistance Support For Promotion Of Sericulture Indrustry In Himachal Pradesh</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>




      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Personal Details</h3>
            <hr>
            <div class="tile-body">

             
             <!-- ROW ONE -->
              <div class="row">
                <div class="form-group col-md-4">
                  <label class="control-label">Father/Husband Name</label>
                  <input class="form-control" type="text" id="father_husband_name" name="UserProfile[user_husband_name]">
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Age</label>
                  <input class="form-control" type="text" id="age" >
                </div>

                 <div class="form-group col-md-4">
                  <label class="control-label">Annual Income</label>
                  <input class="form-control" type="text" id="annual_income" >
                </div>

                </div>
              <!-- Row One Ends Here -->  

              <!-- ROW TWO -->
                <div class="row">
                <div class="form-group col-lg-4">
                    <label for="exampleSelect1">Gender</label>
                    <select class="form-control" id="gender">
                      <option value="M" >Male</option>
                      <option value="F" >Female</option>
                      <option value="O" >Other</option>
                    </select>
                  </div>


                   <div class="form-group col-lg-4">
                    <label for="exampleSelect1">Caste</label>
                    <select class="form-control" id="caste">
                      <option value="GEN" >General</option>
                      <option value="SC" >SC</option>
                      <option value="ST" >ST</option>
                      <option value="OBC" >OBC</option>
                    </select>
                  </div> 
                  
                  
                  <div class="form-group col-lg-4">
                    <label for="exampleSelect1">Education Qualification</label>
                    <select class="form-control" id="education_qualification">
                      <option value="MET" >Matriculation</option>
                      <option value="HSE" >Senior Secondary</option>
                      <option value="GRAD" >Graduation</option>
                      <option value="PGRAD" >Post Gradualtion</option>
                      <option value="DPH" >Diploma</option>
                    </select>
                  </div>



                </div>
                <!-- Row Two Ends Here -->


                <!-- ROW THREE -->
                 <div class="row">
                <div class="form-group col-md-4">
                  <label class="control-label"> Occupation</label>
                  <input class="form-control" type="text" id="occupation">
                </div>

                <div class="form-group col-lg-4">
                    <label for="district">District</label>
                    <select class="form-control" id="district" name="">
                      <option value="" >Select District</option>
                      <?php
                       if(!empty($distt))
                        foreach($distt as $dist)
                          echo "<option value='".$dist->district_id."'>".$dist->distric_name."</option>";  
                      ?>
                     
                     
                      
                     
                    </select>
                  </div>
               
               
                <div class="form-group col-lg-4">
                    <label for="tehsil">Tehsil</label>
                    <select class="form-control" id="tehsil">
                      <option value="" >Select Tehsil</option>
                     
                    </select>
                  </div>

                  </div>
				<!-- ROW Three Ends Here -->



                    <!-- ROW FOUR -->
                   <div class="row">
                   <div class="form-group col-lg-4">
                    <label for="village">Village</label>
                    <select class="form-control" id="village">
                      <option value="" >Select Village</option>
                     
                    </select>
                  </div>


                <div class="form-group col-lg-4">
                    <label for="po">Post Office</label>
                    <select class="form-control" id="p0st_office">
                      <option value="" >Select Post Office</option>
                     
                    </select>
                  </div>
               
               
                  <div class="form-group col-md-4">
                  <label class="control-label"> Pin Code</label>
                  <input class="form-control" type="text" id="pin_code">
                </div>

               </div>
					<!-- ROW four ends Here -->


          <!-- Row  Five Starts Here -->
                <div class="row">
               <div class="form-group col-md-4">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" rows="3"></textarea>
                  </div>
                  </div>       
          <!-- Row  Five Starts Here -->
               

            </div>
          
          </div>
        </div>

		</div>
      


	  <!-- Bank  Details -->
        <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Bank Details</h3>
            <hr>
            <div class="tile-body">

            
             <!-- ROW ONE -->
              <div class="row">
                <div class="form-group col-md-4">
                  <label class="control-label">Bank Name</label>
                  <input class="form-control" type="text" id="bank_name">
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Account Number</label>
                  <input class="form-control" type="text" id="account_number">
                </div>

                 <div class="form-group col-md-4">
                  <label class="control-label">IFSC Code</label>
                  <input class="form-control" type="text" id="ifsc_code">
                </div>

                </div>
              <!-- Row One Ends Here -->  

              <!-- ROW TWO -->
                    <div class="row">
                      <div class="form-group col-md-4">
                      <label class="control-label">Account Holder Name </label>
                      <input class="form-control" type="text" id="account_holder_name">
                      </div>


                      <div class="form-group col-md-4">
                      <label class="control-label">Account Type </label>
                      <input class="form-control" type="text" id="account_type">
                      </div>


                      <div class="form-group col-md-4">
                      <label for="address">Bank Address</label>
                      <textarea class="form-control" id="address" rows="3" id="bank_address"></textarea>
                      </div>
                      </div>
                <!-- Row Two Ends Here -->
            </div>
          
          </div>
        </div>
		</div>
        <!-- Bank Details -->





<!-- Status of Land -->
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Status of Land</h3>
            <hr>
            <div class="tile-body">

            
             <!-- ROW ONE -->
              <div class="row">
                <div class="form-group col-md-4">
                  <label class="control-label">Total Land (In Acers)</label>
                  <input class="form-control" type="text" id="total_land" >
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Irrigated Land (In Acers)</label>
                  <input class="form-control" type="text" id="irrigated_land" >
                </div>

                 <div class="form-group col-md-4">
                  <label class="control-label">Rain Fed (In Acers)</label>
                  <input class="form-control" type="text" id="rain_fed" >
                </div>

                </div>
              <!-- Row One Ends Here -->  

              <!-- ROW TWO -->
                    <div class="row">
                      <div class="form-group col-md-4">
                      <label class="control-label">Land available for Mulberry Plantation (In Acers) </label>
                      <input class="form-control" type="text" id="mulberry_land" >
                      </div>



                      </div>
                <!-- Row Two Ends Here -->
            </div>
          
          </div>
        </div>
		</div>
        <!-- Status Of Land Ends  -->

        



<!-- Existing Mulberry Plantation -->
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Existing Mulberry Plantation</h3>
            <hr>
            <div class="tile-body">

            
             <!-- ROW ONE -->
              <div class="row">
                <div class="form-group col-md-4">
                  <label class="control-label">1-3 Years</label>
                  <input class="form-control" type="text" id="one_to_three" >
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">3-5 Years</label>
                  <input class="form-control" type="text" id="three_to_five" >
                </div>

                 <div class="form-group col-md-4">
                  <label class="control-label">5-10 Years</label>
                  <input class="form-control" type="text" id="five_to_ten" >
                </div>

                </div>
              <!-- Row One Ends Here -->  

              <!-- ROW TWO -->
                    <div class="row">
                      <div class="form-group col-md-4">
                      <label class="control-label">More than 10 years</label>
                      <input class="form-control" type="text" id="more_than_ten" >
                      </div>

                       <div class="form-group col-md-4">
                      <label class="control-label">Total Number</label>
                      <input class="form-control" type="text" id="total_number" >
                      </div>



                      </div>
                <!-- Row Two Ends Here -->
            </div>
          
          </div>
        </div>
		</div>
        <!-- Existing Mulberry Plantation   -->

        




<!-- Existing Rearing Space Available -->
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Existing Rearing Space Available</h3>
            <hr>
            <div class="tile-body">

            
             <!-- ROW ONE -->
              <div class="row">
                <div class="form-group col-md-4">
                  <label class="control-label">Rearing House (Dwelling/Seperate)</label>
                  <input class="form-control" type="text" id="rearing_house" >
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Kacha/Pakka House/ Shed</label>
                  <input class="form-control" type="text"  id="kacha_pakka_house" >
                </div>

                 <div class="form-group col-md-4">
                  <label class="control-label">Area Of House Shed</label>
                  <input class="form-control" type="text" id="area_house_shed" >
                </div>

                </div>
              <!-- Row One Ends Here -->  

            </div>
          
          </div>
        </div>
		</div>
        <!-- Existing Rearing Space Available  -->




      <!-- Coocon Production -->

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Coocon Production</h3>
            <hr>
            <div class="tile-body">

            
             <!-- ROW ONE -->
              <div class="row">
                <div class="form-group col-md-4">
                  <label class="control-label"> Year   </label>
                  <select class="form-control" id="coocon_year">
                      <option value="" >Select Year</option>
                      <option value="2012" >2012</option>
                      <option value="2013" >2013</option>
                      <option value="2014" >2014</option>
                      <option value="2015" >2015</option>
                      <option value="2016" >2016</option>
                      <option value="2017" >2017</option>
                      <option value="2018" >2018</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Quantaty of Seed reared (Ounce)</label>
                  <input class="form-control" type="text" id="coocon_seed_quantity" >
                </div>

                 <div class="form-group col-md-4">
                  <label class="control-label">Quantity of Green Cooons Harvested (In KG)</label>
                  <input class="form-control" type="text" id="green_coocon_harvested" >
                </div>

                </div>
              <!-- Row One Ends Here -->  

              <!-- ROW TWO -->
                    <div class="row">
                      <div class="form-group col-md-4">
                      <label class="control-label">Rate (Rs)/ Spring Crop</label>
                      <input class="form-control" type="text" id="rate_spring_crop" >
                      </div>


 <div class="form-group col-md-4">
                      <label class="control-label">Total Amount Realized (Rupees)</label>
                      <input class="form-control" type="text" id="amount_realized" >
                      </div>
                      

                       <!-- <div class="form-group col-md-4">
                    <label class="control-label">Total Amount Realized (Rupees)</label>
                    <div class="form-group">
                      <label class="sr-only" >Total Amount Realized (Rupees)</label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">
                        <i class="fas fa-rupee-sign"></i></span></div>
                        <input class="form-control" id="amount_realized" type="text" >
                        <div class="input-group-append"><span class="input-group-text">.00</span></div>
                      </div>
                    </div>
                  </div> -->

 <div class="bs-component" style="margin-top:30px;">
                      <button class="btn btn-primary btn-sm" onclick="addCooconProduction();" type="button">Add</button>
</div>


                      </div>
                <!-- Row Two Ends Here -->

                 <!-- Row Three Ends Here -->
                  <div class="row">
                  <div class="col-lg-12" id="coocon_table"></div>
                  </div>
                   <!-- Row Three Ends Here -->

            </div>
          
          </div>
        </div>
		</div>
      <!-- Coocon Production -->




        <!--Silkworm Production -->
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Silkworm Production </h3>
            <hr>
            <div class="tile-body">

            
             <!-- ROW ONE -->
              <div class="row">
                <div class="form-group col-md-4">
                  <label class="control-label">Total Experience in silkworm rearing (Years)</label>
                  <input class="form-control" type="text" id="silkworm_experience" >
                </div>
               

                </div>
              <!-- Row One Ends Here -->  

            </div>
          
          </div>
        </div>
		</div>
        <!--Silkworm Production  -->


       

<!-- Particifation in Sericulture Training Programme (If any attach Cirtificate) -->
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Particifation in Sericulture Training Programme (If any attach Cirtificate)</h3>
            <hr>
            <div class="tile-body">

            
             <!-- ROW ONE -->
              <div class="row">
                <div class="form-group col-md-4">
                  <label class="control-label">Type Of Training </label>
                  <input class="form-control" type="text" id="training_type" >
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Duration</label>
                  <input class="form-control" type="text" id="duration" >
                </div>

                 <div class="form-group col-md-4">
                  <label class="control-label">Subject</label>
                  <input class="form-control" type="text"  id="subject" >
                </div>

                </div>
              <!-- Row One Ends Here -->  

              <!-- ROW TWO -->
                    <div class="row">
                      <div class="form-group col-md-4">
                      <label class="control-label">Agency</label>
                      <input class="form-control" type="text" id="agency" >
                      </div>

                       <div class="form-group col-md-4">
                      <label class="control-label">Upload Certificate</label>
                      <input class="form-control" type="file" id="upload_certificate" >
                      </div>



                      </div>
                <!-- Row Two Ends Here -->
            </div>
          
          </div>
        </div>
		</div>
        <!-- Particifation in Sericulture Training Programme (If any attach Cirtificate)  -->







<!-- Family Size -->
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Family Size</h3>
            <hr>
            <div class="tile-body">

            
             <!-- ROW ONE -->
              <div class="row">
                <div class="form-group col-md-4">
                  <label class="control-label">Male</label>
                  <input class="form-control" type="text" id="male" >
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Female</label>
                  <input class="form-control" type="text" id="female">
                </div>

                 <div class="form-group col-md-4">
                  <label class="control-label">Children</label>
                  <input class="form-control" type="text" id="children" >
                </div>

                </div>
              <!-- Row One Ends Here -->  

              <!-- ROW TWO -->
                    <div class="row">
                      <div class="form-group col-md-4">
                      <label class="control-label">Family Labor Available</label>
                      <input class="form-control" type="text" id="family_labor_availability" >
                      </div>

                      



                      </div>
                <!-- Row Two Ends Here -->
            </div>
          
          </div>
        </div>
		</div>
        <!--Family Size -->
        

        

       </div>
      <?php $this->endBody() ?>
   </body>
</html>
<?php $this->endPage() ?>




<!-- <script>










//Decleration

</script> -->