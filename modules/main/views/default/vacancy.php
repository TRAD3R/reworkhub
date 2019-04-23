<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 10.03.19
 * Time: 10:45
 */

/** @var $this \yii\web\View */
/** @var $job \app\modules\main\models\Job */
/** @var $employment string */
/** @var $category string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "$job->company_title | " . Yii::$app->name;
?>

<div class="block-jobs">
    <div class="container">
        <div class="hold-job">
        	<a href="/" class="btn-backwards">
        		<svg viewBox="0 0 8 12" xmlns="http://www.w3.org/2000/svg">
					<path d="M0.871797 6.42828L6.26814 11.8228C6.50493 12.059 6.88857 12.059 7.12595 11.8228C7.36274 11.5866 7.36274 11.203 7.12595 10.9668L2.15764 6.0003L7.12535 1.03378C7.36214 0.797595 7.36214 0.413961 7.12535 0.177173C6.88856 -0.0590169 6.50433 -0.0590169 6.26754 0.177173L0.871199 5.57167C0.638049 5.80542 0.638049 6.19508 0.871797 6.42828Z"/>
				</svg>
        		Назад
        	</a>
            <div class="box-job">
                <div class="hold-head-job">
                    <div class="head-job">
                        <?php if(!empty($job->company_logo)): ?>
                            <div class="hold-img">
                                <img src="/img/companies/<?=$job->company_logo?>" alt="<?=$job->company_title?>">
                            </div>
                        <?php endif; ?>
                        <div class="hold-title">
                            <h1 class="job-title"><?= $job->title?></h1>
                            <?php if((int) $job->min_salary > 0 || (int) $job->max_salary > 0):?>
                                <span class="job-salary">
                                    <?php
                                    if(!empty($job->min_salary) && !empty($job->max_salary)):?>
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
                        <span class="job-company"><?=$job->company_title?></span>
                        <span class="job-company"><?=$job->company_about?></span>
                        <span class="job-company"><?=$job->employmentTypes->type?></span>
                    </div>
                </div>
                <div class="content-job">
                    <?php if($job->duties):?>
                        <span class="sub-title"><?=Yii::t('app', 'JOB_DUTIES')?></span>
                        <?=$job->duties;?>
                    <?php endif;?>
                    <?php if($job->requirements):?>
                        <span class="sub-title"><?=Yii::t('app', 'JOB_REQUIREMENTS')?></span>
                        <?=$job->requirements;?>
                    <?php endif;?>
                    <?php if($job->conditions):?>
                        <span class="sub-title"><?=Yii::t('app', 'JOB_CONDITIONS')?></span>
                        <?=$job->conditions;?>
                    <?php endif;?>
                </div><div class="title-employment"><?=Yii::t('app', 'JOB_SKILLS')?>:</div>
                <?php if($job->skills):?>
                    <div class="employment-job">
                        <ul class="list-employment">
                            <?php foreach (explode(",", $job->skills) as $skill):?>
                                <?php $skill = trim($skill);
                                    if(empty($skill)) continue;
                                ?>
                                <li><?=$skill?></li>
                            <?php endforeach; ?>
                        </ul>
                        <span class="date-job"><?php /* echo */ Yii::$app->formatter->asDate($job->created_at); ?></span>
                    </div>
                <?php endif;?>
                <?php if(!empty($job->contact_person_name) || !empty($job->contact_person_other) || !empty($job->contact_person_email)):?>
                    <h2 class="title-contacts"><?=Yii::t('app', 'CONTACT_INFORMATION')?></h2>
                    <div class="hold-contacts">
                        <?php if(!empty($job->contact_person_name)):?>
                            <div class="box-link">
                                <a href="#">
                                    <svg width="100%" height="100%" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.00079 0C3.58267 0 0.000976562 3.5818 0.000976562 7.99992C0.000976562 12.4179 3.58267 16 8.00079 16C12.4189 16 16.0009 12.4179 16.0009 7.99992C16.0009 3.58169 12.4189 0 8.00079 0ZM8.02516 11.7741V11.774H7.97631H4.5591C4.5591 9.27503 6.7539 9.27561 7.24094 8.62217L7.29668 8.32419C6.6124 7.97741 6.12936 7.14135 6.12936 6.16353C6.12936 4.8753 6.96734 3.83081 8.00079 3.83081C9.03424 3.83081 9.87222 4.8753 9.87222 6.16353C9.87222 7.13303 9.39776 7.96387 8.72261 8.31614L8.78608 8.65475C9.32043 9.27652 11.4422 9.31705 11.4422 11.7741H8.02516Z" fill="#00B473" fill-opacity="0.7"/>
                                    </svg>
                                    <?=$job->contact_person_name?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($job->contact_person_other)):?>
                            <div class="box-link">
                                <a href="#">
                                    <svg width="100%" height="100%" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="16" height="16" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <?=$job->contact_person_other?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>