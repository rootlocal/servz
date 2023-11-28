<?php

use common\models\db\City;
use common\models\db\Region;
use common\models\search\SurveySearch;
use common\models\db\Survey;
use kartik\date\DatePicker;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\web\View;

/**
 * @var View $this
 * @var SurveySearch $searchModel
 * @var ActiveDataProvider $dataProvider
 */
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'name',
        'email:email',
        'phone',

        [
            'attribute' => 'region_id',
            'label' => Yii::t('app', 'Region'),
            'filter' => Region::getItems(),
            'format' => 'raw',
            'value' => fn(Survey $model) => $model->city->region->name,
        ],

        [
            'attribute' => 'city_id',
            'filter' => City::getItems(),
            'format' => 'raw',
            'value' => fn(Survey $model) => $model->city->name,
        ],

        'rating',

        [
            'attribute' => 'created_at',
            'format' => 'date',
            'headerOptions' => [
                'style' => 'width: 210px;  min-width:210px;',
                'class' => 'text-center',
            ],
            'filter' => DatePicker::widget([
                'bsVersion' => '4.x',
                'model' => $searchModel,
                'attribute' => 'created_at',
                'value' => date('d-M-Y', strtotime('+2 days')),

                'options' => [
                    'class' => 'form-control',
                    'placeholder' => 'Select date',
                    'autocomplete' => 'off',
                ],
                'language' => 'ru',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'removeIcon' => '<i class="fa fa-trash text-primary"></i>',
                'pluginOptions' => [
                    'calendarWeeks' => true,
                    'autoclose' => true,
                    'todayBtn' => false,
                    'format' => 'dd.mm.yyyy',
                    'todayHighlight' => true
                ],
            ]),
        ],

        [
            'attribute' => 'updated_at',
            'format' => 'date',
            'headerOptions' => [
                'style' => 'width: 210px;  min-width:210px;',
                'class' => 'text-center',
            ],
            'filter' => DatePicker::widget([
                'bsVersion' => '4.x',
                'model' => $searchModel,
                'attribute' => 'updated_at',
                'value' => date('d-M-Y', strtotime('+2 days')),

                'options' => [
                    'class' => 'form-control',
                    'placeholder' => 'Select date',
                    'autocomplete' => 'off',
                ],
                'language' => 'ru',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'removeIcon' => '<i class="fa fa-trash text-primary"></i>',
                'pluginOptions' => [
                    'calendarWeeks' => true,
                    'autoclose' => true,
                    'todayBtn' => false,
                    'format' => 'dd.mm.yyyy',
                    'todayHighlight' => true
                ],
            ]),
        ],

        [
            'class' => ActionColumn::class,
            'urlCreator' => function ($action, Survey $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            }
        ],
    ],
]); ?>
