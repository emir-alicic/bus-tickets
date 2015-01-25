<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $IDcompany
 * @property integer $IDcity
 * @property string $name
 * @property integer $active
 *
 * @property City $iDcity
 * @property Ticket[] $tickets
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDcity', 'active'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDcompany' => Yii::t('app', 'Idcompany'),
            'IDcity' => Yii::t('app', 'Idcity'),
            'name' => Yii::t('app', 'Name'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDcity()
    {
        return $this->hasOne(City::className(), ['IDcity' => 'IDcity']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['IDcompany' => 'IDcompany']);
    }
}
