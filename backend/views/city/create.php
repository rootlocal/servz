<?php

use common\models\db\City;
use yii\web\View;

/**
 * @var View $this
 * @var City $model
 */

$this->title = Yii::t('app', 'Create Site');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
