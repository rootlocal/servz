<?php

use common\models\db\Region;
use yii\helpers\Html;
use yii\web\View;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/**
 * @var View $this
 * @var Region $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

YiiAsset::register($this);
?>
<div class="region-view">

    <div class="form-group">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
