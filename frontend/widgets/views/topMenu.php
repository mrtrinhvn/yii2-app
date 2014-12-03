<?php
/** 
 * @author: Harry Tang (giaduy@gmail.com)
 * @link: http://www.greyneuron.com 
 * @copyright: Grey Neuron
 */

/* @var $leftItems array */
/* @var $rightItems array */
/* @var $userItems array */

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
    'encodeLabels'=>false,
    'items' => $leftItems,
]);


echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'encodeLabels'=>false,
    'items' => array_merge($rightItems, $userItems),
]);
NavBar::end();