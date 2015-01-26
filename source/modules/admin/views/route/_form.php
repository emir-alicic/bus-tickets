<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\modules\admin\models\Station;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Route */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="route-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $model->formRelationalDropDown($form, 'IDstationFrom', Station::find()->where('active!=3')->all(), 'IDstation', 'station'); ?>

    <?= $model->formRelationalDropDown($form, 'IDstationTo', Station::find()->where('active!=3')->all(), 'IDstation', 'station'); ?>

    <?= $model->formActiveDropDown($form); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
