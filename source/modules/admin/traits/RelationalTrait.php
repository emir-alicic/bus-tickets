<?php

namespace app\modules\admin\traits;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

trait RelationalTrait
{
    public $relDataArr=['' => ''];

    public function gridRelationalColumn($attr, $arr, $key, $value)
    {
        $this->relDataArr += ArrayHelper::map($arr, $key, $value);

        return [
	    'attribute' => $attr,
	    'filter' => Html::activeDropDownList($this, $attr, $this->relDataArr, ['class' => 'form-control']),
	    'value' => function ($model, $key, $index, $column)
            {
                $attr=$column->attribute;
                return $this->relDataArr[$model->$attr];
            }
	];
   }

    public function formRelationalDropdown($form, $attr, $arr, $key, $value)
    {
        $this->relDataArr += ArrayHelper::map($arr, $key, $value);

        echo $form->field($this, $attr)->dropDownList($this->relDataArr, ['class' => 'form-control']);
    }
};

?>
