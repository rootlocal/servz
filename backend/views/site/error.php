<?php

use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var string $name
 * @var string $message
 * @var Exception $exception
 */

$this->title = $name;
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>

<div class="error-page">
    <div class="error-content" style="margin-left: auto;">

        <h3><i class="fas fa-exclamation-triangle text-danger"></i> <?= Html::encode($name) ?></h3>

        <p class="error-message"><?= nl2br(Html::encode($message)) ?></p>

        <p>The above error occurred while the Web server was processing your request.<br>
            Please contact us if you think this is a server error. Thank you.</p>
    </div>
</div>

