<?php

use common\models\search\SurveySearch;
use yii\bootstrap4\ActiveForm;
use yii\web\View;

/**
 * @var View $this
 * @var SurveySearch $model
 * @var ActiveForm $form
 */
?>

<div class="survey-search">

    <?php $form = ActiveForm::begin([
        'id' => 'survey-index-search',
        'class' => 'survey-search-form',
        'layout' => ActiveForm::LAYOUT_HORIZONTAL,
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1,
        ],
    ]);
    ?>

    <?= $form->field($model, 'search', [
        'template' => $this->render('_search_button'),
    ])->textInput([
        'maxlength' => true,
        'placeholder' => $model->getAttributeLabel('search'),
    ])->label(false)
        ->hint('<i class="fa fa-info-circle"></i> поиск анкеты по имени, телефону, email, городу, региону') ?>

    <?php ActiveForm::end() ?>

</div>
