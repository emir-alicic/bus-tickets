<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $IDcity
 * @property string $city
 * @property integer $active
 *
 * @property Company[] $companies
 * @property Station[] $stations
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active'], 'integer'],
            [['city'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDcity' => Yii::t('app', 'Idcity'),
            'city' => Yii::t('app', 'City'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['IDcity' => 'IDcity']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStations()
    {
        return $this->hasMany(Station::className(), ['IDcity' => 'IDcity']);
    }
}
