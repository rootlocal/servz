<?php

use common\models\db\City;
use common\models\db\Region;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var View $this
 * @var City $model
 * @var ActiveForm $form
 */
?>

<div class="site-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'region_id')->dropDownList(Region::getItems(), [
        'prompt' => Yii::t('app', 'Select...'),
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
