<?php

use hail812\adminlte\widgets\Menu;
use yii\bootstrap4\Html;
use yii\web\View;

/**
 * @var View $this
 */
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <?php $brandImage = Html::img('@web/static/img/logo.png', [
        'alt' => 'logo',
        'class' => 'brand-image img-circle elevation-3',
    ]);

    echo Html::a(
        $brandImage .
        sprintf('<span class="brand-text font-weight-light">%s</span>', Yii::$app->name),
        Yii::$app->homeUrl, [
        'class' => 'brand-link',
    ]) ?>

    <?php if (!Yii::$app->user->isGuest): ?>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">

                    <?= Html::img('@web/static/img/foto.jpg', [
                        'alt' => 'User Image',
                        'class' => 'img-circle elevation-2',
                    ]) ?>


                </div>

                <div class="info">
                    <?= Html::a(Yii::$app->user->identity->username, ['/user/profile'], [
                        'class' => 'd-block',
                    ]) ?>
                </div>

            </div>

            <?php /*
        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu --> */ ?>
            <nav class="mt-2">
                <?= Menu::widget([
                    'items' => require dirname(__FILE__)
                        . DIRECTORY_SEPARATOR . 'sidebar_menu.php'
                ]); ?>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->

    <?php endif; ?>

</aside>