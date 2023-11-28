<?php

use yii\db\Migration;

/**
 * Class m231128_184806_create_table_tbl_city
 */
class m231128_184806_create_table_tbl_city extends Migration
{
    private string $_table = '{{%city}}';


    public function safeUp()
    {
        $this->createTable($this->_table, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'region_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createIndex('city_name_region_id_ukey', $this->_table, ['name', 'region_id'], true);

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
    }

}
