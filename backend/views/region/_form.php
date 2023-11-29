<?php

use common\models\db\Region;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var View $this
 * @var Region $model
 * @var ActiveForm $form
 */
?>

<div class="region-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'), [
            'class' => 'btn btn-success'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
