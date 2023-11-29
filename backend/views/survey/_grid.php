<?php

use common\models\db\City;
use common\models\db\Region;
use common\models\search\SurveySearch;
use common\models\db\Survey;
use hail812\adminlte3\yii\grid\ActionColumn;
use kartik\date\DatePicker;
use yii\bootstrap4\Html;
use yii\bootstrap4\LinkPager;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Url;
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
    'layout' => '<div class="box-header">{summary}{pager}</div>{items}<div class="box-footer">{pager}</div>',

    'tableOptions' => [
        'class' => 'table table-striped table-hover',
    ],

    'pager' => [
        'class' => LinkPager::class,
        'options' => [
            'class' => 'grid-pager',
        ]
    ],

    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
            'headerOptions' => ['width' => '20px', 'class' => 'text-center'],
        ],

        [
            'attribute' => 'name',
            'format' => 'raw',
            'value' => function (Survey $model) {
                return Html::a('<i class="fa fa-user"></i> ' . $model->name,
                    Url::to(['/survey/view', 'id' => $model->id]), ['data-pjax' => 0]);
            }
        ],

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

        [
            'attribute' => 'gender',
            'filter' => Survey::getGenderTypesItems(),
            'format' => 'raw',
            'value' => fn(Survey $model) => $model::getGenderTypeItem($model->gender),
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
            'template' => '{delete}',
            'urlCreator' => function ($action, Survey $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            }
        ],
    ],
]); ?>
