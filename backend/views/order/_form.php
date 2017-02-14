<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">
    <?php $form = ActiveForm::begin(); ?>
    <?php echo $form->field($model, 'status')->dropDownList(['0' => 'Активен', '1' => 'Завершен'] //['prompt' => '']
    ); ?>
    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]); ?>
    <?php echo $form->field($model, 'email')->textInput(['maxlength' => true]); ?>
    <?php echo $form->field($model, 'phone')->textInput(['maxlength' => true]); ?>
    <?php echo $form->field($model, 'address')->textInput(['maxlength' => true]); ?>
    <?php echo $form->field($model, 'quantity')->textInput(); ?>
    <?php echo $form->field($model, 'sum')->textInput(); ?>
    <?php echo $form->field($model, 'created_at')->textInput(); ?>
    <?php echo $form->field($model, 'updated_at')->textInput(); ?>
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord
            ? 'Создать'
            : 'Обновить',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>