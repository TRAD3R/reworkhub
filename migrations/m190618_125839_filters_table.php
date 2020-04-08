<?php

use yii\db\Migration;

/**
 * Class m190618_125839_filters_table
 */
class m190618_125839_filters_table extends Migration
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

        $this->createTable('{{%filters}}', [
            'id' => $this->primaryKey(),
            'filter' => $this->string(100)->notNull(),
            'level' => $this->tinyInteger(2)->defaultValue(1),
            'weight' => $this->integer(5)->defaultValue(0),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%filters}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190618_125839_filters_table cannot be reverted.\n";

        return false;
    }
    */
}
