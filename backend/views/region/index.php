<?php

use common\models\search\RegionSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

/**
 * @var View $this
 * @var RegionSearch $searchModel
 * @var ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('app', 'Regions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-index">
    <div class="form-group">
        <?= Html::a(Yii::t('app', 'Create Region'), ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= $this->render('_grid', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]); ?>

    <?php Pjax::end(); ?>

</div>
