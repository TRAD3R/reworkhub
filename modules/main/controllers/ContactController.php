<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 08.03.19
 * Time: 13:49
 */

namespace app\modules\main\controllers;


use app\modules\main\models\ContactForm;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class ContactController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionIndex()
    {
        $model = new ContactForm();
        if ($user = Yii::$app->user->identity) {
            /** @var \app\modules\user\models\User $user */
            $model->name = $user->username;
            $model->email = $user->email;
        }
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
}