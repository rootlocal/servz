<?php

use hail812\adminlte3\assets\AdminLteAsset;
use hail812\adminlte3\assets\PluginAsset;
use yii\web\View;

/**
 * @var $this View
 * @var $content string
 */

AdminLteAsset::register($this);
PluginAsset::register($this)->add(['fontawesome', 'icheck-bootstrap']);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 3 | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition login-page">
    <?php $this->beginBody() ?>
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= Yii::$app->homeUrl ?>"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->

        <?= $content ?>
    </div>
    <!-- /.login-box -->

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>