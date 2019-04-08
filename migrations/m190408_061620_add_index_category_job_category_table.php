<?php

use yii\db\Migration;

/**
 * Class m190408_061620_add_index_category_job_category_table
 */
class m190408_061620_add_index_category_job_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('UI_category', 'rw_job_categories', 'category', true);
        $this->createIndex('I_title', 'rw_jobs', 'title');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('UI_category', 'rw_job_categories');
        $this->dropIndex('I_title', 'rw_jobs');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_061620_add_index_category_job_category_table cannot be reverted.\n";

        return false;
    }
    */
}
