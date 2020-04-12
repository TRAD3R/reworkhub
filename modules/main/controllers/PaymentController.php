<?php

/**
 * trad3r
 * 08.04.2020
 */

namespace app\modules\main\controllers;


use Yii;
use yii\web\Controller;

class PaymentController extends Controller
{
    public function actionOk()
    {
        Yii::info("paymentOk", 'payment');
        return "OK";
    } // actionOk

    public function actionFail()
    {
        Yii::info("paymentFail", 'payment');
        return "Fail";
    } // actionOk

    public function actionResult()
    {
        $res = file_get_contents("php://input");
        Yii::info($res, 'payment');
        return "Result";
    } // actionOk
}