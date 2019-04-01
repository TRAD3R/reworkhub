<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%job_categories}}`.
 */
class m190309_100152_create_job_categories_table extends Migration
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

        $this->createTable('{{%job_categories}}', [
            'id' => $this->primaryKey(),
            'category' => $this->string(100),
            'weight' => $this->smallInteger(2)
        ], $tableOptions);

        $this->createIndex('idx-job-categories-category', '{{%job_categories}}', 'category');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%job_categories}}');
    }
}
