<?php

use backend\assets\AppAsset;
use backend\assets\FontAwesomeAsset;
use common\models\forms\LoginForm;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var ActiveForm $form
 * @var LoginForm $model
 */

AppAsset::register($this);
FontAwesomeAsset::register($this);
?>

<div class="login-page">

    <h1 class="login-box-msg text-center"><?= Yii::t('app', 'Sign in to start your session') ?></h1>

    <div class="card">
        <div class="card-body login-card-body">
            <?php $form = ActiveForm::begin(['id' => 'login-form']) ?>

            <?= $form->errorSummary($model) ?>

            <?= $form->field($model, 'username', [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-user"></span></div></div>',
                'template' => '{beginWrapper}{input}{error}{endWrapper}<div class="small">{hint}</div>',
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('username')])
                ->hint($model->getAttributeHint('username'))
            ?>

            <?= $form->field($model, 'password', [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>',
                'template' => '{beginWrapper}{input}{error}{endWrapper}<div class="small">{hint}</div>',
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->passwordInput(['placeholder' => $model->getAttributeLabel('password')])
                ->hint($model->getAttributeHint('password'))
            ?>

            <?= $form->field($model, 'rememberMe')->checkbox(['uncheck' => null]) ?>

            <div class="btn-group">
                <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block']) ?>
            </div>


            <?php ActiveForm::end(); ?>

            <!-- /.social-auth-links -->

            <!--<p class="mb-1">
                <a href="#">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="#" class="text-center">Register a new membership</a>
            </p>-->
        </div>
        <!-- /.login-card-body -->
    </div>
</div>

