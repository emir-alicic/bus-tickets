<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Station */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Station',
]) . ' ' . $model->station;

?>
<div class="station-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
