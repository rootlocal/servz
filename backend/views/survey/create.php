<?php

use common\models\db\Survey;
use yii\web\View;

/**
 * @var View $this
 * @var Survey $model
 */

$this->title = Yii::t('app', 'Create Survey');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Surveys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="survey-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
