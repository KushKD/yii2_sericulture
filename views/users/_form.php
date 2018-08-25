<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile_number')->textInput() ?>

    <?= $form->field($model, 'email_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'password_salt')->textInput(['maxlength' => true]) ?>  -->

    <!-- <?= $form->field($model, 'authKey')->textInput(['maxlength' => true]) ?>    -->

    <?= $form->field($model, 'aadhaar_number')->textInput() ?>

    <?= $form->field($model, 'is_department_user')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <!-- <?= $form->field($model, 'created_date_time')->textInput() ?> -->

    <!-- <?= $form->field($model, 'updated_date_time')->textInput() ?>  -->

    <!-- <?= $form->field($model, 'remote_address')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'user_agent')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'is_active')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
