<?php
use \yii\widgets\Breadcrumbs;
use \frontend\widgets\Alert;


/* @var $this \yii\web\View */
/* @var $content string */

?>
<?php $this->beginContent('@app/views/layouts/base.php'); ?>
<div class="wrap">
    <?= \frontend\widgets\TopMenu::widget() ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<?php $this->endContent(); ?>