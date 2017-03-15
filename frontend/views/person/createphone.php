<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\PhoneNumbers */

$this->title = 'Добавить номер';
$this->params['breadcrumbs'][] = ['label' => 'Добавить номер', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-number-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formphone', [
        'model' => $model,
        'old_person_id' => $person_id,
    ]) ?>

</div>
