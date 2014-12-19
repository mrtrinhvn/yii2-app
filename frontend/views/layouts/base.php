<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<!--
++++++++++++++++++++++++++++++++++++++++++++++++++++
Developed by: Harry Tang (giaduy[at]gmail.com | +8490 909 7275)
Powered by: Grey Neuron (http://www.greyneuron.com)
++++++++++++++++++++++++++++++++++++++++++++++++++++
-->
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
<?= \harrytang\core\ModalLoading::widget() ?>
<?= \harrytang\core\GoogleAnalytics::widget(['trackingId'=>'']) ?>
</body>
</html>
<?php $this->endPage() ?>