<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\City */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'City',
]) . ' ' . $model->IDcity;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDcity, 'url' => ['view', 'id' => $model->IDcity]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="city-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
