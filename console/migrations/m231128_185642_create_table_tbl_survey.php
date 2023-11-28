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
            'email' => $this->string()->notNull()->unique(),
            'phone' => $this->string()->notNull(),
            'site_id' => $this->integer()->notNull(),
            'query' => $this->string()->notNull(),
            'gender' => $this->smallInteger()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('survey_site_id_fk',
            $this->_table, 'site_id',
            'site', 'id',
            'CASCADE', 'CASCADE'
        );
    }



    public function safeDown()
    {
        $this->dropTable($this->_table);
        //echo "m231128_185642_create_table_tbl_survey cannot be reverted.\n";
        //return false;
    }
}
