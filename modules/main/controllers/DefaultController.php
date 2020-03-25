<?php

namespace app\modules\main\controllers;

use app\modules\main\models\EmploymentTypes;
use app\modules\main\models\Job;
use app\modules\main\models\JobCategories;
use app\modules\main\models\JobForm;
use app\modules\telegram\models\Telegram;
use function Sodium\add;
use Yii;
use yii\data\Pagination;
use yii\helpers\Json;
use yii\swiftmailer\Message;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * Default controller for the `main` module
 */
class DefaultController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
//        $activeJobs = Job::findAllActive();
        $query = Job::find()
            ->where(['status' => 1])
            ->andWhere('published <= ' . time() )
            ->orderBy('published DESC');

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
        $models = $query->offset($pages->offset)
            ->limit(3)
            ->all();

        return $this->render('index', [
            "jobs" => $models,
            'pages' => $pages
        ]);
    }

    public function actionAdd(){
        $model = new JobForm();

        if(Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {

                $model->duties = strlen(trim(strip_tags(str_replace('&nbsp;', "", $model->duties)))) > 3 ? $model->duties : "";
                $model->requirements = strlen(trim(strip_tags(str_replace('&nbsp;', "", $model->requirements)))) > 3 ? $model->requirements : "";
                $model->conditions = strlen(trim(strip_tags(str_replace('&nbsp;', "", $model->conditions)))) > 3 ? $model->conditions : "";

                if ($model->validate()) {
                    $model->duties = !empty($model->duties) ? str_replace("<ul", "<ul class='list'", $model->duties) : "";
                    $model->requirements = !empty($model->requirements) ? str_replace("<ul", "<ul class='list'", $model->requirements) : "";
                    $model->conditions = !empty($model->conditions) ? str_replace("<ul", "<ul class='list'", $model->conditions) : "";
                    $model->companyLogo = UploadedFile::getInstance($model, 'companyLogo');
                    if (!empty($model->companyLogo)) {
                        $model->upload();
                    }
                    if (!Yii::$app->session->getIsActive()) {
                        Yii::$app->session->open();
                    }
                    Yii::$app->session['model'] = Json::encode($model);
                    $this->redirect('preview');
                }else{
                    foreach ($model->getErrors() as $errors){
                        foreach ($errors as $key => $value)
                            Yii::$app->session->setFlash($key, $value);
                    }
                }
            }
        }elseif(!empty(Yii::$app->session['model'])){
            $jModel = (object)Json::decode(Yii::$app->session['model']);

            $model->companyTitle = $jModel->companyTitle;
            $model->companyAbout = $jModel->companyAbout;
            $model->jobCategories = $jModel->jobCategories;
            $model->title = $jModel->title;
            $model->employmentType = $jModel->employmentType;
            $model->description = $jModel->description;
            $model->duties = $jModel->duties;
            $model->requirements = $jModel->requirements;
            $model->conditions = $jModel->conditions;
            $model->skills = $jModel->skills;
            $model->minSalary = $jModel->minSalary;
            $model->maxSalary = $jModel->maxSalary;
            $model->currency = $jModel->currency;
            $model->contactPersonName = $jModel->contactPersonName;
            $model->contactPersonEmail = $jModel->contactPersonEmail;
            $model->contactPersonOther = $jModel->contactPersonOther;
            $model->companyLogo = $jModel->companyLogo;

            Yii::$app->session->remove('model');
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    } // actionAdd

    public function actionPreview(){
        if(empty(Yii::$app->session['model']))
            return $this->redirect('/add');

        $model = (object)Json::decode(Yii::$app->session->get('model'));
        $jobCategories = JobCategories::findOne($model->jobCategories);
        $employmentType = EmploymentTypes::findOne($model->employmentType);

        return $this->render('preview', [
            "model" => $model,
            "category" => $jobCategories->category,
            "employment" => $employmentType->type,
        ]);
    } // actionPreview

    public function actionVacancy(){
//        $id = (int) Yii::$app->request->get('id');
//
//        if($id) {
//            $job = Job::findOne($id);
//        }elseif($tempUrl = Yii::$app->request->get('temp')){
//            $job = Job::findTemp($tempUrl);
//        }

        $url = Yii::$app->request->get('id');

        if($url) {
            $job = Job::findByUrl($url);
        }elseif($tempUrl = Yii::$app->request->get('temp')){
            $job = Job::findTemp($tempUrl);
        }

        if($job){
            $jobCategories = JobCategories::findOne($job->job_categories_id);
            $employmentType = EmploymentTypes::findOne($job->employment_types_id);

            return $this->render('vacancy', [
                'job' => $job,
                "category" => $jobCategories->category,
                "employment" => $employmentType->type,
            ]);
        }

        return $this->redirect('/index');
    } // actionVacancy

    /**
     * @return Response
     * @throws \yii\base\Exception
     */
    public function actionSave(){

        $job = new Job();
        /** @var JobForm $jModel */
        $jModel = (object)Json::decode(Yii::$app->session['model']);
        $job->company_title = $jModel->companyTitle;
        $job->company_about = $jModel->companyAbout;
        $job->job_categories_id = $jModel->jobCategories;
        $job->title = $jModel->title;
        $job->employment_types_id = $jModel->employmentType;
        $job->description = $jModel->description;
        $job->duties = $jModel->duties;
        $job->requirements = $jModel->requirements;
        $job->conditions = $jModel->conditions;
        $job->skills = $jModel->skills;
        $job->min_salary = $jModel->minSalary;
        $job->max_salary = $jModel->maxSalary;
        $job->currency = $jModel->currency;
        $job->contact_person_name = $jModel->contactPersonName;
        $job->contact_person_email = $jModel->contactPersonEmail;
        $job->contact_person_other = $jModel->contactPersonOther;
        $job->company_logo = $jModel->companyLogo;
        $job->url = Yii::$app->security->generateRandomString(7) . time();

        if($job->save()) {
            Yii::$app->session->remove('model');

            if($job->contact_person_email){
                $message = Yii::$app->mailer->compose('@app/modules/main/mails/mailConfirmOrder')
                    ->setFrom(Yii::$app->params['supportEmail'])
                    ->setTo($job->contact_person_email)
                    ->setSubject('Новая вакансия');

                if ($message->send()) {
                    Yii::$app->getSession()->setFlash('success', 'Спасибо! На ваш Email было отправлено письмо с дальнешими инструкциями.');

                } else {
                    Yii::$app->getSession()->setFlash('error', 'Извините. У нас возникли технические проблемы. Попробуйте еще раз.');
                }
            }

        $telegram = new Telegram();
        $telegram->newJob($job->company_title);

            return $this->goHome();
        }else {
            Yii::error($job->getErrors(), 'trd_error');
            return $this->redirect("/preview");
        }
    } // actionSave

    public function actionSearch(){
        $phrase = trim(Yii::$app->request->get('phrase'));

        $query = Job::findBySql("SELECT j.*
                FROM rw_jobs j JOIN rw_job_categories rjc on j.job_categories_id = rjc.id
                WHERE (j.title LIKE :phrase OR rjc.category LIKE :phrase) AND j.status = 1
                ORDER BY published DESC
            ", [':phrase' => "%$phrase%"]);

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('search', [
            "jobs" => $models,
            'pages' => $pages
        ]);
    } // actionPhraseSearch

    public function actionJobs(){
      $query = Job::find()
          ->where(['status' => 1])
          ->andWhere('published <= ' . time() )
          ->orderBy('published DESC');

      $countQuery = clone $query;
      $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
      $models = $query->offset($pages->offset)
          ->limit($pages->limit)
          ->all();

      return $this->render('jobs', [
          "jobs" => $models,
          'pages' => $pages
      ]);
    } // actionJob
}
