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
 * @property string $filter
 * @property int $level
 * @property int $weight
 */
class Filter extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%filters}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filter'], 'string', 'max' => 100],
            [['level'], 'integer', 'max' => 99],
            [['weight'], 'integer', 'max' => 9999],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filter' => 'Фильтр',
        ];
    }

    public static function findAllByLevel($level)
    {
        $categories = self::find()
            ->where(['level' => $level])
            ->orderBy('weight')
            ->all();

        return ArrayHelper::map($categories, 'id', 'filter');
    }
}
