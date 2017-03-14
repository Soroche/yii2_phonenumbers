<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\PhoneNumbers */

$this->title = 'Create Phone Numbers';
$this->params['breadcrumbs'][] = ['label' => 'Phone Number', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-number-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
