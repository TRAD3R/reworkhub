<?php

use yii\db\Migration;

/**
 * Class m190405_111224_alter_column_company_about_jobs_table
 */
class m190405_111224_alter_column_company_about_jobs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%jobs}}', 'company_about', $this->text()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%jobs}}', 'company_about', $this->string(250)->null());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190405_111224_alter_column_company_about_jobs_table cannot be reverted.\n";

        return false;
    }
    */
}
