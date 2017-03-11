<?php

use yii\db\Migration;
use yii\db\Schema;

class m170219_100036_PhoneBook extends Migration
{
    public function up()
    {

        //создание таблицы с людьми
        $this->createTable('person', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'sur_name'=> $this->string()->notNull(),
            'date_of_bday' => $this->date()->notNull(),
        ]);

        //создание таблицы с телефонными номерами
        $this->createTable('phone_numbers', [
            'id' => $this->primaryKey(),
            'phone' => $this->string()->notNull(),
            'pesron_id' => $this->integer(),
        ]); 

        // creates index for column 'pesron_id'
        $this->createIndex(
            'idx_phone_numbers_person',
            'phone_numbers',
            'pesron_id'
        );

        // add foreign key for table
        /*$this->addForeignKey(
            'fk_phone_numbers_person_id',
            'phone_numbers',
            'pesron_id',
            'pesron',
            'id',
            'CASCADE', 
            'CASCADE'
        );*/
    }

    public function down()
    {

        $this->dropTable('person');
        $this->dropTable('phone_numbers');

        //echo "m170219_100036_PhoneBook cannot be reverted.\n";
    /*
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-post-author_id',
            'post'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-post-author_id',
            'post'
        );
    */

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
