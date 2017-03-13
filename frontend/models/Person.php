<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;


/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property string $name
 * @property string $last_name
 * @property string $sur_name
 * @property string $date_of_bday
 *
 * @property PhoneNumbers $phoneNumbers
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
            [['name', 'last_name', 'sur_name', 'date_of_bday'], 'required'],
            [['date_of_bday'], 'safe'],
            [['name', 'last_name', 'sur_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'last_name' => 'Фамилия',
            'sur_name' => 'Отчество',
            'date_of_bday' => 'Дата рождения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhonenumbers()
    {
        return $this->hasMany(PhoneNumbers::className(), ['pesron_id' => 'id']);
    }

    /*public function getPhones()
    {
        $dataProvider = new ActiveDataProvider(
            [
            'query'=> PhoneNumbers::find()->where(['pesron_id'=>$id]),
            ]);

        return $dataProvider;
    }*/
}
