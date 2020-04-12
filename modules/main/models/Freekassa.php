<?php

/**
 * trad3r
 * 12.04.2020
 */

namespace app\modules\main\models;


use Yii;

class Freekassa
{

    const PAYMENT_URL = 'https://www.free-kassa.ru/merchant/cash.php';

    public $merchantId;
    public $amount;
    public $orderId;
    public $sign;

    public function __construct()
    {
        $data = Yii::$app->getRequest()->get();
        Yii::info($data, 'payment');

        $this->merchantId = $data['MERCHANT_ID'];
        $this->amount = $data['AMOUNT'];
        $this->orderId = $data['MERCHANT_ORDER_ID'];
        $this->sign = $data['SIGN'];
    }

    public function isValidSign(Job $job)
    {
        $freekassaParams = Yii::$app->params['freekassa'];
        $jobSign =  md5($freekassaParams['merchantId'].':'.$job->amount.':'.$freekassaParams['firstSecret'].':'.$job->id);

        return $this->amount == $job->amount && $this->sign == $jobSign;
    }

}