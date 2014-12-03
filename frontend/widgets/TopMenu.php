<?php
/**
 * @author: Harry Tang (giaduy@gmail.com)
 * @link: http://www.greyneuron.com
 * @copyright: Grey Neuron
 */

namespace frontend\widgets;


use Yii;
use yii\bootstrap\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class TopMenu extends Widget
{

    public $leftItems = [];
    public $rightItems = [];
    public $userItems = [];

    public function init()
    {
        parent::init();
        // default
        $this->leftItems = [
            ['label' => 'About', 'url' => ['/site/about']],
            //['label' => 'About', 'url' => Url::to(['/site/about'])],
            ['label' => 'Contact', 'url' => ['/site/contact']],
        ];


    }

    /**
     * @inheritdoc
     * @return string|void
     */
    public function run()
    {
        $this->getModuleMenuItems();

        // Admin CP and logout user item
        if (isset($this->userItems[0])) {
            $this->userItems[0]['items'][] = ['label' => Yii::t('app', 'Admin CP'), 'url' => ['/admin'], 'visible' => Yii::$app->user->can('admin')];
            $this->userItems[0]['items'][] = ['label' => Yii::t('app', 'Logout'), 'url' => ['/account/logout']];
        }
        echo $this->render('topMenu', [
            'leftItems' => $this->leftItems,
            'rightItems' => $this->rightItems,
            'userItems' => $this->userItems
        ]);
    }

    /**
     * Get harrytang vendor top menu items
     */
    protected function getModuleMenuItems()
    {
        /* user item */
        if (!Yii::$app->user->isGuest) {
            $this->userItems[0] = [
                'label' => '<span class="glyphicon glyphicon-user"></span> ' . Html::encode(\Yii::$app->user->identity->username),
                'items' => [],
            ];
        }


        /* find modules menu items */
        $cache = \Yii::$app->cache;
        $key = 'scandir-vendor-harrytang';
        $modules = $cache->get($key);
        if ($modules === false) {
            $modules = scandir(\Yii::$app->vendorPath . '/harrytang');
            $cache->set($key, $modules);
        }


        $menuFilePath = 'topMenu.php';
        foreach ($modules as $module) {

            if (!preg_match('/[\.]+/', $module)) {
                $moduleMenuFile = \Yii::$app->vendorPath . '/harrytang/' . $module . '/' . $menuFilePath;
                if (is_file($moduleMenuFile)) {
                    $items = require($moduleMenuFile);
                    foreach ($items['left'] as $item) {
                        $this->leftItems[] = $item;
                    }
                    foreach ($items['right'] as $item) {
                        $this->rightItems[] = $item;
                    }
                    if (!Yii::$app->user->isGuest && $items['user']) {
                        foreach ($items['user'] as $item) {
                            $this->userItems[0]['items'][] = $item;
                        }
                        $this->userItems[0]['items'][] = ['label' => '', 'options' => ['class' => 'divider']];
                    }
                }
            }
        }

    }

} 