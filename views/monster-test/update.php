<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MonsterTest */

$this->title = 'Update Monster Test: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Monster Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="monster-test-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
