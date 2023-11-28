<?php

use yii\db\Migration;

/**
 * Class m231128_184759_create_table_tbl_region
 */
class m231128_184759_create_table_tbl_region extends Migration
{
    private string $_table = '{{%region}}';


    public function safeUp()
    {
        $this->createTable($this->_table, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable($this->_table);
    }
}
