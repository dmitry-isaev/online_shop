<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <h2>Вход</h2>
                    <?php $form = ActiveForm::begin(); ?>
                    <?php echo $form
                        ->field($model, 'username', ['template' => '{input}{hint}{error}'])
                        ->textInput(['class' => '', 'placeholder' => $model->getAttributeLabel('username')]); ?>
                    <?php echo $form
                        ->field($model, 'password', ['template' => '{input}{hint}{error}'])
                        ->passwordInput(['class' => '', 'placeholder' => $model->getAttributeLabel('password')]); ?>
                    <?php echo $form->field($model, 'rememberMe', ['template' => '{input}{error}'])->checkbox(); ?>
                    <div style="color:#999;margin:1em 0">
                        Если Вы забыли пароль, то можете его <?echo Html::a('восстановить', ['site/request-password-reset']) ?>
                    </div>
                    <?php echo Html::submitButton('Войти', ['class' => 'btn btn-default']); ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-sm-1">
                <h2 class="or">ИЛИ</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <h2>Регистрация</h2>
                    <form action="#">
                        <input type="text" placeholder="Name"/>
                        <input type="email" placeholder="Email Address"/>
                        <input type="password" placeholder="Password"/>
                        <button type="submit" class="btn btn-default">Зарегистрироваться</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>