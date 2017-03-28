<?php

namespace frontend\models;

use Yii;
use borales\extensions\phoneInput\PhoneInputValidator;

/**
 * This is the model class for table "phone_number".
 *
 * @property integer $id
 * @property string  $cell_number
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
            [['cell_number'], 'string', 'max' => 25],
            [['cell_number'], PhoneInputValidator::className()],
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
            'cell_number' => 'Номер телефона',
            'person_id' => 'Идентификатор владельца',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    /**
     * Removing extraneous characters and check whether all the digits in the cell_number 
     * 
     * @param string $cellNumber
     * @return cellNumber
     */
    public function phoneInputValidator($cellNumber)
    {
        $cellNumber = preg_replace('/\s|\+|-|\(|\)/','', $cellNumber);
        if(is_numeric($cellNumber))
        {
            if(strlen($cellNumber) < 5)
            {
                return false;
            }
            else
            {
                return $cellNumber;            
            }
        }
        else
        {
            return false;
        }

    }
}
