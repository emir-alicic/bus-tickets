<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\modules\admin\models\City;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Station */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="station-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $model->formRelationalDropDown($form, 'IDcity', City::find()->where('active!=3')->all(), 'IDcity', 'city'); ?>

    <?= $form->field($model, 'station')->textInput(['maxlength' => 50]) ?>

    <?= $model->formActiveDropDown($form); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
