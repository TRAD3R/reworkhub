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
 * @property int $published
 * @property string $company_title
 * @property string $company_about
 * @property string $company_logo
 * @property int $job_categories_id
 * @property string $title
 * @property int $employment_types_id
 * @property string $description
 * @property string $duties
 * @property string $requirements
 * @property string $conditions
 * @property string $skills
 * @property string $min_salary
 * @property string $max_salary
 * @property string $currency
 * @property string $contact_person_name
 * @property string $contact_person_email
 * @property string $contact_person_phone
 * @property string $temp_url
 * @property int $status
 *
 * @property EmploymentTypes $employmentTypes
 * @property JobCategories $jobCategories
 */
class Job extends \yii\db\ActiveRecord
{
    const STATUS_BLOCKED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_WAIT = 2;
    const STATUS_DEFFERED = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%jobs}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_title', 'currency', 'contact_person_email'], 'required'],
            [['job_categories_id', 'employment_types_id', 'status'], 'integer'],
            [['description', 'duties', 'requirements', 'conditions'], 'string'],
            [['company_title', 'title'], 'string', 'max' => 255],
            [['company_about', 'skills'], 'string', 'max' => 250],
            [['company_logo', 'contact_person_name'], 'string', 'max' => 150],
            [['min_salary', 'max_salary'], 'string', 'max' => 20],
            [['currency'], 'string', 'max' => 3],
            [['contact_person_email', 'contact_person_phone'], 'string', 'max' => 50],
            [['employment_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => EmploymentTypes::className(), 'targetAttribute' => ['employment_types_id' => 'id']],
            [['job_categories_id'], 'exist', 'skipOnError' => true, 'targetClass' => JobCategories::className(), 'targetAttribute' => ['job_categories_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public static function getStatusesArray()
    {
        return [
            self::STATUS_BLOCKED => 'Заблокирован',
            self::STATUS_ACTIVE => 'Активен',
            self::STATUS_WAIT => 'Ожидает подтверждения',
            self::STATUS_DEFFERED => 'Ожидает публикации',

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'company_title' => 'Company Title',
            'company_about' => 'Company About',
            'company_logo' => 'Company Logo',
            'job_categories_id' => 'Job Categories ID',
            'title' => 'Title',
            'employment_types_id' => 'Employment Types ID',
            'description' => 'Descriptiion',
            'duties' => 'duties',
            'requirements' => 'requirements',
            'conditions' => 'conditions',
            'skills' => 'Skills',
            'min_salary' => 'Min Salary',
            'max_salary' => 'Max Salary',
            'currency' => 'Currency',
            'contact_person_name' => 'Contact Person Name',
            'contact_person_email' => 'Contact Person Email',
            'contact_person_phone' => 'Contact Person Phone',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmploymentTypes()
    {
        return $this->hasOne(EmploymentTypes::className(), ['id' => 'employment_types_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobCategories()
    {
        return $this->hasOne(JobCategories::className(), ['id' => 'job_categories_id']);
    }

    /**
     * @param bool $insert
     * @return bool
     * @throws \yii\base\Exception
     */
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)) { // TODO: Change the autogenerated stub
            if($this->isNewRecord)
                $this->temp_url = Yii::$app->security->generateRandomString(25);
            return true;
        }

        return false;
    }

    public static function findAllActive(){
        return self::find()->where(['status' => 1])->andWhere('published <= ' . time() )->orderBy('published DESC')->all();
    }

    public static function findNew()
    {
        return self::find()
            ->where(['status' => self::STATUS_WAIT])
            ->orderBy('id ASC')
            ->one();
    }

    public static function findTemp($tempUrl)
    {
        return self::findOne(['temp_url' => $tempUrl]);
    }

    public static function findDeffered()
    {
        $now = time();
        return self::find()
            ->where(['status' => '3'])
            ->andWhere("published < $now")
            ->all();
    }
}
