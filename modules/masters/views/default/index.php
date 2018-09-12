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
         

         //Alert PopUp

         function showAlert(alert_message){
          $.notify({
      		title: "",
      		message: "&nbsp;"+alert_message,
          icon: 'fa fa-exclamation-triangle  '
      	},{
      		type: "danger"
      	});
         }




        

         
          //Validations goes Here
          function validateFields(){
         
         var father_husband_name  = document.getElementById("father_husband_name").value;
         var age  = document.getElementById("age").value;
         var annual_income  = document.getElementById("annual_income").value;
         var gender  = document.getElementById("gender").value;
         var caste  = document.getElementById("caste").value;
         var education_qualification  = document.getElementById("education_qualification").value;
         var occupation  = document.getElementById("occupation").value;
         var district  = document.getElementById("district").value;
         var tehsil  = document.getElementById("tehsil").value;
         var village   = document.getElementById("village").value;
         var pin_code  = document.getElementById("pin_code").value;
         var address  = document.getElementById("address").value;
         
         var bank_name  = document.getElementById("bank_name").value;
         var account_number  = document.getElementById("account_number").value;
         var ifsc_code  = document.getElementById("ifsc_code").value;
         var account_holder_name  = document.getElementById("account_holder_name").value;
         var account_type  = document.getElementById("account_type").value;
         var bank_address  = document.getElementById("bank_address").value;
         
         var total_land  = document.getElementById("total_land").value;
         var irrigated_land  = document.getElementById("irrigated_land").value;
         var rain_fed  = document.getElementById("rain_fed").value;
         var mulberry_land  = document.getElementById("mulberry_land").value;
         
         
         var one_to_three  = document.getElementById("one_to_three").value;
         var three_to_five  = document.getElementById("three_to_five").value;
         var five_to_ten  = document.getElementById("five_to_ten").value;
         var more_than_ten  = document.getElementById("more_than_ten").value;
         var total_number  = document.getElementById("total_number").value;
         
         var rearing_house  = document.getElementById("rearing_house").value;
         var kacha_pakka_house  = document.getElementById("kacha_pakka_house").value;
         var area_house_shed  = document.getElementById("area_house_shed").value;
         
         var coocon_year  = document.getElementById("coocon_year").value;
         var coocon_seed_quantity  = document.getElementById("coocon_seed_quantity").value;
         var green_coocon_harvested  = document.getElementById("green_coocon_harvested").value;
         var rate_spring_crop  = document.getElementById("rate_spring_crop").value;
         var amount_realized  = document.getElementById("amount_realized").value;
         
         var silkworm_experience  = document.getElementById("silkworm_experience").value;
         
         var training_type  = document.getElementById("training_type").value;
         var duration  = document.getElementById("duration").value;
         var subject  = document.getElementById("subject").value;
         var agency  = document.getElementById("agency").value;
         var upload_certificate  = document.getElementById("upload_certificate").value;
         
         var male  = document.getElementById("male").value;
         var female  = document.getElementById("female").value;
         var children  = document.getElementById("children").value;
         var family_labor_availability  = document.getElementById("family_labor_availability").value;
         
         
         
         
         
         
         if(father_husband_name == "" || father_husband_name == null){
          showAlert("Please enter Father or Husband name");
         return false;
         }
         else if(age == "" || age == null){
          showAlert("Please enter your age ");
         return false;
         }
         else if(annual_income == "" || annual_income == null){
          showAlert("Please enter your Annual Income ");
         return false;
         }
         else if(gender == "" || gender == null){
          showAlert("Please Select your gender");
         return false;
         }
         else if(caste == "" || caste == null){
          showAlert("Please Select your caste");
         return false;
         }
         else if(education_qualification == "" || education_qualification == null){
          showAlert("Please Select your Education Qualification");
         return false;
         }
         else if(occupation == "" || occupation == null){
          showAlert("Please Enter your Profession/Occupation ");
         return false;
         }
         else if(district == "" || district == null){
          showAlert("Please Select District");
         return false;
         }
         
         else if(tehsil == "" || tehsil == null){
          showAlert("Please Select Tehsil");
         return false;
         }
         
         else if(village == "" || village == null){
          showAlert("Please Select your Village");
         return false;
         }
         
         else if(pin_code == "" || pin_code == null){
          showAlert("Please enter your Pin Code");
         return false;
         }
         
         else if(address == "" || address == null){
          showAlert("Please enter your permanent Address");
         return false;
         }
         
         
         //Bank Details Goes Here
         else if(bank_name == "" || bank_name == null){
          showAlert("Please Enter your Bank name ");
         return false;
         }
         else if(account_number == "" || account_number == null){
          showAlert("Please enter your valid Account Number");
         return false;
         }
         
         else if(ifsc_code == "" || ifsc_code == null){
          showAlert("Please enter the Bank IFSC Code");
         return false;
         }
         
         else if(account_holder_name == "" || account_holder_name == null){
          showAlert("Please enter the account Holder name");
         return false;
         }
         
         else if(account_type == "" || account_type == null){
          showAlert("Please enter the Type of account. Account type can be Saving/Current etc.");
         return false;
         }
         
         else if(bank_address == "" || bank_address == null){
          showAlert("Please enter the Bank address ");
         return false;
         }
         
         //Status Of Land
         else if(total_land == "" || total_land == null){
          showAlert("Please enter the total Land in acers");
         return false;
         }
         
         else if(irrigated_land == "" || irrigated_land == null){
          showAlert("Please enter the Irregated Land in acers");
         return false;
         }
         
         else if(rain_fed == "" || rain_fed == null){
          showAlert("Please enter the Rain Fed Land in acres");
         return false;
         }
         
         else if(mulberry_land == "" || mulberry_land == null){
          showAlert("Please enter the Land available for Mulberry Plantation (In Acers)");
         return false;
         }
         
         //Existing Mullbery Plantation
         else if(one_to_three == "" || one_to_three == null){
          showAlert("Please enter Existing Mullbery Plantation between 1 to 3 years");
         return false;
         }
         
         else if(three_to_five == "" || three_to_five == null){
          showAlert("Please enter Existing Mullbery Plantation between 3 to 5 years");
         return false;
         }
         
         else if(five_to_ten == "" || five_to_ten == null){
          showAlert("Please enter Existing Mullbery Plantation between 5 to 10 years");
         return false;
         }
         
         else if(more_than_ten == "" || more_than_ten == null){
          showAlert("Please enter Existing Mullbery Plantation for more than 10 years");
         return false;
         }
         else if(total_number == "" || total_number == null){
          showAlert("Please enter the total number");
         return false;
         }
         
         //Existing Rearing Space Available
         else if(rearing_house == "" || rearing_house == null){
          showAlert("Please enter Existing Rearing Space Available for Rearing House (Dwelling/Seperate)");
         return false;
         }
         
         else if(kacha_pakka_house == "" || kacha_pakka_house == null){
          showAlert("Please enter Existing Rearing Space Available for Kacha/Pakka House/ Shed");
         return false;
         }
         else if(area_house_shed == "" || area_house_shed == null){
          showAlert("Please enter the  Area for House Shed");
         return false;
         }
         
         //SilkWorm Experience
         else if(silkworm_experience == "" || silkworm_experience == null){
          showAlert("Please enter your Total Experience in silkworm rearing (Years)");
         return false;
         }
         
         //Trainning If Any
         else if(training_type == "" || training_type == null){
          showAlert("Please enter the type of training (Particifation in Sericulture Training Programme) ");
         return false;
         }
         
         else if(duration == "" || duration == null){
          showAlert("Please enter the Duration of training (Particifation in Sericulture Training Programme) ");
         return false;
         }
         else if(subject == "" || subject == null){
          showAlert("Please enter the Subject of training (Particifation in Sericulture Training Programme)");
         return false;
         }
         else if(agency == "" || agency == null){
          showAlert("Please enter the Aency  (Particifation in Sericulture Training Programme)");
         return false;
         }
         
         else if(upload_certificate == "" || upload_certificate == null){
          showAlert("Please attach certificates for trainin if any.");
         return false;
         }
         
         //Family Size
         else if(male == "" || male == null){
          showAlert("Please enter the total number of Male in your family");
         return false;
         }
         else if(female == "" || female == null){
          showAlert("Please enter the total number of Female in your family");
         return false;
         }
         else if(children == "" || children == null){
          showAlert("Please enter the total number of Children in your family");
         return false;
         }
         
         else if(family_labor_availability == "" || family_labor_availability == null){
          showAlert("Please select Is Family Labor Available ");
         return false;
         }
         return true;
         }
         
         







         //Form Action  Update
         function de_update() {

             if(validateFields()){
              alert("Update");
           var apiURL= '<?php echo Yii::$app->urlManager->createUrl('frontend/default/update' ) ?>';
         
              var form = document.getElementById("sericulture_caf");
         form.action = apiURL;
         form.submit();

             }
          
         }
         
         //Form Action Save
         function de_save() {
          if(validateFields()){
           alert("Save the Data");
           var apiURL= '<?php echo Yii::$app->urlManager->createUrl('frontend/default/save' ) ?>';
              var form = document.getElementById("sericulture_caf");
              form.action = apiURL;
              form.submit();
          }
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


          function cooconvalidateFields(){

var coocon_year  = document.getElementById("coocon_year").value;
var coocon_seed_quantity  = document.getElementById("coocon_seed_quantity").value;
var green_coocon_harvested  = document.getElementById("green_coocon_harvested").value;
var rate_spring_crop  = document.getElementById("rate_spring_crop").value;
var amount_realized  = document.getElementById("amount_realized").value;

if(coocon_year == "" || coocon_year == null){
      showAlert("Please select the year for Coocon Production");
     return false;
     }
     else if(coocon_seed_quantity == "" || coocon_seed_quantity == null){
      showAlert("Please enter the Quantaty of Seed reared (Ounce)   ");
     return false;
     }
     else if(green_coocon_harvested == "" || green_coocon_harvested == null){
      showAlert("Please enter the Quantity of Green Cooons Harvested (In KG) ");
     return false;
     }
     else if(rate_spring_crop == "" || rate_spring_crop == null){
      showAlert("Please enter the Rate (Rs)/ Spring Crop ");
     return false;
     }  else if(amount_realized == "" || amount_realized == null){
      showAlert("Please enter the Total Amount Realized (Rupees) ");
     return false;
     }
     return true;
}



        function validateCooconData(){
           if(cooconvalidateFields()){
            addCooconProduction();  
             document.getElementById("coocon_year").value = "";
 document.getElementById("coocon_seed_quantity").value = "";
 document.getElementById("green_coocon_harvested").value = "";
 document.getElementById("rate_spring_crop").value ="";
 document.getElementById("amount_realized").value = "";
           }
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
                        <input class="form-control" type="text" id="age" name="UserProfile[user_age]" onkeypress="return validateKey1(event,	this,'9@3@3')" value="<?=@$userProfileData->user_age?>" >
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Annual Income</label>
                        <input class="form-control" type="text" id="annual_income" name="UserProfile[user_annual_income]" onkeypress="return validateKey1(event,	this,'9@10@3')" value="<?=@$userProfileData->user_annual_income?>" >
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
                        <input class="form-control" type="text" id="pin_code" onkeypress="return validateKey1(event,	this,'9@6@3')" name="UserProfile[user_pin_code]" value="<?=@$userProfileData->user_pin_code?>">
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
                        <input class="form-control" type="text" id="account_number" name="UserBankDetail[account_number]" onkeypress="return validateKey1(event,	this,'9@16@3')" value="<?=@$userBankDetails->account_number?>">
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
                        <textarea class="form-control" id="bank_address" rows="3" id="bank_address" name="UserBankDetail[bank_address]" ><?=@$userBankDetails->bank_address?></textarea>
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
                        <input class="form-control" type="text" id="total_land" name="app_submission[Land_status_total_land]" onkeypress="return validateKey1(event,	this,'9@10@3')" value="<?=@$fields->Land_status_total_land?>" >
                     </div>
                     <div class="form-group col-md-4" >
                        <label class="control-label">Irrigated Land (In Acers)</label>
                        <input class="form-control" type="text" id="irrigated_land" name="app_submission[Land_status_irrigated_land]" onkeypress="return validateKey1(event,	this,'9@10@3')" value="<?=@$fields->Land_status_irrigated_land?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Rain Fed (In Acers)</label>
                        <input class="form-control" type="text" id="rain_fed"  name="app_submission[Land_status_rain_fed]" onkeypress="return validateKey1(event,	this,'9@10@3')" value="<?=@$fields->Land_status_rain_fed?>">
                     </div>
                  </div>
                  <!-- Row One Ends Here -->  
                  <!-- ROW TWO -->
                  <div class="row">
                     <div class="form-group col-md-4">
                        <label class="control-label">Land available for Mulberry Plantation (In Acers) </label>
                        <input class="form-control" type="text" id="mulberry_land"  name="app_submission[Land_status_mulberry_land]" onkeypress="return validateKey1(event,	this,'9@10@3')" value="<?=@$fields->Land_status_mulberry_land?>">
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
                        <input class="form-control" type="text" id="one_to_three"  name="app_submission[mulberry_plantation_one_to_three]" onkeypress="return validateKey1(event,	this,'9@10@3')" value="<?=@$fields->mulberry_plantation_one_to_three?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">3-5 Years</label>
                        <input class="form-control" type="text" id="three_to_five" name="app_submission[mulberry_plantation_three_to_five]" onkeypress="return validateKey1(event,	this,'9@10@3')" value="<?=@$fields->mulberry_plantation_three_to_five?>" >
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">5-10 Years</label>
                        <input class="form-control" type="text" id="five_to_ten"  name="app_submission[mulberry_plantation_five_to_ten_three_to_five]" onkeypress="return validateKey1(event,	this,'9@10@3')" value="<?=@$fields->mulberry_plantation_five_to_ten_three_to_five?>">
                     </div>
                  </div>
                  <!-- Row One Ends Here -->  
                  <!-- ROW TWO -->
                  <div class="row">
                     <div class="form-group col-md-4">
                        <label class="control-label">More than 10 years</label> 
                        <input class="form-control" type="text" id="more_than_ten" name="app_submission[mulberry_plantation_more_than_ten]" onkeypress="return validateKey1(event,	this,'9@10@3')" value="<?=@$fields->mulberry_plantation_more_than_ten?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Total Number</label>
                        <input class="form-control" type="text" id="total_number" name="app_submission[mulberry_plantation_total_number]" onkeypress="return validateKey1(event,	this,'9@10@3')" value="<?=@$fields->mulberry_plantation_total_number?>">
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
                        <input class="form-control" type="text" id="rearing_house" name="app_submission[rearing_space_rearing_house]" onkeypress="return validateKey1(event,	this,'9@10@3')" value="<?=@$fields->rearing_space_rearing_house?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Kacha/Pakka House/ Shed</label>
                        <input class="form-control" type="text"  id="kacha_pakka_house" name="app_submission[rearing_space_kacha_pakka_house]" onkeypress="return validateKey1(event,	this,'9@10@3')" value="<?=@$fields->rearing_space_kacha_pakka_house?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Area Of House Shed</label>
                        <input class="form-control" type="text" id="area_house_shed" name="app_submission[rearing_space_area_house_shed]" onkeypress="return validateKey1(event,	this,'9@10@3')" value="<?=@$fields->rearing_space_area_house_shed?>">
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
                        <input class="form-control" type="text" onkeypress="return validateKey1(event,	this,'9@10@3')" id="coocon_seed_quantity" >
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Quantity of Green Cooons Harvested (In KG)</label>
                        <input class="form-control" type="text" onkeypress="return validateKey1(event,	this,'9@10@3')" id="green_coocon_harvested" >
                     </div>
                  </div>
                  <!-- Row One Ends Here -->  
                  <!-- ROW TWO -->
                  <div class="row">
                     <div class="form-group col-md-4">
                        <label class="control-label">Rate (Rs)/ Spring Crop</label>
                        <input class="form-control" type="text" onkeypress="return validateKey1(event,	this,'9@10@3')" id="rate_spring_crop" >
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Total Amount Realized (Rupees)</label>
                        <input class="form-control" type="text" onkeypress="return validateKey1(event,	this,'9@10@3')" id="amount_realized" >
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
                        <button class="btn btn-primary btn-sm" onclick="validateCooconData();" type="button">Add</button>
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
                        <input class="form-control" type="text" id="silkworm_experience" onkeypress="return validateKey1(event,	this,'9@3@3')" name="app_submission[silkworm_production_silkworm_experience]" value="<?=@$fields->silkworm_production_silkworm_experience?>">
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
                        <label class="control-label">Duration (In Months)</label>
                        <input class="form-control" type="text" id="duration" onkeypress="return validateKey1(event,	this,'9@10@3')"  name="app_submission[stp_duration]" value="<?=@$fields->stp_duration?>">
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
                        <input class="form-control" type="text" id="male"  name="app_submission[family_size_male]" onkeypress="return validateKey1(event,	this,'9@3@3')"  value="<?=@$fields->family_size_male?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Female</label>
                        <input class="form-control" type="text" id="female"  name="app_submission[family_size_female]" onkeypress="return validateKey1(event,	this,'9@3@3')"  value="<?=@$fields->family_size_female?>">
                     </div>
                     <div class="form-group col-md-4">
                        <label class="control-label">Children</label>
                        <input class="form-control" type="text" id="children" name="app_submission[family_size_children]" onkeypress="return validateKey1(event,	this,'9@3@3')"  value="<?=@$fields->family_size_children?>">
                     </div>
                  </div>
                  <!-- Row One Ends Here -->  
                  <!-- ROW TWO -->
                  <div class="row">
                     <div class="form-group col-md-4">
                        <label class="control-label">Family Labor Available</label>
                        <input class="form-control" type="text" id="family_labor_availability" name="app_submission[family_size_family_labor_availability]" onkeypress="return validateKey1(event,	this,'9@3@3')" value="<?=@$fields->family_size_family_labor_availability?>" >
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