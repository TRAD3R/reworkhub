<?php

namespace app\modules\main\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

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
class Cashback extends ActiveRecord
{
    const WALLET_YANDEX_MONEY = 1;
    const WALLET_QIWI = 2;
    const WALLET_CARD = 3;

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
            self::WALLET_YANDEX_MONEY => [
                'title' => 'Яндекс Деньги',
                'id'    => 'yandexmoney',
                'image' => 'yandex-money.svg'
            ],
            self::WALLET_QIWI => [
                'title' => 'QIWI',
                'id'    => 'qiwi',
                'image' => 'qiwi_koshelek.svg'
            ],
            self::WALLET_CARD => [
                'title' => 'Банковская карта',
                'id'    => 'card',
                'image' => 'credit-card.svg'
            ],
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
