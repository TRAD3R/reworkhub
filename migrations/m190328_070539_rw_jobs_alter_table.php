<?php

use yii\db\Migration;

/**
 * Class m190328_070539_rw_jobs_alter_table
 */
class m190328_070539_rw_jobs_alter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('rw_jobs', 'duties', 'text');
        $this->addColumn('rw_jobs', 'requirements', 'text');
        $this->addColumn('rw_jobs', 'conditions', 'text');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('rw_jobs', 'duties');
        $this->dropColumn('rw_jobs', 'requirements');
        $this->dropColumn('rw_jobs', 'conditions');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190328_070539_rw_jobs_alter_table cannot be reverted.\n";

        return false;
    }
    */
}
