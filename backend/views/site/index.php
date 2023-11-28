<?php

/**
 * @var yii\web\View $this
 * @var integer $survey_total
 * @var integer $city_total
 * @var integer $regions_total
 */

use hail812\adminlte\widgets\SmallBox;

$this->title = Yii::t('app', 'Home Page');
?>
<div class="site-index">
    <div class="body-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <?= SmallBox::widget([
                        'title' => $survey_total,
                        'text' => Yii::t('app', 'Survey Total'),
                        'icon' => 'fas fa-users',
                        'theme' => 'gradient-success',
                    ]) ?>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <?= SmallBox::widget([
                        'title' => $city_total,
                        'text' => Yii::t('app', 'City Total'),
                        'icon' => 'fas fa-tags',
                        'theme' => 'gradient-success',
                    ]) ?>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <?= SmallBox::widget([
                        'title' => $regions_total,
                        'text' => Yii::t('app', 'Regions Total'),
                        'icon' => 'fas fa-tags',
                        'theme' => 'gradient-success',
                    ]) ?>
                </div>

            </div>
        </div>
    </div>
</div>
