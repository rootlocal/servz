<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Class FontAwesomeAsset
 *
 * @author Alexander Zakharov <sys@eml.ru>
 * @package backend\assets
 */
class FontAwesomeAsset extends AssetBundle
{
    /** @var string */
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins/fontawesome-free';
    /** @var string[] */
    public $css = ['css/all.min.css'];
}