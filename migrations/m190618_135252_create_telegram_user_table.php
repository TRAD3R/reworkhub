<?php

use yii\db\Migration;

/**
 * Class m190618_135252_create_telegram_user_table
 * Храним ID пользователя в telegram, чтобы можно было видеть его баланс
 */
class m190618_135252_create_telegram_user_table extends Migration
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

        $this->createTable('{{%telegram_user}}'
            , [
                'id' => $this->primaryKey()
                , 'telegram_id' => $this->string(30)->unique()
            ]
            , $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%telegram_user}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190618_135252_add_user_telegram_id_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
