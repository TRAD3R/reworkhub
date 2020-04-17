<?php

use yii\db\Migration;

/**
 * Class m200412_090843_add_column_amount_to_job_table
 */
class m200412_090843_add_column_amount_to_job_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('rw_jobs', 'amount', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('rw_jobs', 'amount');
    }
}
