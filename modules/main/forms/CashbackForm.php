<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 09.03.19
 * Time: 13:45
 */

namespace app\modules\main\forms;


use app\modules\main\models\Cashback;
use himiklab\yii2\recaptcha\ReCaptchaValidator;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class CashbackForm extends Model
{
    public $name;
    public $email;
    public $number;
    public $wallet;

    public function rules()
    {
        return [
            [['name', 'email', 'number', 'wallet'], 'filter', 'filter' => 'trim'],
            [['name', 'email', 'number', 'wallet'], 'required'],
            [['wallet'], 'integer'],
            [['email'], 'email']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя получателя',
            'email' => 'E-mail',
            'number' => 'Номер',
        ];
    }

    public function save($jobid)
    {
        if($this->validate()){
            $cashback = new Cashback();
            $cashback->name = $this->name;
            $cashback->email = $this->email;
            $cashback->number = $this->number;
            $cashback->wallet = $this->wallet;
            $cashback->job_id = $jobid;

            return $cashback->save();
        }

        return false;
    }
}