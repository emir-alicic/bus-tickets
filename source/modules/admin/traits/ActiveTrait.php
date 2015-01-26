<?php

namespace app\modules\admin\traits;

use Yii;
use yii\helpers\Html;

trait ActiveTrait
{
    private $activeData=[
	    '' => '',
	    '1' => 'Active',
	    '2' => 'Inactive',
    ]; 

    public function gridActiveColumn()
    {
        return [
	    'attribute' => 'active',
	    'filter' => Html::activeDropDownList($this, 'active', $this->activeData, ['class' => 'form-control']),
	    'value' => function ($model, $key, $index, $column)
            {
                return $model->activeData[$model->active];
            }
	];
   }

   public function actionColumn()
   {
        return [
               'class' => 'yii\grid\ActionColumn',
	       'template' => '{update}{delete}{activate}{deactivate}',
	       'buttons' => [
	           'activate' => function ($url, $model, $key){
		        return ($model->active==2)?
                            Html::a('', ['activate', 'id' => $key], ['class'=>'glyphicon glyphicon-ok-circle'])
                            :false;
		   },
                   'deactivate' => function ($url, $model, $key){
		        return ($model->active==1)?
                            Html::a('', ['deactivate', 'id' => $key], ['class'=>'glyphicon glyphicon-ban-circle'])
                            :false;
		   },
            ],
        ];
    }

    public function deactivate()
    {
        $this->active=2;
        $this->save(false);
    }

    public function activate()
    {
        $this->active=1;
        $this->save(false);
    }

    public function delete()
    {
        $this->active=3;
        $this->save(false);
    }

    public function formActiveDropdown($form)
    {
        echo $form->field($this, 'active')->dropDownList($this->activeData, ['class' => 'form-control']);
    }
};

?>
