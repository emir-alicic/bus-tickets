<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\modules\admin\models\City;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\StationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Stations');
?>
<div class="station-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= $searchModel->createButton() ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
            'class' => 'yii\grid\SerialColumn'],
            'station',
            $searchModel->gridRelationalColumn('IDcity', City::find()->where('active!=3')->all(), 'IDcity', 'city'),
            $searchModel->gridActiveColumn(),
            $searchModel->actionColumn(),
        ],
    ]); ?>

</div>
