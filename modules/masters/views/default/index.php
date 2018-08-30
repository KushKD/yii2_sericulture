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
                  <input class="form-control" type="text" placeholder="Enter Father or Husband name">
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Age</label>
                  <input class="form-control" type="email" placeholder="Enter Age">
                </div>

                 <div class="form-group col-md-4">
                  <label class="control-label">Annual Income</label>
                  <input class="form-control" type="email" placeholder="Enter Annual Income">
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
                  <input class="form-control" type="text" placeholder="Enter your Occupation">
                </div>

                <div class="form-group col-lg-4">
                    <label for="district">District</label>
                    <select class="form-control" id="district">
                      <option value="" >Select District</option>
                     
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
                    <select class="form-control" id="po">
                      <option value="" >Select Post Office</option>
                     
                    </select>
                  </div>
               
               
                  <div class="form-group col-md-4">
                  <label class="control-label"> Pin Code</label>
                  <input class="form-control" type="email" placeholder="Enter Pin Code">
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

        <!-- Bank  Details -->
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
                  <input class="form-control" type="text" placeholder="Enter Father or Husband name">
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Age</label>
                  <input class="form-control" type="email" placeholder="Enter Age">
                </div>

                 <div class="form-group col-md-4">
                  <label class="control-label">Annual Income</label>
                  <input class="form-control" type="email" placeholder="Enter Annual Income">
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
                  <input class="form-control" type="text" placeholder="Enter your Occupation">
                </div>

                <div class="form-group col-lg-4">
                    <label for="district">District</label>
                    <select class="form-control" id="district">
                      <option value="" >Select District</option>
                     
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
                    <select class="form-control" id="po">
                      <option value="" >Select Post Office</option>
                     
                    </select>
                  </div>
               
               
                  <div class="form-group col-md-4">
                  <label class="control-label"> Pin Code</label>
                  <input class="form-control" type="email" placeholder="Enter Pin Code">
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
        <!-- Bank Details -->
        

       </div>
      <?php $this->endBody() ?>
   </body>
</html>
<?php $this->endPage() ?>




<!-- <script>


//Bank Details
Name of Bank
Account Number
IFSC Code
Account Holder Name
Bank Address
Account Type

//Status Of Land
Total Land (In Acers)
Irrigated Land (In Acers)
Rain Fed (In Acers)
Land available for Mulberry Plantation (In Acers)

//Existing Mulberry Plantation
1-3 Years
3-5 Years
5-10 Years
More than 10 years
Total Number

//Existing Rearing Space Available
Rearing House (Dwelling/Seperate)
Kacha/Pakka House/ Shed
Area Of House Shed

//Coocon Production
Month and Year  
Quantaty of Seed reared (Ounce)
Quantity of Green Cooons Harvested (In KG)
Rate (Rs)/ Spring Crop
Total Amount Realized (Rupees)

//Silkworm Production 
Total Experience in silkworm rearing (Years)

//Particifation in Sericulture Training Programme (If any attach Cirtificate)
Type Of Training 
Duration
Subject
Agency

//Family Size
Male
Female
Children
Family Labor Available


//Decleration

</script> -->