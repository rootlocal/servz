<?php

use yii\bootstrap4\Html;
use yii\web\View;

/**
 * @var View $this
 */
?>

<footer class="main-footer">
    &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?>
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
    </div>
</footer>