<?php

/**
 * trad3r
 * 08.04.2020
 */

namespace app\modules\main\controllers;


use app\modules\main\models\Freekassa;
use app\modules\main\models\Job;
use app\modules\telegram\models\Telegram;
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
        $freekassa = new Freekassa();
        $job = Job::findOne($freekassa->orderId);

        if($job) {
            if(!$freekassa->isValidSign($job)) {
                Yii::error('Payment is not valid', 'freekassa');
            }

            if ($job->contact_person_email) {
                $this->sendEmail($job);
            }
            $telegram = new Telegram();
            $telegram->newJob($job->company_title);
        }

        die("YES");
    } // actionOk

    private function sendEmail($job)
    {
        $message = Yii::$app->mailer->compose('@app/modules/main/mails/mailConfirmOrder')
            ->setFrom(Yii::$app->params['supportEmail'])
            ->setTo($job->contact_person_email)
            ->setSubject('Новая вакансия');

        $message->send();
    }
}