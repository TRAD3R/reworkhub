<?php

namespace app\modules\main\models;

use Yii;

/**
 * This is the model class for table "{{%employment_types}}".
 *
 * @property int $id
 * @property string $type
 *
 * @property JobsOld[] $jobs
 */
class EmploymentTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%employment_types}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 100],
            [['type'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(JobsOld::className(), ['employment_types_id' => 'id']);
    }
}
