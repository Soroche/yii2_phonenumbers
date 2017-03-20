<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Person */

$this->title = 'Добавить контакт';
$this->params['breadcrumbs'][] = ['label' => 'Телефонный справочник', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
