<?php

use hail812\adminlte\widgets\FlashAlert;
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\web\View;

/**
 * @var View $this
 * @var string $content
 */
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="m-0">
                        <?php
                        if (!is_null($this->title)) {
                            echo Html::encode($this->title);
                        } else {
                            echo Inflector::camelize($this->context->id);
                        }
                        ?>
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <?php
                    echo Breadcrumbs::widget([
                        'links' => $this->params['breadcrumbs'] ?? [],
                        'options' => [
                            'class' => 'breadcrumb'
                        ]
                    ]);
                    ?>
                </div><!-- /.col -->
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <?= FlashAlert::widget() ?>
        <?= $content ?><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>