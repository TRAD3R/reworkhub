<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%jobs}}`.
 */
class m190309_100908_create_jobs_table extends Migration
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

        $this->createTable('{{%jobs}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'published' => $this->integer()->notNull()->defaultValue(time()),
            'company_title' => $this->string()->notNull(),
            'company_about' => $this->string(250)->null(),
            'company_logo' => $this->string(150)->null(),
            'job_categories_id' => $this->integer(),
            'title' => $this->string(),
            'employment_types_id' => $this->integer(),
            'description' => $this->text()->null(),
            'skills' => $this->string(250)->null(),
            'min_salary' => $this->string(20)->null(),
            'max_salary' => $this->string(20)->null(),
            'currency' => $this->string(3)->notNull(),
            'contact_person_name' => $this->string(150)->null(),
            'contact_person_email' => $this->string(50)->notNull(),
            'contact_person_phone' => $this->string(50)->null(),
            'status' => $this->smallInteger()->notNull()->defaultValue(2),
            'temp_url' => $this->string(30),
        ], $tableOptions);

        $this->addForeignKey("fk-jobs-job-categories", '{{%jobs}}', 'job_categories_id', '{{%job_categories}}', 'id');
        $this->addForeignKey("fk-jobs-employment-types", '{{%jobs}}', 'employment_types_id', '{{%employment_types}}', 'id');

        $this->createIndex('idx-jobs-company-title', '{{%jobs}}', 'company_title');
        $this->createIndex('idx-jobs-title', '{{%jobs}}', 'title');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jobs}}');
    }
}
