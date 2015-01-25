<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Ticket */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ticket',
]) . ' ' . $model->IDticket;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tickets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDticket, 'url' => ['view', 'id' => $model->IDticket]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ticket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
