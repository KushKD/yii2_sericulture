<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MonsterTest */

$this->title = 'Create Monster Test';
$this->params['breadcrumbs'][] = ['label' => 'Monster Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monster-test-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
