<?php

use common\models\db\Survey;
use yii\web\View;

/**
 * @var View $this
 * @var Survey $model
 */

$this->title = Yii::t('app', 'Update Survey: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Surveys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="survey-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
