<?php
/** 
 * @author: Harry Tang (giaduy@gmail.com)
 * @link: http://www.greyneuron.com 
 * @copyright: Grey Neuron
 */

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

NavBar::begin([
    'brandLabel' => \Yii::$app->name,
    'brandUrl' => \Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);

echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => $leftItems,
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $rightItems,
]);
NavBar::end();