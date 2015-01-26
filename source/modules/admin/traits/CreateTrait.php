<?php

namespace app\modules\admin\traits;

use Yii;
use yii\helpers\Html;

trait CreateTrait
{
    public function createButton($modelClass=null)
    {
        return Html::a(Yii::t('app', 'Create {modelClass}', [
            'modelClass' => isset($modelClass)?$modelClass:ucfirst($this->tableName()),
        ]), 
        ['create'], 
        ['class' => 'btn btn-success']);
    }
};

?>
