<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\PhoneNumbers */

$this->title = 'Добавить номер телефона';
$this->params['breadcrumbs'][] = ['label' => 'Телефонный справочник', 'url' => ['person/index']];
$this->params['breadcrumbs'][] = ['label' => $modelPerson->last_name . ' ' . $modelPerson->first_name , 'url' => ['person/view', 'id' => $model->person_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-number-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
