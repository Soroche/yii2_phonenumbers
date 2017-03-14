<?php

use yii\db\Migration;

class m170314_081144_ChangePhoneBook extends Migration
{
    public function up()
    {
        //создание индекса для 'person_id'
        $this->createIndex(
            'fk_phone_number_person',
            'phone_number',
            'person_id'
        );

        //создание внешнего ключа
        $this->addForeignKey(
            'fk_phone_number_person',
            'phone_number',
            'person_id',
            'person',
            'id', 
            'CASCADE'
        );

    }

    public function down()
    {
        echo "m170314_081144_ChangePhoneBook cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
