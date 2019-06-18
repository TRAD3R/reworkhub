<?php

namespace app\modules\main\models;

use app\helpers\Helpers;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%filters}}".
 *
 * @property int $id
 * @property string $telegram_id
 */
class UserTelegram extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%telegram_user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filter'], 'string', 'max' => 30],
            [['filter'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'telegram_id' => 'Телеграм ID',
        ];
    }
}
