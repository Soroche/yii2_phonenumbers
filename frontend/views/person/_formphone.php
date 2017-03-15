<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PhoneNumbers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phone-number-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cell_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'person_id')->hiddenInput(['value'=>$old_person_id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

