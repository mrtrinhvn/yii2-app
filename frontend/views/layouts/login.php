<?php
use \yii\widgets\Breadcrumbs;
use \frontend\widgets\Alert;


/* @var $this \yii\web\View */
/* @var $content string */

?>
<?php $this->beginContent('@app/views/layouts/base.php'); ?>
    <div class="login-page">
        <div class="wrap">
            <?= \frontend\widgets\TopMenu::widget() ?>
            <div class="container" style="">

                <?= Alert::widget() ?>

                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
                        <?= Alert::widget() ?>
                        <?= $content ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>