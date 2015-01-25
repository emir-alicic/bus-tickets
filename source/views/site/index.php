<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::$app->name;
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Site under construction</h1>
        <h3>If you're an admin, please use this url:</h3>
        <?= Html::a('Administration', ['/admin']); ?>
    </div>
</div>
