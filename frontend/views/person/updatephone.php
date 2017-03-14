<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PhoneNumbers */

$this->title = 'Update Phone Number: ' . $model_phone->id;
$this->params['breadcrumbs'][] = ['label' => 'Phone Number', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model_phone->id, 'url' => ['view', 'id' => $model_phone->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="phone-number-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formphone', [
        'model' => $model_phone,
    ]) ?>

</div>
