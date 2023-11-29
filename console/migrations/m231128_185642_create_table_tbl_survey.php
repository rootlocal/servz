<?php

use yii\db\Migration;

/**
 * Class m231128_185642_create_table_tbl_survey
 */
class m231128_185642_create_table_tbl_survey extends Migration
{
    private string $_table = '{{%survey}}';


    public function safeUp()
    {
        $this->createTable($this->_table, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'city_id' => $this->integer()->notNull(),
            'rating' => $this->smallInteger()->notNull(),
            'gender' => $this->smallInteger()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'comment' => $this->text()->notNull(),
        ]);

        $this->addForeignKey('survey_city_id_fk',
            $this->_table, 'city_id',
            'city', 'id',
            'CASCADE', 'CASCADE'
        );
    }


    public function safeDown()
    {
        $this->dropTable($this->_table);
    }
}
