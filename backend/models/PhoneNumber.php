<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phone_number".
 *
 * @property integer $id
 * @property string $cell_number
 * @property integer $person_id
 *
 * @property Person $person
 */
class PhoneNumber extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phone_number';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cell_number', 'person_id'], 'required'],
            [['person_id'], 'integer'],
            [['cell_number'], 'string', 'max' => 255],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cell_number' => 'Cell Number',
            'person_id' => 'Person ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }
}
