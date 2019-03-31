<?php

namespace app\modules\main\models;

use app\helpers\Helpers;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%job_categories}}".
 *
 * @property int $id
 * @property string $category
 *
 * @property JobsOld[] $jobs
 */
class JobCategories extends \yii\db\ActiveRecord
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
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(JobsOld::className(), ['job_categories_id' => 'id']);
    }

    public static function findAllForSelect()
    {
//        $categories = self::find()
//            ->select('id')
//            ->addSelect('category as value')
//            ->asArray()
//        ->all();

        $categories = self::find()
            ->orderBy('category')
            ->all();

//        return Helpers::createArrayForSelect($categories);
        return ArrayHelper::map($categories, 'id', 'category');
    }
}
