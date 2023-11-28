<?php

use common\models\db\City;
use common\models\db\Survey;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var View $this
 * @var Survey $model
 * @var ActiveForm $form
 */
?>

<div class="survey-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'city_id')->dropDownList(City::getItems(), [
        'prompt' => Yii::t('app', 'Select...'),
    ]) ?>
    <?= $form->field($model, 'rating')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'gender')->dropDownList($model->getGenderTypesItems(), [
        'prompt' => Yii::t('app', 'Select...'),
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
