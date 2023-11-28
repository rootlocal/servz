<?php

use common\models\db\Region;
use yii\web\View;

/**
 * @var View $this
 * @var Region $model
 */

$this->title = Yii::t('app', 'Update Region: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="region-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
