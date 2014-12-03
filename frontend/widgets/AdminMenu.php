<?php
/**
 * @author: Harry Tang (giaduy@gmail.com)
 * @link: http://www.greyneuron.com
 * @copyright: Grey Neuron
 */

namespace frontend\widgets;
use \yii\bootstrap\Widget;

class AdminMenu extends Widget
{

    public $leftItems = [];
    public $rightItems = [];

    public function init()
    {
        parent::init();

        $this->leftItems = [
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
        ];

        $this->getModuleMenuItems();

    }

    /**
     * @inheritdoc
     * @return string|void
     */
    public function run()
    {
        echo $this->render('topMenu', ['leftItems' => $this->leftItems, 'rightItems' => $this->rightItems]);
    }

    /**
     * Get harrytang vendor top menu items
     */
    protected function getModuleMenuItems()
    {

        /* find modules menu items */
        $cache = \Yii::$app->cache;
        $key = 'scandir-vendor-harrytang';
        $modules = $cache->get($key);
        if ($modules === false) {
            $modules = scandir(\Yii::$app->vendorPath . DIRECTORY_SEPARATOR . 'harrytang');
            $cache->set($key, $modules);

        }


        $menuFilePath = 'topMenu.php';
        foreach ($modules as $module) {

            if (!preg_match('/[\.]+/', $module)) {
                $moduleMenuFile = \Yii::$app->vendorPath . DIRECTORY_SEPARATOR . 'harrytang' . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR . $menuFilePath;
                if (is_file($moduleMenuFile)) {
                    $items = require($moduleMenuFile);
                    foreach ($items['left'] as $itemLeft) {
                        $this->leftItems[] = $itemLeft;
                    }
                    foreach ($items['right'] as $itemRight) {
                        $this->rightItems[] = $itemRight;
                    }
                }
            }
        }

    }

} 