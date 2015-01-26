<?php

namespace app\modules\admin\traits;

use Yii;
use yii\helpers\Html;

trait ActiveCTrait
{
    public function actionDeactivate($id)
    {
        $model = $this->findModel($id)->deactivate();

        $this->redirect(['index']);
    }

    public function actionActivate($id)
    {
        $model = $this->findModel($id)->activate();

        $this->redirect(['index']);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        $this->redirect(['index']);
    }
};

?>
