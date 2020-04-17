<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cashback}}`.
 */
class m200412_090922_create_cashback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cashback}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'job_id' => $this->integer()->notNull(),
            'name' => $this->string(),
            'email' => $this->string(),
            'number' => $this->string(),
            'wallet' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cashback}}');
    }
}
