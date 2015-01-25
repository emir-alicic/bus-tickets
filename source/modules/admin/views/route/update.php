<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Route */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Route',
]) . ' ' . $model->IDroute;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Routes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDroute, 'url' => ['view', 'id' => $model->IDroute]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="route-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
