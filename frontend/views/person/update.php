<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Person */

$this->title = 'Изменить контакт: ' . $model->last_name . '  ' . $model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'Телефонный справочник', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->first_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="person-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
