<?php

/* @var $jobs array */
/* @var $pages \yii\data\Pagination */

$this->title = Yii::$app->name;

use app\helpers\ViewHelper;
use yii\helpers\Url; ?>

<div class="holder-jobs">
  <?php foreach ($jobs as $job):?>
    <a href="<?=Url::to(['vacancy', 'id' => $job->url])?>" class="box-job">
      <div class="hold-head-job">
        <div class="head-job">
          <?php if(!empty($job->company_logo)): ?>
            <div class="hold-img">
              <img src="/img/companies/<?=$job->company_logo?>" alt="<?=$job->company_title?>" class="img-responsive company-img">
            </div>
          <?php endif; ?>
          <div class="hold-title">
            <span class="job-title"><?=$job->title?></span>
            <?php if((int) $job->min_salary > 0 || (int) $job->max_salary > 0):?>
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
            <?php endif; ?>
          </div>
          <span class="job-company">
                                <?php $companyTitle = strlen($job->company_title) > 30 ? mb_substr($job->company_title, 0, 28) . "..." : $job->company_title;
                                echo $companyTitle;
                                ?>
                            </span>
          <span class="job-company"><?=$job->employmentTypes->type?></span>
        </div>
      </div>
      <div class="hold-content">
        <div class="content-job">
          <?php if($job->requirements):?>
            <span class="sub-title"><?=Yii::t('app', 'JOB_REQUIREMENTS')?></span>
            <?=ViewHelper::cutLists($job->requirements)?>
          <?php endif;?>
          <?php if($job->duties):?>
            <span class="sub-title"><?=Yii::t('app', 'JOB_DUTIES')?></span>
            <?=ViewHelper::cutLists($job->duties)?>
          <?php endif;?>
          <?php if($job->conditions):?>
            <span class="sub-title"><?=Yii::t('app', 'JOB_CONDITIONS')?></span>
            <?=ViewHelper::cutLists($job->conditions)?>
          <?php endif;?>
        </div>
        <div class="employment-job">
          <ul class="list-employment">
            <?php foreach (explode(",", $job->skills) as $key => $skill):?>
              <?php
              if($key > 3) break;
              $skill = trim($skill);
              if(empty($skill)) continue;?>
              <li><?=$skill?></li>
            <?php endforeach; ?>
          </ul>
          <span class="date-job"><?php  /* echo */ Yii::$app->formatter->asDate($job->created_at); ?></span>
        </div>
      </div>
    </a>
  <?php endforeach; ?>
</div>