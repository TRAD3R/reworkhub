<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employment_types}}`.
 */
class m190309_100545_create_employment_types_table extends Migration
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

        $this->createTable('{{%employment_types}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(100)->notNull()->unique(),
        ], $tableOptions);

        $this->createIndex('idx-employment-types-type', '{{%employment_types}}', 'type');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employment_types}}');
    }
}
