<?php

use frontend\models\SurveyForm;
use yii\web\View;

/**
 * @var View $this
 * @var SurveyForm $model
 */

$this->title = 'Анкета';
?>
<div class="site-index">
    <div class="body-content">
        <?= $this->render('_form', ['model' => $model]) ?>
    </div>
</div>
