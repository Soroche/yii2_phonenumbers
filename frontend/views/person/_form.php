<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'last_name')->textInput(['placeholder' => 'Введите фамилию','maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['placeholder' => 'Введите имя','maxlength' => true]) ?>

    <?= $form->field($model, 'sur_name')->textInput(['placeholder' => 'Введите отчество','maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_bday')->widget(DatePicker::className(), [
            'model' => $model,
            'dateFormat' => 'dd.MM.yyyy',
            'language' => 'ru',
            'clientOptions' => [
            'maxDate'=>'+0',
            ],
        ])->textInput(['placeholder' => 'Выберите дату',]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
