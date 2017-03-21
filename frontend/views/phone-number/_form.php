<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\PhoneNumbers */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="phone-number-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cell_number')->widget(PhoneInput::className(), [
            'jsOptions' => [
            	'preferredCountries' => ['ru', 'pl', 'ua'], ],])->textInput([])->label(false) ?>

    <?= $form->field($model, 'person_id')->hiddenInput(['value'=>$oldPersonId])->label(false)?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


