<?php

use yii\db\Migration;

/**
 * Class m190423_081423_add_column_url_jobs_table
 */
class m190423_081423_add_column_url_jobs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('rw_jobs', 'url', $this->string(20));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190423_081423_add_column_url_jobs_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190423_081423_add_column_url_jobs_table cannot be reverted.\n";

        return false;
    }
    */
}
