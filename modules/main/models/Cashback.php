<?php

namespace app\modules\main\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%jobs}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property int $job_id
 * @property string $name
 * @property string $email
 * @property string $number
 * @property int $wallet
 * @property Job $job
 */
class Cashback extends \yii\db\ActiveRecord
{
    const WALLET_YANDEX_MONEY = 1;
    const WALLET_QIWI = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cashback}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public static function getWallets($wallet)
    {
        $wallets = [
            self::WALLET_YANDEX_MONEY => 'Яндекс Деньги',
            self::WALLET_QIWI => 'QIWI'
        ];

        return $wallets[$wallet] ?: '';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Job::class, ['id' => 'job_id']);
    }
}
