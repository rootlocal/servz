<?php

use common\models\search\CitySearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

/**
 * @var View $this
 * @var CitySearch $searchModel
 * @var ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('app', 'Cities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="form-group">
        <?= Html::a(Yii::t('app', 'Create Site'), ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= $this->render('_grid', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]); ?>
    <?php Pjax::end(); ?>

</div>
