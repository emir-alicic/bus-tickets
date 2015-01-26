<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\traits\CreateTrait;
use app\modules\admin\traits\ActiveTrait;
use app\modules\admin\traits\RelationalTrait;

/**
 * This is the model class for table "station".
 *
 * @property integer $IDstation
 * @property integer $IDcity
 * @property string $station
 * @property integer $active
 *
 * @property Route[] $routes
 * @property City $iDcity
 */
class Station extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    use activeTrait;
    use createTrait;
    use relationalTrait;

    public static function tableName()
    {
        return 'station';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDcity', 'active', 'station'], 'required'],
            [['IDcity', 'active'], 'integer'],
            [['station'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDstation' => Yii::t('app', 'Idstation'),
            'IDcity' => Yii::t('app', 'City'),
            'station' => Yii::t('app', 'Station'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoutes()
    {
        return $this->hasMany(Route::className(), ['IDstationTo' => 'IDstation']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDcity()
    {
        return $this->hasOne(City::className(), ['IDcity' => 'IDcity']);
    }
}
