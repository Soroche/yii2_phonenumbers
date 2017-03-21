<?php

namespace frontend\models;

use Yii;
//use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $sur_name
 * @property string $date_of_bday
 *
 * @property PhoneNumber[] $phoneNumbers
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'sur_name', 'date_of_bday'], 'required'],
            [['date_of_bday'], 'safe'],
            [['first_name', 'last_name', 'sur_name'], 'string', 'max' => 30],
            [['first_name', 'last_name','sur_name'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],
            [['date_of_bday'],'date', 'format' => 'dd.mm.yyyy'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'sur_name' => 'Отчество',
            'date_of_bday' => 'Дата рождения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhoneNumbers()
    {
        return $this->hasMany(PhoneNumber::className(), ['person_id' => 'id']);
    }

    /** 
     * Convert date_of_bday to date format to write in the database
     * @param  string $date_of_bday
     * @return data $date_of_bday
     */
    public function beforeSave($date_of_bday) 
    {
       if(parent::beforeSave($date_of_bday)) 
       {
           $this->date_of_bday = date('Y-m-d', strtotime($this->date_of_bday));

           return true;
       } 
       else 
       {
           return false;
       }
    }

    /** 
     * Convert date_of_bday to format 'd.m.Y'
     * @return string 
     */

    public function afterFind() 
    {
       $date = date('d.m.Y', strtotime($this->date_of_bday));
       $this->date_of_bday = $date;
       parent::afterFind();
    }

}
