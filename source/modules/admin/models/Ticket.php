<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property integer $IDticket
 * @property integer $IDcompany
 * @property integer $IDroute
 * @property double $price
 * @property integer $active
 *
 * @property Company $iDcompany
 * @property Route $iDroute
 * @property TicketTime[] $ticketTimes
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDcompany', 'IDroute', 'price'], 'required'],
            [['IDcompany', 'IDroute', 'active'], 'integer'],
            [['price'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDticket' => Yii::t('app', 'Idticket'),
            'IDcompany' => Yii::t('app', 'Idcompany'),
            'IDroute' => Yii::t('app', 'Idroute'),
            'price' => Yii::t('app', 'Price'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDcompany()
    {
        return $this->hasOne(Company::className(), ['IDcompany' => 'IDcompany']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDroute()
    {
        return $this->hasOne(Route::className(), ['IDroute' => 'IDroute']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketTimes()
    {
        return $this->hasMany(TicketTime::className(), ['IDticket' => 'IDticket']);
    }
}
