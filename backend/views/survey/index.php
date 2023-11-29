<?php

use common\models\search\SurveySearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

/**
 * @var View $this
 * @var SurveySearch $searchModel
 * @var ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('app', 'Surveys');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-index">
    <?php Pjax::begin(); ?>

    <div class="row">
        <div class="col-12">
            <div class="float-right">
                <?= $this->render('search/_search', ['model' => $searchModel]) ?>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <?= $this->render('_grid', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]); ?>
    </div>
    <?php Pjax::end(); ?>

</div>
