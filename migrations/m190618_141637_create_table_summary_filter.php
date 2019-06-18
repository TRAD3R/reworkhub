<?php

use yii\db\Migration;

/**
 * Class m190618_141637_create_table_summary
 *
 * Связь между резюме и фильтром
 */
class m190618_141637_create_table_summary_filter extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%summary_filter}}'
            , [
                'id' => $this->primaryKey()
                , 'summary_id' => $this->integer(),
                'filter_id' => $this->integer(),
            ]
            , $tableOptions
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%summary_filter}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190618_141637_create_table_summary cannot be reverted.\n";

        return false;
    }
    */
}
