<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 09.03.19
 * Time: 13:45
 */

namespace app\modules\main\models;


use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class JobForm extends Model
{
    public $companyTitle;
    public $companyAbout;
    public $jobCategories;
    public $title;
    public $employmentType;
    public $description;
    public $duties;
    public $requirements;
    public $conditions;
    public $skills;
    public $minSalary;
    public $maxSalary;
    public $currency;
    public $contactPersonName;
    public $contactPersonEmail;
    public $contactPersonOther;
    public $reCaptcha;

    /**
     * @var UploadedFile
     */
    public $companyLogo;

    public function rules()
    {
        return [
            [['companyTitle', 'title', 'description', 'contactPersonEmail', 'contactPersonOther', 'contactPersonName', 'companyAbout', 'minSalary','maxSalary'], 'filter', 'filter' => 'trim'],
            [['jobCategories', 'title', 'employmentType', 'requirements', 'contactPersonEmail', 'currency'], 'required'],
            [['contactPersonEmail'], 'email'],
            [['duties', 'conditions'], 'safe'],
            [['companyLogo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, ico, bmp, svg', 'message' => Yii::t('app', 'ERROR_CHECK_IMAGE_FORMAT')],
            [['companyTitle', 'title', 'skills'], 'string', 'max' => 255],
            ['companyAbout', 'string', 'max' => 1000],
            [['contactPersonName'], 'string', 'max' => 150],
            [['contactPersonEmail', 'contactPersonOther'], 'string', 'max' => 50],

//            [['reCaptcha'], ReCaptchaValidator::class, 'secret' => '6LcBgZYUAAAAAD_BgjqcJRIfrRLZ3c8emZFTc0Dq', 'uncheckedMessage' => Yii::t('app', 'ERROR_CHECK_RECAPTCHA')],
        ];
    }

    public function attributeLabels()
    {
        return [
            'companyTitle' => Yii::t('app', 'JOB_COMPANY_TITLE'),
            'companyLogo' => Yii::t('app', 'JOB_COMPANY_LOGO'),
            'companyAbout' => Yii::t('app', 'JOB_COMPANY_ABOUT'),
            'jobCategories' => Yii::t('app', 'JOB_CATEGORY'),
            'title' => Yii::t('app', 'JOB_TITLE'),
            'employmentType' => Yii::t('app', 'JOB_EMPLOYMENT_TYPE'),
            'description' => Yii::t('app', 'JOB_DESCRIPTION'),
            'duties' => Yii::t('app', 'JOB_DUTIES'),
            'requirements' => Yii::t('app', 'JOB_REQUIREMENTS'),
            'conditions' => Yii::t('app', 'JOB_CONDITIONS'),
            'skills' => Yii::t('app', 'JOB_SKILLS'),
            'minSalary' => Yii::t('app', 'JOB_SALARY_FROM'),
            'maxSalary' => Yii::t('app', 'JOB_SALARY_TO'),
            'contactPersonName' => Yii::t('app', 'JOB_CONTACT_PERSON_NAME'),
            'contactPersonOther' => Yii::t('app', 'JOB_CONTACT_PERSON_OTHER'),
            'contactPersonEmail' => Yii::t('app', 'JOB_CONTACT_PERSON_EMAIL'),
        ];
    }

    public function upload()
    {
        $logoTitle = date("d-m-y-h-i-s", time());
        $this->companyLogo->saveAs('img/companies/' . $logoTitle . '.' . $this->companyLogo->extension, true);
        $this->companyLogo = $logoTitle . '.' . $this->companyLogo->extension;
        return  true;
    }
}