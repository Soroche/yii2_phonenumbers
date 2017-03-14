<?php

use yii\db\Migration;
use yii\db\Schema;

class m170219_100036_PhoneBook extends Migration
{
    public function up()
    {
        //создание таблицы с контактами
        $this->createTable('person', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'sur_name'=> $this->string()->notNull(),
            'date_of_bday' => $this->date()->notNull(),
        ]);

        //создание таблицы с телефонными номерами
        $this->createTable('phone_number', [
            'id' => $this->primaryKey(),
            'cell_number' => $this->string()->notNull(),
            'person_id' => $this->integer()->notNull(),
        ]); 
    }

    public function down()
    {
        return false;
    }
}
