<?php

use yii\db\Migration;

/**
 * Class m231128_184806_create_table_tbl_site
 */
class m231128_184806_create_table_tbl_site extends Migration
{
    private string $_table = '{{%site}}';


    public function safeUp()
    {
        $this->createTable($this->_table, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique(),
            'region_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('site_region_id_fk',
            $this->_table, 'region_id',
            'region', 'id',
            'CASCADE', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->_table);
        //echo "m231128_184806_create_table_tbl_site cannot be reverted.\n";
        //return false;
    }

}
