<?php

namespace app\modules\main\models;

use app\helpers\Helpers;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%job_categories}}".
 *
 * @property int $id
 * @property string $category
 * @property int $weight
 *
 * @property Job[] $jobs
 */
class JobCategories extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%job_categories}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Job::class, ['job_categories_id' => 'id']);
    }

    public static function findAllForSelect()
    {
        $categories = self::find()
            ->orderBy('weight')
            ->all();

        return ArrayHelper::map($categories, 'id', 'category');
    }
}
