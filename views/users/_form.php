<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container" >
    <div class="row">
      

      

      <div class="col-lg-6 col-lg-offset-3">
      <?= $form->field($model, 'is_department_user')->radioList([ 'Y' => 'Yes', 'N' => 'No', ], 
      ['prompt' => '']) ?>

      <?= $form->field($model, 'username')->textInput(['maxlength' => true,'id' => 'uname']) ?>
      <?= $form->field($model, 'full_name')->textInput(['maxlength' => true, 'id' => 'fname']) ?>
      <?= $form->field($model, 'mobile_number')->textInput(['id' => 'mnumber']) ?>
      <?= $form->field($model, 'email_id')->textInput(['maxlength' => true, 'id' => 'email']) ?>
      <?= $form->field($model, 'aadhaar_number')->textInput(['id' => 'aadhaar']) ?>
      <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'id' => 'password']) ?>
      </div>
    </div>
    </div>


<script>
    function showData(){
        var username = document.getElementById('uname').value;
        alert(username);
    }
</script>
   

    

   

   

   

    <!-- <?= $form->field($model, 'password_salt')->textInput(['maxlength' => true]) ?>  -->

    <!-- <?= $form->field($model, 'authKey')->textInput(['maxlength' => true]) ?>    -->

  

   
    <!-- <?= $form->field($model, 'created_date_time')->textInput() ?> -->

    <!-- <?= $form->field($model, 'updated_date_time')->textInput() ?>  -->

    <!-- <?= $form->field($model, 'remote_address')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'user_agent')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'is_active')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success','onclick' => 'showData();',]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
