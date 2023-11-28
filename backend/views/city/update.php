<?php

use common\models\db\City;
use yii\web\View;

/**
 * @var View $this
 * @var City $model
 */

$this->title = Yii::t('app', 'Update City: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="site-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
