<?php

use yii\helpers\ArrayHelper;

$items = [
    [
        'label' => 'Site Content',
        'icon' => 'th',
        'badge' => '<span class="right badge badge-danger">New</span>',
        'items' => [
            [
                'label' => Yii::t('app', 'Regions'),
                'url' => ['/region/index'],
                'icon' => 'book',
            ],
            [
                'label' => Yii::t('app', 'Cities'),
                'url' => ['/city/index'],
                'icon' => 'tags',
            ],
            [
                'label' => Yii::t('app', 'Surveys'),
                'url' => ['/survey/index'],
                'icon' => 'users',
            ],
        ]
    ],
];

if (YII_DEBUG) {
    $items = ArrayHelper::merge($items, [
        ['label' => 'Yii2 PROVIDED', 'header' => true],
        ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
        ['label' => 'Gii', 'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
        ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
    ]);
}

return $items;