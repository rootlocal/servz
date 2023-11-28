<?php

use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

$menuItems = [
    Html::tag('li', Html::a('<i class="fas fa-bars"></i>', '#', [
        'class' => 'nav-link',
        'role' => 'button',
        'data-widget' => 'pushmenu',
    ]), ['class' => 'nav-item']),

    ['label' => 'Home', 'url' => ['/site/index']]
];

if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems = ArrayHelper::merge($menuItems, [
        [
            'label' => Yii::t('app', 'Surveys'),
            'url' => ['/survey/index']
        ]
    ]);

}

return $menuItems;