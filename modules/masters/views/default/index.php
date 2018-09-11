<?php
   /* @var $this \yii\web\View */
   /* @var $content string */
   //  Yii::$app->getSession()->getFlash('danger');
   //  die;
   use yii\helpers\Html;
   use app\components\CommonUtility;
    Yii::$app->session->getFlash('danger');
   
    $commonUtility=new CommonUtility;
   
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
         
         
         //Get Tehsil Function
         function getTehsil(districtId){
         
         $("#tehsil").empty();
         // var distt=$(".distt_id").val();
         var postData={"distt_id":districtId};  
         var url="<?=Yii::$app->urlManager->createUrl('frontend/common-api/tehsil')?>";
         var promise=makeAjaxCall(url,postData);
         console.log(promise);
         var html = "<option value=''>---Please Select---</option>";
         promise.success(function (data) {
           if(data!=''){
             if(data.STATUS==200){
               console.log("This is where I am"+data.response);
               $.each(data.response, function(key,val){
                   html += "<option value='"+val.tehsil_id+"'>"+val.tehsil_name+"</option>";
               });
               $("#tehsil").append(html);
             }
             return false;
           }
         });
         }
         
         //Get Village Function
         function getVillages(teh_id){
         $("#village").empty();
         var postData={"teh_id":teh_id};
         var url="<?=Yii::$app->urlManager->createUrl('frontend/common-api/village')?>";
         var promise=makeAjaxCall(url,postData);
         var html = "<option value=''>---Please Select---</option>";
         promise.success(function (data) {
           if(data!=''){
             if(data.STATUS==200){
               $.each(data.response, function(key,val){
                   html += "<option value='"+val.vill_id+"'>"+val.vill_name +"</option>";
               });
               $("#village").append(html);
             }
             return false;
           }
         });
         }
         
         
         function makeAjaxCall(a,e){return jQuery.ajax({url:a,data:e,dataType:"json",type:"POST",success:function(a){},error:function(a){}})}function sumLandCost(a,e){if(!checkLandUnitsAreSame())return $(".landAreaHelp").empty(),$(".landAreaHelp").html("Please Select Same Units in all the blocks of land detail."),!1;var n=0;$(".land_area").each(function(){n+=parseFloat(this.value)});var t=$(".landUnit").val();n=convertValueIntoBigha(n,t),land_rate=$("."+a).val(),n*=land_rate,$("."+e).val(n)}function checkLandUnitsAreSame(){var a=1,e="",n="",t=!0;return $(".landUnit").each(function(){e=this.value,a>1&&e!=n&&(t=!1),a++,n=e}),!!t}function checkLandAreaValidation(){}function checkLandUnit(){var a=$(".landUnit").val();$(".land_area").attr("readonly",!1),$(".helpGroup").empty(),"Bigha/Biswa/Biswansi"==a&&$(".helpGroup").html("<p>Value in 000-000-000</p>")}function convertValueIntoBigha(a,e){var n=1;switch(e){case"Kanal/Marla":n=.30939*a;break;case"Acre":n=.0616*a;break;case"Sq. Meter":n=616e-6*a;break;case"Hectare":n=6.1772*a;break;case"Bigha/Biswa/Biswansi":n=1*a}return n}
         
         
         //Form Action  Update
         function de_update() {
           alert("Update");
           var apiURL= '<?php echo Yii::$app->urlManager->createUrl('frontend/default/update' ) ?>';

              var form = document.getElementById("sericulture_caf");
    form.action = apiURL;
    form.submit();
         }

         //Form Action Save
         function de_save() {
           alert("Save the Data");
           var apiURL= '<?php echo Yii::$app->urlManager->createUrl('frontend/default/save' ) ?>';
              var form = document.getElementById("sericulture_caf");
              form.action = apiURL;
              form.submit();
         }
         

         
         //Adding the Data Cell
    function addCooconProduction() {
         
         //validateFields();
         // year, quantity of seed, Quantity of Green Coocons, Rate, Total Amount
         var html = "";
          <?php  
               $fields="";
               if(isset($userApplicationData->field_value))
                   $fields=json_decode($userApplicationData->field_value);
              if(!isset($fields->coocon_year)){
                ?>
                 html += "<table id='parameterTable' class='table table-hover table-bordered' style='width:100%''>";
                html += "<thead> ";
                html += "<td class='text-center' style='width:5%;color:black;padding:10px;'>S.No</td> ";
                html += "<td class='text-center' style='width:15%;color:black;padding:10px;'> Year </td>";
                html += "<td class='text-center' style='width:15%;color:black;padding:10px;'> Quantity of seed reared (ounce)</td>";
                html += "<td class='text-center'style='width:10%;color:black;padding:10px;'>Quantity of Green Coocons Harvested (kg) </td>";
                html += "<td class='text-center'style='width:10%;color:black;padding:10px;'>Rate (Rs)/Spring Crop</td>";
                html += "<td class='text-center' style='width:10%; color:black;padding:10px;'>Total Amount</td> ";
                html += "<td class='text-center' style='width:10%;color:black; padding:10px;'>Remove</td>";
                html += "</thead>";
               <?php
              }
          ?>
         countClicks++;
         if(countClicks==1 && <?php if(!isset($fields->coocon_year)) echo 1; else echo 0;?>){
         console.log(countClicks + "if");
         html += "<tr>";
         html += "<td class='text-center' style='width:5%'>1</td> ";
         html += "<td style='width:15%'><input class=' form-control' readonly type='text' id='coocon_year_' name='app_submission[coocon_year][]' /></td>";
         html += "<td style='width:15%;'><input class=' form-control' readonly type='text' id='coocon_seed_quantity_' name='app_submission[coocon_seed_quantity][]'/></td>";
         
         html += "<td style='width:10%'><input class=' form-control ' onkeypress='return isNumberKey(event);'  readonly type='text' id='green_coocon_harvested_' name='app_submission[green_coocon_harvested][]'/></td> ";
        
         html += "<td style='width:10%'><input class=' form-control ' onkeypress='return isNumberKey(event);' readonly type='text' id='rate_spring_crop_' name='app_submission[rate_spring_crop][]' /></td> ";
         html += "<td style='width:10%'><input class=' form-control ' onkeypress='return isNumberKey(event);' readonly type='text' id='amount_realized_' name='app_submission[amount_realized][]'/></td> ";
         
         
         html += "<td style='width:10%'><a onclick='deleteRow(this)' id='delPOIbutton' class='btn btn-info'> Remove </a></td> ";
         html += "</tr>";
         <?php
              if(!isset($fields->coocon_year)){
                ?>

                html += "</table>";
                document.getElementById("coocon_table").innerHTML = html;
                coocon_year_.value = document.getElementById('coocon_year').selectedOptions[0].text;
                coocon_seed_quantity_.value = document.getElementById('coocon_seed_quantity').value;
                green_coocon_harvested_.value = document.getElementById('green_coocon_harvested'). value;
                rate_spring_crop_.value = document.getElementById('rate_spring_crop').value;
                amount_realized_.value = document.getElementById('amount_realized').value;
              <?php
              }
            ?>
         }
         else{
           console.log(countClicks + "else");
          insRow();

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
      <form method="POST" id="sericulture_caf" >
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
                        <input class="form-control" type="text" id="father_husband_name" name="UserProfile[user_husband_name]" value="<?=@$userProfileData->user_husband_name?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Age</label>
                        <input class="form-control" type="text" id="age" name="UserProfile[user_age]" value="<?=@$userProfileData->user_age?>" >
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Annual Income</label>
                        <input class="form-control" type="text" id="annual_income" name="UserProfile[user_annual_income]" value="<?=@$userProfileData->user_annual_income?>" >
                     </div>
                  </div>
                  <!-- Row One Ends Here -->  
                  <!-- ROW TWO -->
                  <div class="row">
                     <div class="form-group col-lg-4">
                        <label for="exampleSelect1">Gender</label>
                        <select class="form-control" id="gender" name="UserProfile[user_gender]" value="<?=@$userProfileData->user_gender?>">
                           <option value="M" >Male</option>
                           <option value="F" >Female</option>
                           <option value="O" >Other</option>
                        </select>
                     </div>
                     <div class="form-group col-lg-4">
                        <label for="exampleSelect1">Caste</label>
                        <select class="form-control" id="caste" name="UserProfile[user_caste]" value="<?=@$userProfileData->user_caste?>">
                           <option value="GEN" >General</option>
                           <option value="SC" >SC</option>
                           <option value="ST" >ST</option>
                           <option value="OBC" >OBC</option>
                        </select>
                     </div>
                     <div class="form-group col-lg-4">
                        <label for="exampleSelect1">Education Qualification</label>
                        <select class="form-control" id="education_qualification" name="UserProfile[user_education_qualification]" value="<?=@$userProfileData->user_education_qualification?>">
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
                        <input class="form-control" type="text" id="occupation" name="UserProfile[user_occupation]" value="<?=@$userProfileData->user_occupation?>">
                     </div>
                     <div class="form-group col-lg-4">
                        <label for="district">District</label>
                        <select class="form-control" id="district" name="UserProfile[user_district_id]" onchange="getTehsil(this.value);">
                           <option value="" >Select District</option>
                           <?php
                              if(!empty($distt))
                               foreach($distt as $dist){
                                 echo "<option value='".$dist->district_id."'";
                                 if(isset($userProfileData->user_district_id) && $userProfileData->user_district_id==$dist->district_id)
                                   echo "selected ";
                                 echo ">".$dist->distric_name."</option>"; 
                               }
                                 
                              
                              ?>
                        </select>
                     </div>
                     <div class="form-group col-lg-4">
                        <label for="tehsil">Tehsil</label>
                        <select class="form-control" id="tehsil" name="UserProfile[user_tehsil_id]" onchange="getVillages(this.value);">
                           <option value="" >--Select Tehsil--</option>
                           <?php
                              if(isset($userProfileData->user_district_id)){
                               
                                $tehs=$commonUtility->getTeshilsFromDisttId($userProfileData->user_district_id);
                                foreach($tehs as $teh){
                                  echo "<option value='".@$teh['tehsil_id']."'";
                                  if(isset($userProfileData->user_tehsil_id) && $userProfileData->user_tehsil_id==$teh['tehsil_id'])
                                    echo "selected";
                                  echo ">".@$teh['tehsil_name']."</option>";
                                }
                              
                              }
                              
                              ?>
                        </select>
                     </div>
                  </div>
                  <!-- ROW Three Ends Here -->
                  <!-- ROW FOUR -->
                  <div class="row">
                     <div class="form-group col-lg-4">
                        <label for="village">Village</label>
                        <select class="form-control" name="UserProfile[user_village_id]" id="village">
                           <option value="" >Select Village</option>
                           <?php
                              if(isset($userProfileData->user_village_id)){
                               
                                $villages=$commonUtility->getVillagesFromTehId($userProfileData->user_tehsil_id);
                                //echo "<pre>"; print_r( $villages); die;
                                foreach($villages as $teh){
                                  echo "<option value='".@$teh['vill_id']."'";
                                  if(isset($userProfileData->user_village_id) && $userProfileData->user_village_id==$teh['vill_id'])
                                    echo "selected";
                                  echo ">".@$teh['vill_name']."</option>";
                                }
                              
                              }
                              
                              ?>
                        </select>
                     </div>
                     <div class="form-group col-lg-4">
                        <label for="po">Post Office</label>
                        <select class="form-control" id="post_office"  name="UserProfile[user_po]" value="<?=@$userProfileData->user_po?>">
                           <option value="" >Select Post Office</option>
                        </select>
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label"> Pin Code</label>
                        <input class="form-control" type="text" id="pin_code" name="UserProfile[user_pin_code]" value="<?=@$userProfileData->user_pin_code?>">
                     </div>
                  </div>
                  <!-- ROW four ends Here -->
                  <!-- Row  Five Starts Here -->
                  <div class="row">
                     <div class="form-group col-md-4">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" rows="3" name="UserProfile[address]" ></textarea>
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
                        <input class="form-control" type="text" id="bank_name" name="UserBankDetail[bank_name]"   value="<?=@$userBankDetails->bank_name?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Account Number</label>
                        <input class="form-control" type="text" id="account_number" name="UserBankDetail[account_number]" value="<?=@$userBankDetails->account_number?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">IFSC Code</label>
                        <input class="form-control" type="text" id="ifsc_code" name="UserBankDetail[bank_ifsc_code]" value="<?=@$userBankDetails->bank_ifsc_code?>">
                     </div>
                  </div>
                  <!-- Row One Ends Here -->  
                  <!-- ROW TWO -->
                  <div class="row">
                     <div class="form-group col-md-4">
                        <label class="control-label">Account Holder Name </label>
                        <input class="form-control" type="text" id="account_holder_name" name="UserBankDetail[account_holder_name]" value="<?=@$userBankDetails->account_holder_name?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Account Type </label>
                        <input class="form-control" type="text" id="account_type" name="UserBankDetail[account_type]" value="<?=@$userBankDetails->account_type?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label for="address">Bank Address</label>
                        <textarea class="form-control" id="address" rows="3" id="bank_address" name="UserBankDetail[bank_address]" ><?=@$userBankDetails->bank_address?></textarea>
                     </div>
                  </div>
                  <!-- Row Two Ends Here -->
               </div>
            </div>
         </div>
      </div>
      <!-- Bank Details -->
      <?php
        // $fields="";
        //  if(isset($userApplicationData->field_value))
        //      $fields=json_decode($userApplicationData->field_value);
        //  ?>
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
                        <input class="form-control" type="text" id="total_land" name="app_submission[Land_status_total_land]" value="<?=@$fields->Land_status_total_land?>" >
                     </div>
                     <div class="form-group col-md-4" >
                        <label class="control-label">Irrigated Land (In Acers)</label>
                        <input class="form-control" type="text" id="irrigated_land" name="app_submission[Land_status_irrigated_land]" value="<?=@$fields->Land_status_irrigated_land?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Rain Fed (In Acers)</label>
                        <input class="form-control" type="text" id="rain_fed"  name="app_submission[Land_status_rain_fed]" value="<?=@$fields->Land_status_rain_fed?>">
                     </div>
                  </div>
                  <!-- Row One Ends Here -->  
                  <!-- ROW TWO -->
                  <div class="row">
                     <div class="form-group col-md-4">
                        <label class="control-label">Land available for Mulberry Plantation (In Acers) </label>
                        <input class="form-control" type="text" id="mulberry_land"  name="app_submission[Land_status_mulberry_land]" value="<?=@$fields->Land_status_mulberry_land?>">
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
                        <input class="form-control" type="text" id="one_to_three"  name="app_submission[mulberry_plantation_one_to_three]" value="<?=@$fields->mulberry_plantation_one_to_three?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">3-5 Years</label>
                        <input class="form-control" type="text" id="three_to_five" name="app_submission[mulberry_plantation_three_to_five]" value="<?=@$fields->mulberry_plantation_three_to_five?>" >
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">5-10 Years</label>
                        <input class="form-control" type="text" id="five_to_ten"  name="app_submission[mulberry_plantation_five_to_ten_three_to_five]" value="<?=@$fields->mulberry_plantation_five_to_ten_three_to_five?>">
                     </div>
                  </div>
                  <!-- Row One Ends Here -->  
                  <!-- ROW TWO -->
                  <div class="row">
                     <div class="form-group col-md-4">
                        <label class="control-label">More than 10 years</label>
                        <input class="form-control" type="text" id="more_than_ten" name="app_submission[mulberry_plantation_more_than_ten]" value="<?=@$fields->mulberry_plantation_more_than_ten?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Total Number</label>
                        <input class="form-control" type="text" id="total_number" name="app_submission[mulberry_plantation_total_number]" value="<?=@$fields->mulberry_plantation_total_number?>">
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
                        <input class="form-control" type="text" id="rearing_house" name="app_submission[rearing_space_rearing_house]" value="<?=@$fields->rearing_space_rearing_house?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Kacha/Pakka House/ Shed</label>
                        <input class="form-control" type="text"  id="kacha_pakka_house" name="app_submission[rearing_space_kacha_pakka_house]" value="<?=@$fields->rearing_space_kacha_pakka_house?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Area Of House Shed</label>
                        <input class="form-control" type="text" id="area_house_shed" name="app_submission[rearing_space_area_house_shed]" value="<?=@$fields->rearing_space_area_house_shed?>">
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
                     <div class="col-lg-12" id="coocon_table">
                          

                          <?php

                        if(isset($fields->coocon_year) && is_array($fields->coocon_year)){
                            echo "                   
                            <table id='parameterTable' class='table table-hover table-bordered' style='width:100%'>
                            <thead> 
                              <tr>
                                <td class='text-center' style='width:5%;color:black;padding:10px;'>S.No</td> 
                                <td class='text-center' style='width:15%;color:black;padding:10px;'> Yea </td>
                                <td class='text-center' style='width:15%;color:black;padding:10px;'> Quantity of seed reared (ounce)</td>
                              
                                <td class='text-center'style='width:10%;color:black;padding:10px;'>Quantity of Green Coocons Harvested (kg) </td>
                                <td class='text-center'style='width:10%;color:black;padding:10px;'>Rate (Rs)/Spring Crop</td>
                                <td class='text-center' style='width:10%; color:black;padding:10px;'>Total Amount</td> 
                                <td class='text-center' style='width:10%;color:black; padding:10px;'>Remove</td>
                              </tr>
                            </thead>
                            " ;
                            $count=1;
                          foreach($fields->coocon_year as $key=> $coocon){
                            if(empty($coocon))
                               continue;
                            echo "<tr>
                                <td class='text-center' style='width:5%'>".$count++."</td> 
                                <td style='width:15%'><input class='form-control' readonly type='text' id='coocon_year_' name='app_submission[coocon_year][]' value='".@$fields->coocon_year[$key]."'/></td>
                                <td style='width:15%;'><input class=' form-control' readonly type='text' id='coocon_seed_quantity_' name='app_submission[coocon_seed_quantity][]' value='".@$fields->coocon_seed_quantity[$key]."'/></td>
                                <td style='width:10%'><input class=' form-control '   readonly type='text' id='green_coocon_harvested_' name='app_submission[green_coocon_harvested][]' value='".@$fields->green_coocon_harvested[$key]."'/></td> 
                                <td style='width:10%'><input class=' form-control '  readonly type='text' id='rate_spring_crop_' name='app_submission[rate_spring_crop][]' value='".@$fields->rate_spring_crop[$key]."'/></td> 
                                <td style='width:10%'><input class=' form-control '  readonly type='text' id='amount_realized_' name='app_submission[amount_realized][]' value='".@$fields->amount_realized[$key]."'/></td> 
                                <td style='width:10%'><a onclick='deleteRow(this)' id='delPOIbutton' class='btn btn-info'> Remove </a></td> 
                            </tr>";
                          }
                          echo "</table>";
                        }
                        ?>
                     </div>
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
                        <input class="form-control" type="text" id="silkworm_experience" name="app_submission[silkworm_production_silkworm_experience]" value="<?=@$fields->silkworm_production_silkworm_experience?>">
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
                        <input class="form-control" type="text" id="training_type"  name="app_submission[stp_training_type]" value="<?=@$fields->stp_training_type?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Duration</label>
                        <input class="form-control" type="text" id="duration"  name="app_submission[stp_duration]" value="<?=@$fields->stp_duration?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Subject</label>
                        <input class="form-control" type="text"  id="subject"  name="app_submission[stp_subject]" value="<?=@$fields->stp_subject?>">
                     </div>
                  </div>
                  <!-- Row One Ends Here -->  
                  <!-- ROW TWO -->
                  <div class="row">
                     <div class="form-group col-md-4">
                        <label class="control-label">Agency</label>
                        <input class="form-control" type="text" id="agency"  name="app_submission[stp_agency]" value="<?=@$fields->stp_agency?>" >
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Upload Certificate</label>
                        <input class="form-control" type="file" id="upload_certificate"  name="app_submission[stp_upload_certificate]" value="<?=@$fields->stp_upload_certificate?>">
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
                        <input class="form-control" type="text" id="male"  name="app_submission[family_size_male]"   value="<?=@$fields->family_size_male?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Female</label>
                        <input class="form-control" type="text" id="female"  name="app_submission[family_size_female]"  value="<?=@$fields->family_size_female?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Children</label>
                        <input class="form-control" type="text" id="children" name="app_submission[family_size_children]"  value="<?=@$fields->family_size_children?>">
                     </div>
                  </div>
                  <!-- Row One Ends Here -->  
                  <!-- ROW TWO -->
                  <div class="row">
                     <div class="form-group col-md-4">
                        <label class="control-label">Family Labor Available</label>
                        <input class="form-control" type="text" id="family_labor_availability" name="app_submission[family_size_family_labor_availability]"  value="<?=@$fields->family_size_family_labor_availability?>" >
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

    <?php
              if(!isset($fields->coocon_year)){
                ?>
   <button type="button"  onclick="de_save();" class="btn btn-primary"> Save </button>
        <?php 
              }else{
              ?>
                <button type="button"  onclick="de_update();" class="btn btn-warning"> Update </button>
                <?php
              }
              ?>

</html>
<?php $this->endPage() ?>