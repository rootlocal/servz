<?php

use common\models\db\Survey;
use yii\helpers\Html;
use yii\web\View;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/**
 * @var View $this
 * @var Survey $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Surveys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

YiiAsset::register($this);
?>
<div class="survey-view">
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
            'email:email',
            'phone',

            [
                'attribute' => 'city_id',
                'format' => 'raw',
                'value' => fn(Survey $model) => $model->city->name,
            ],

            'rating',
            'gender',
            'created_at:datetime',
            'updated_at:datetime',
            'comment:text',
        ],
    ]) ?>

</div>
