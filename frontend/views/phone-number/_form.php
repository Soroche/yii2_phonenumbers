<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\PhoneNumbers */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="phone-number-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cell_number')->widget(MaskedInput::className(), [
        'mask' => '+7 (999) 999 99 99',])->textInput(['placeholder' => '+7 (999) 999 99 99',]) ?>

    <?= $form->field($model, 'person_id')->hiddenInput(['value'=>$oldPersonId])->label(false)?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


