<?php


namespace app\modules\main\controllers;


use yii\web\Controller;

class SummaryController extends Controller
{
    public function actionAdd(){

        return $this->render('add');
    } // actionAdd
}