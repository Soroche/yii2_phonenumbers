<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PhoneNumbers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phone-number-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cell_number', ['template' => "{label}\n{hint}\n{input}\n{error}"])->hint('Введите номер телефона')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

