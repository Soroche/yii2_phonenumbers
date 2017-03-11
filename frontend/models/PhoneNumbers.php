<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "phone_numbers".
 *
 * @property integer $id
 * @property string $phone
 * @property integer $pesron_id
 *
 * @property Person $id0
 */
class PhoneNumbers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phone_numbers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone'], 'required'],
            [['pesron_id'], 'integer'],
            [['phone'], 'string', 'max' => 15],
            //[['id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'phone' => 'Номер',
            'pesron_id' => 'Pesron ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /*public function getId0()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }
    */

    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'pesron_id']);
    }


    
}
