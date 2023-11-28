<?php

use common\models\db\Region;
use yii\web\View;

/**
 * @var View $this
 * @var Region $model
 */

$this->title = Yii::t('app', 'Create Region');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
