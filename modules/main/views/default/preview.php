<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 10.03.19
 * Time: 10:45
 */

/** @var $model \app\modules\main\models\JobForm */
/** @var $employment string */
/** @var $category string */

use trad3r\dump\Dump;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<div class="block-jobs">
    <div class="container">
        <div class="hold-job">
            <div class="box-job">
                <div class="hold-head-job">
                    <div class="head-job">
                        <?php if(!empty($model->companyLogo)): ?>
                        <div class="hold-img">
                            <img src="img/companies/<?=$model->companyLogo?>" alt="<?=$model->companyTitle?>">
                        </div>
                        <?php endif; ?>

                        <h1 class="job-title"><?= $model->title?></h1>

                        <?php if(!empty($model->companyTitle)): ?>
                            <span class="job-company"><strong><?=Yii::t('app', 'PH_COMPANY')?>:</strong> <?=$model->companyTitle?></span>
                        <?php endif; ?>

                        <span class="job-salary">
                            <?php
                            if(!empty($model->minSalary) && !empty($model->maxSalary)):?>
                                <?php echo $model->minSalary . " - " . $model->maxSalary;?>
                            <?php elseif (!empty($model->minSalary)):?>
                                <?php echo Yii::t('app', 'PH_SALARY_FROM') . " " . $model->minSalary;?>
                            <?php else:?>
                                <?php echo Yii::t('app', 'PH_SALARY_TO') . " " . $model->maxSalary;?>
                            <?php endif;?>
                            <?=strtoupper($model->currency)?>
                        </span>
                    </div>
                </div>
                <div class="content-job">
                    <?php if($model->description):?>
                        <span class="sub-title"><?=Yii::t('app', 'JOB_DESCRIPTION')?></span>
                        <?=$model->description;?>
                    <?php endif;?>
                    <?php if($model->duties):?>
                        <span class="sub-title"><?=Yii::t('app', 'JOB_DUTIES')?></span>
                        <?=$model->duties;?>
                    <?php endif;?>
                    <?php if($model->requirements):?>
                        <span class="sub-title"><?=Yii::t('app', 'JOB_REQUIREMENTS')?></span>
                        <?=$model->requirements;?>
                    <?php endif;?>
                    <?php if($model->conditions):?>
                        <span class="sub-title"><?=Yii::t('app', 'JOB_CONDITIONS')?></span>
                        <?=$model->conditions;?>
                    <?php endif;?>
                </div>
                <?php if(!empty($model->contactPersonName) || !empty($model->contactPersonEmail) || !empty($model->contactPersonPhone)):?>
                    <h2 class="title-contacts"><?=Yii::t('app', 'CONTACT_INFORMATION')?></h2>
                    <div class="hold-contacts">
                    <?php if(!empty($model->contactPersonName)):?>
                        <div class="box-link">
                            <a href="#">
                                <svg width="100%" height="100%" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.00079 0C3.58267 0 0.000976562 3.5818 0.000976562 7.99992C0.000976562 12.4179 3.58267 16 8.00079 16C12.4189 16 16.0009 12.4179 16.0009 7.99992C16.0009 3.58169 12.4189 0 8.00079 0ZM8.02516 11.7741V11.774H7.97631H4.5591C4.5591 9.27503 6.7539 9.27561 7.24094 8.62217L7.29668 8.32419C6.6124 7.97741 6.12936 7.14135 6.12936 6.16353C6.12936 4.8753 6.96734 3.83081 8.00079 3.83081C9.03424 3.83081 9.87222 4.8753 9.87222 6.16353C9.87222 7.13303 9.39776 7.96387 8.72261 8.31614L8.78608 8.65475C9.32043 9.27652 11.4422 9.31705 11.4422 11.7741H8.02516Z" fill="#00B473" fill-opacity="0.7"/>
                                </svg>
                                <?=$model->contactPersonName?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($model->contactPersonPhone)):?>
                        <div class="box-link">
                            <a href="tel:<?=$model->contactPersonPhone?>">
                                <svg width="100%" height="100%" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M8.00098 0C3.58301 0 0.000976562 3.58204 0.000976562 8C0.000976562 12.4179 3.58301 16 8.00098 16C12.4189 16 16.0009 12.4179 16.0009 8C16.0009 3.58204 12.4189 0 8.00098 0ZM12.2255 11.6729L11.585 12.3136C11.4706 12.4278 11.1357 12.499 11.125 12.499C9.09859 12.5167 7.14748 11.7207 5.71391 10.287C4.27642 8.84872 3.47954 6.89065 3.50094 4.85742C3.50094 4.8565 3.57428 4.53123 3.68854 4.41806L4.32905 3.77745C4.56344 3.54197 5.01368 3.43556 5.32909 3.54108L5.46383 3.58603C5.77831 3.69145 6.10849 4.03917 6.19538 4.35953L6.51758 5.54209C6.60447 5.86337 6.48728 6.32044 6.25296 6.55483L5.82527 6.98258C6.24517 8.5371 7.4649 9.75705 9.01968 10.178L9.44721 9.75013C9.68268 9.51465 10.1396 9.39756 10.4602 9.48431L11.6426 9.80767C11.963 9.89571 12.3106 10.2238 12.416 10.5382L12.461 10.6749C12.5654 10.9894 12.4599 11.4396 12.2255 11.6729Z" fill="#00B473" fill-opacity="0.7"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="16" height="16" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <?=$model->contactPersonPhone?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($model->contactPersonEmail)):?>
                        <div class="box-link">
                            <a href="mailto:<?=$model->contactPersonEmail?>">
                                <svg width="100%" height="100%" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 9.99994C16 10.3507 15.9013 10.6759 15.7433 10.962L10.6914 5.30966L15.6885 0.937654C15.8829 1.24614 16 1.6085 16 2.00009V9.99994ZM8.00002 6.33595L14.9533 0.251998C14.668 0.0957933 14.3467 0 14 0H1.99999C1.65296 0 1.33154 0.0957933 1.04736 0.251998L8.00002 6.33595ZM9.93854 5.96788L8.32904 7.37705C8.2349 7.45905 8.11767 7.50001 8.00002 7.50001C7.88229 7.50001 7.76507 7.45905 7.67092 7.37705L6.06107 5.96781L0.945304 11.6924C1.25194 11.8847 1.61131 12 1.99995 12H14C14.3886 12 14.7482 11.8847 15.0547 11.6924L9.93854 5.96788ZM0.311551 0.937621C0.117194 1.24611 0 1.60847 0 2.00009V9.99997C0 10.3507 0.0982006 10.6759 0.256845 10.962L5.30811 5.3087L0.311551 0.937621Z" fill="#00B473" fill-opacity="0.7"></path>
                                </svg>
                                <?=$model->contactPersonEmail?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <div class="vacancy-button">
                    <a href="<?= Url::to('/add')?>" class="btn"><?=Yii::t('app', 'BTN_BACK')?></a>
                    <a href="<?= Url::to('/save')?>" class="btn"><?=Yii::t('app', 'BTN_SEND')?></a>
                </div>
            </div>
        </div>
    </div>
</div>