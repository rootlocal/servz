<?php

namespace backend\assets;

use rootlocal\fonts\FontsAsset;
use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Class AppAsset Main backend application asset bundle.
 *
 * @author Alexander Zakharov <sys@eml.ru>
 * @package backend\assets
 */
class AppAsset extends AssetBundle
{
    /** @var string[] */
    public $css = ['css/site.css'];
    /** @var string[] */
    public $js = [];
    /** @var string[] */
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
        FontsAsset::class,
    ];


    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->sourcePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'files';
    }
}
