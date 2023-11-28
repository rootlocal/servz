<?php

use common\models\db\City;
use common\models\db\Survey;
use frontend\models\SurveyForm;
use yii\web\View;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/**
 * @var View $this
 * @var SurveyForm $model
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

    <?= $form->field($model, 'gender')->dropDownList(Survey::getGenderTypesItems(), [
        'prompt' => Yii::t('app', 'Select...'),
    ]) ?>


    <?= $form->field($model, 'rating')->dropDownList($model::getRatingItems(), [
        'prompt' => Yii::t('app', 'Select...'),
    ]) ?>


    <?= $form->field($model, 'comment')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton(
            Yii::t('app', 'Send'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
