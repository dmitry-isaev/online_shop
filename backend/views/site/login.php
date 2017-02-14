<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';

?>

<div class="center-block">
    <div class="site-login">
        <h1><?= Html::encode($this->title); ?></h1>
        <div class="row">
            <div class="col-lg-12">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?php echo $form->field($model, 'username')->textInput(['autofocus' => true]); ?>
                <?php echo $form->field($model, 'password')->passwordInput(); ?>
                <?php echo $form->field($model, 'rememberMe')->checkbox(); ?>
                <div class="form-group">
                    <?php echo Html::submitButton('Войти', ['class' => 'btn btn-primary']); ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>