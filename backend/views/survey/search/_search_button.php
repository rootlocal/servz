<?php

use yii\bootstrap4\Html;
use yii\web\View;


/**
 * @var View $this
 */
?>

<div class="form-group field-search-form required has-error clearfix">
    <div class="input-group col-12">{input}

        <div class="input-group-append">
            <?= Html::submitButton(
                '<i class="fa fa-search"></i> ' . Yii::t('app', 'Search'), [
                'class' => 'btn btn-sm btn-success',
                'type' => 'submit',
            ]) ?>
        </div>

        <div class="col-12">{error}</div>
        <div class="col-12">{hint}</div>

    </div>
</div>