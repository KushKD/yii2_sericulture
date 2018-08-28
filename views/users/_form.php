<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container" style="padding:25px;">
    <div class="row">
      

      

      <div class="col-lg-6 col-lg-offset-6">
      <?= $form->field($model, 'is_department_user')->radioList([ 'Y' => 'Yes', 'N' => 'No', ], 
      ['prompt' => '']) ?>

      <?= $form->field($model, 'username')->textInput(['maxlength' => true,'id' => 'uname']) ?>
      <?= $form->field($model, 'full_name')->textInput(['maxlength' => true, 'class' => 'form-control name_with_space']) ?>
      <?= $form->field($model, 'mobile_number')->textInput(['class' => 'form-control mobile_number_ten_digit_only']) ?>
      <?= $form->field($model, 'email_id')->textInput(['maxlength' => true, 'class' => 'form-control email']) ?>
      <?= $form->field($model, 'aadhaar_number')->textInput(['id' => 'aadhaar','class'=>'form-control aadhar_number']) ?>
      <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'id' => 'password']) ?>

 <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success col-lg-12 ','onclick' => 'showData();',]) ?>
    </div>

      </div>
    </div>
    </div>


<script>
    // function showData(){

    //     //username
    //     //fullname  fname
    //     //mobile number  mnumber
    //     //email Id  email
    //     //aadhaar no  aadhaar
    //     //password  password

    //     var username = document.getElementById('uname').value;
    //     var fname = document.getElementById('fname').value;
    //     var mnumber = document.getElementById('mnumber').value;
    //     var email = document.getElementById('email').value;
    //     var aadhaar = document.getElementById('aadhaar').value;
    //     var password = document.getElementById('password').value;


    //     if(username === '' && username === '')


    //     alert(username);
    // }



</script>
   

    

   

   

   

    <!-- <?= $form->field($model, 'password_salt')->textInput(['maxlength' => true]) ?>  -->

    <!-- <?= $form->field($model, 'authKey')->textInput(['maxlength' => true]) ?>    -->

  

   
    <!-- <?= $form->field($model, 'created_date_time')->textInput() ?> -->

    <!-- <?= $form->field($model, 'updated_date_time')->textInput() ?>  -->

    <!-- <?= $form->field($model, 'remote_address')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'user_agent')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'is_active')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?> -->

   
    <?php ActiveForm::end(); ?>

</div>
