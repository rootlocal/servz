<?php

namespace backend\assets;

use hail812\adminlte3\assets\BaseAsset;
use hail812\adminlte3\assets\PluginAsset;
use yii\web\AssetBundle;

/**
 * Class AdminLteAsset
 *
 * @author Alexander Zakharov <sys@eml.ru>
 * @package backend\assets
 */
class AdminLteAsset extends AssetBundle
{
    /** @var string */
    public $sourcePath = '@vendor/almasaeed2010/adminlte/dist';
    /** @var string[] */
    public $css = ['css/adminlte.min.css'];
    /** @var string[] */
    public $js = ['js/adminlte.min.js'];
    /** @var string[] */
    public $depends = [
        BaseAsset::class,
        PluginAsset::class
    ];
}