<?php

/* @var $this yii\web\View */
/* @var $jobs array */
/* @var $job \app\modules\main\models\Job */

$this->title = Yii::$app->name . ' — ' . Yii::t('app', 'TITLE_POST_JOB');

use app\modules\main\models\EmploymentTypes;
use app\modules\main\models\JobCategories;
use yii\helpers\Url;
use yii\widgets\LinkPager; ?>
<div class="block-jobs">
    <div class="container">
        <div class="holder-jobs">
            <?php foreach ($jobs as $job):?>
                <a href="<?=Url::to(['vacancy', 'id' => $job->id])?>" class="box-job">
                <div class="hold-head-job">
                    <div class="head-job">
                        <?php if(!empty($job->company_logo)): ?>
                            <div class="hold-img">
                                <img src="/img/companies/<?=$job->company_logo?>" alt="<?=$job->company_title?>" class="img-responsive company-img">
                            </div>
                        <?php endif; ?>
                        <span class="job-title"><?=$job->title?></span>
                        <span class="job-company"><?=$job->company_title?></span>
                        <span class="job-salary">
                            <?php if(!empty($job->min_salary) && !empty($job->max_salary)):?>
                                <?php echo $job->min_salary . " - " . $job->max_salary;?>
                            <?php elseif (!empty($job->min_salary)):?>
                                <?php echo Yii::t('app', 'PH_SALARY_FROM') . " " . $job->min_salary;?>
                            <?php else:?>
                                <?php echo Yii::t('app', 'PH_SALARY_TO') . " " . $job->max_salary;?>
                            <?php endif;?>
                            <?=strtoupper($job->currency)?>
                        </span>
                    </div>
                </div>
                <div class="content-job">
                    <?php if($job->duties):?>
                    <span class="sub-title"><?=Yii::t('app', 'JOB_DUTIES')?></span>
                        <?=substr($job->duties, 0, 150)?>
                    <?php endif;?>
                    <?php if($job->requirements):?>
                    <span class="sub-title"><?=Yii::t('app', 'JOB_REQUIREMENTS')?></span>
                        <?=substr($job->requirements, 0, 150)?>
                    <?php endif;?>
                    <?php if($job->conditions):?>
                    <span class="sub-title"><?=Yii::t('app', 'JOB_CONDITIONS')?></span>
                        <?=substr($job->conditions, 0, 150)?>
                    <?php endif;?>
                </div>
                <div class="employment-job">
                    <span class="date-job"><?php echo Yii::$app->formatter->asDate($job->created_at); ?></span>
                    <ul class="list-employment">
                        <?php foreach (explode(",", $job->skills) as $skill):?>
                            <li><?=trim($skill)?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="block-pagination">
    <div class="container">
        <?php echo LinkPager::widget([
            'pagination' => $pages,
            'maxButtonCount' => 5,
            'activePageCssClass' => 'active',
            'nextPageCssClass' => 'arrow-right',
            'nextPageLabel' => '<svg width="100%" height="100%" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.13174 7.99958L0.905881 0.77372C0.728168 0.596008 0.728168 0.310997 0.905881 0.133284C1.08359 -0.0444281 1.3686 -0.0444281 1.54632 0.133284L9.09407 7.68104C9.27178 7.85875 9.27178 8.14376 9.09407 8.32148L1.54632 15.8659C1.45914 15.9531 1.34178 16 1.22777 16C1.11377 16 0.996413 15.9564 0.909233 15.8659C0.731521 15.6882 0.731521 15.4032 0.909233 15.2254L8.13174 7.99958Z" fill="black"/>
                </svg>',
            'prevPageCssClass' => 'arrow-left',
            'prevPageLabel' => '<svg width="100%" height="100%" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.86826 7.99958L9.09412 0.77372C9.27183 0.596008 9.27183 0.310997 9.09412 0.133284C8.91641 -0.0444281 8.6314 -0.0444281 8.45368 0.133284L0.905928 7.68104C0.728216 7.85875 0.728216 8.14376 0.905928 8.32148L8.45368 15.8659C8.54086 15.9531 8.65822 16 8.77223 16C8.88623 16 9.00359 15.9564 9.09077 15.8659C9.26848 15.6882 9.26848 15.4032 9.09077 15.2254L1.86826 7.99958Z" fill="black"/>
                </svg>',
            'options' => ['class' => 'list-pagination'],
        ]); ?>
    </div>
</div>