<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\modules\admin\models\Station;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\RouteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Routes');
?>
<div class="route-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= $searchModel->createButton() ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            $searchModel->gridRelationalColumn('IDstationFrom', Station::find()->all(), 'IDstation', 'station'),
            $searchModel->gridRelationalColumn('IDstationTo', Station::find()->all(), 'IDstation', 'station'),
            $searchModel->gridActiveColumn(),
            $searchModel->actionColumn(),
        ],
    ]); ?>

</div>
