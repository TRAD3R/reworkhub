<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 09.03.19
 * Time: 13:45
 */

namespace app\modules\main\models;


use trad3r\dump\Dump;
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
    public $contactPersonPhone;
    public $reCaptcha;
    public $token;

    /**
     * @var UploadedFile
     */
    public $companyLogo;

    public function rules()
    {
        return [
            [['companyTitle', 'title', 'description', 'contactPersonEmail', 'contactPersonPhone', 'contactPersonName', 'companyAbout', 'minSalary','maxSalary'], 'filter', 'filter' => 'trim'],
            [['companyTitle', 'jobCategories', 'title', 'employmentType', 'description', 'contactPersonEmail', 'currency'], 'required'],
            [['contactPersonEmail'], 'email'],
            [['duties', 'requirements', 'conditions'], 'safe'],
//            [['minSalary', 'maxSalary'], 'integer'],
            ['minSalary', 'errorSalaryNotSet'],
            [['companyLogo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, ico, bmp, svg'],
            [['companyTitle', 'title', 'companyAbout', 'skills'], 'string', 'max' => 255],
            [['contactPersonName'], 'string', 'max' => 150],
            [['minSalary', 'maxSalary'], 'string', 'max' => 10],
            [['contactPersonEmail', 'contactPersonPhone'], 'string', 'max' => 50],

            ['token', 'recaptcha']
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
            'skills' => Yii::t('app', 'JOB_SKILLS'),
            'minSalary' => Yii::t('app', 'JOB_SALARY_FROM'),
            'maxSalary' => Yii::t('app', 'JOB_SALARY_TO'),
            'contactPersonName' => Yii::t('app', 'JOB_CONTACT_PERSON_NAME'),
            'contactPersonPhone' => Yii::t('app', 'JOB_CONTACT_PERSON_PHONE'),
            'contactPersonEmail' => Yii::t('app', 'JOB_CONTACT_PERSON_EMAIL'),
        ];
    }

    public function upload()
    {
        Dump::show("upload");
        if ($this->validate()) {
            $logoTitle = date("d-m-y-h-i-s", time());
            Dump::show($logoTitle);
            $this->companyLogo->saveAs('img/companies/' . $logoTitle . '.' . $this->companyLogo->extension, true);
            $this->companyLogo = $logoTitle . '.' . $this->companyLogo->extension;
            Dump::show($this);die;
            return  true;
        } else {
            return false;
        }
    }

    public function recaptcha(){
        if($this->hasErrors())
            return;

        if($this->token){
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=6Lew0ZoUAAAAAJ3AJ2YjCG-sNTzxQqTbI5OysptR&response={$this->token}";

            $verify = file_get_contents($url);
            $captcha_success=json_decode($verify);

            if ($captcha_success->success==false || $captcha_success->score < 0.3) {
                $this->addError('token', Yii::t('app', 'ERROR_RECAPTCHA'));
            }
        }else{
            $this->addError('token', Yii::t('app', 'ERROR_RECAPTCHA'));
        }
    }

    public function errorSalaryNotSet(){
        if($this->hasErrors())
            return;

        if(empty($this->minSalary) && empty($this->maxSalary)){
            $this->addError('minSalary', Yii::t('app', 'ERROR_NOT_SET_SALARY'));
        }
    }
}