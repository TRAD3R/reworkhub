<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="description" itemprop="description" content="">
    <meta itemprop="image" content="images/logo.svg">
    <meta property="og:image" content="images/logo.svg">
    <meta property="og:site_name" content="<?=Yii::$app->name;?>">
    <meta property="og:title" content="<?= Html::encode($this->title) ?>">
    <meta property="og:description" content="">

    <!-- Template Basic Images Start -->
    <link rel="icon" href="img/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon-180x180.png">
    <!-- Template Basic Images End -->

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!-- Custom Browsers Color Start -->
    <meta name="theme-color" content="#000">
    <!-- Custom Browsers Color End -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>
<?php $this->beginBody() ?>
<div id="wrapper">
    <div class="w1">
        <header id="header">
            <div class="header-holder">
                <a href="<?= Url::to('/')?>" class="logo">
                    <img src="/images/logo.svg" alt="Reworkhub">
                </a>
                <a href="<?= Url::to('/add')?>" class="btn"><?= Yii::t('app', 'BTN_POST_JOB')?></a>
            </div>
        </header>

    <?= Alert::widget() ?>
    <?= $content ?>
    </div>

    <footer id="footer">
        <div class="footer-holder">
            <div class="box-email">
                <a href="mailto:support@reworkhub.com" class="email">
                    <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 9.99994C16 10.3507 15.9013 10.6759 15.7433 10.962L10.6914 5.30966L15.6885 0.937654C15.8829 1.24614 16 1.6085 16 2.00009V9.99994ZM8.00002 6.33595L14.9533 0.251998C14.668 0.0957933 14.3467 0 14 0H1.99999C1.65296 0 1.33154 0.0957933 1.04736 0.251998L8.00002 6.33595ZM9.93854 5.96788L8.32904 7.37705C8.2349 7.45905 8.11767 7.50001 8.00002 7.50001C7.88229 7.50001 7.76507 7.45905 7.67092 7.37705L6.06107 5.96781L0.945304 11.6924C1.25194 11.8847 1.61131 12 1.99995 12H14C14.3886 12 14.7482 11.8847 15.0547 11.6924L9.93854 5.96788ZM0.311551 0.937621C0.117194 1.24611 0 1.60847 0 2.00009V9.99997C0 10.3507 0.0982006 10.6759 0.256845 10.962L5.30811 5.3087L0.311551 0.937621Z" fill="#00B473"/>
                    </svg>
                    support@reworkhub.com
                </a>
            </div>
            <!-- <div class="box-copyright">&copy; <?=Yii::t('app', 'ALL_RIGHTS_RESERVED')?></div> -->
            <div class="box-copyright">&copy; Copyright 2019</div>
            <div class="box-social">
                <a href="https://twitter.com/ReWorkhub1" target="_blank">
                    <svg width="100%" height="100%" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 30C23.2843 30 30 23.2843 30 15C30 6.71573 23.2843 0 15 0C6.71573 0 0 6.71573 0 15C0 23.2843 6.71573 30 15 30Z" fill="#78BAEB"/>
                        <path d="M15 0C14.3369 0 13.6839 0.0435938 13.0435 0.126973C20.4033 1.08574 26.0869 7.37889 26.0869 15C26.0869 22.6211 20.4032 28.9143 13.0434 29.873C13.6839 29.9564 14.3369 30 15 30C23.2843 30 30 23.2842 30 15C30 6.71578 23.2843 0 15 0Z" fill="#59AAE7"/>
                        <path d="M12.0812 23.5109C10.7035 23.5109 9.35349 23.263 8.06853 22.7744L6.79517 22.2901C6.65589 22.2371 6.67517 22.0343 6.82194 22.0085L8.1638 21.7729C9.40699 21.5546 10.5826 21.0484 11.5902 20.301C11.6965 20.2221 11.6536 20.0562 11.5227 20.037C10.3494 19.8649 9.29601 19.1554 8.70497 18.1143L8.40374 17.5837C8.34972 17.4886 8.41511 17.37 8.52427 17.3647L9.1337 17.3356C9.13575 17.3355 9.13775 17.3354 9.13986 17.3352C9.2929 17.3277 9.32947 17.1193 9.19031 17.0549C8.07386 16.5381 7.26509 15.5002 7.05732 14.2575L6.96444 13.702C6.94716 13.5987 7.04062 13.5111 7.14257 13.5349L7.69089 13.6634C7.98275 13.7318 8.28445 13.7665 8.58767 13.7665C8.59124 13.7665 8.59482 13.7665 8.59845 13.7665C7.42915 13.0176 6.73452 11.7518 6.73452 10.3586C6.73452 10.0121 6.778 9.66934 6.86384 9.33981L7.02778 8.71016C7.05626 8.60076 7.19255 8.56338 7.27288 8.64277L7.7356 9.10027C8.95763 10.3086 10.4582 11.2388 12.0753 11.7904C12.5034 11.9261 13.8019 12.2945 14.2515 12.2963L14.2626 12.2964C14.2642 12.2964 14.3939 12.3011 14.4781 12.3051C14.4776 12.2814 14.4772 12.2577 14.4772 12.234C14.4772 9.78547 16.4692 7.79346 18.9177 7.79346C20.0869 7.79346 21.1846 8.24135 22.019 9.05686C22.052 9.08908 22.0979 9.10479 22.1435 9.09787C22.5725 9.03277 22.9995 8.93006 23.41 8.79254L24.779 8.33387C24.9224 8.28582 25.0359 8.46002 24.934 8.57176L23.9614 9.63869C23.8318 9.78084 23.6926 9.91314 23.5446 10.0348C23.4274 10.1312 23.5146 10.3208 23.6637 10.2928C23.7963 10.2679 23.928 10.2398 24.0585 10.2085L25.3143 9.90723C25.4571 9.87301 25.556 10.0465 25.4538 10.152L24.5548 11.079C24.1908 11.4544 23.7873 11.7989 23.3552 12.103L23.3559 12.1242C23.3572 12.1607 23.3583 12.1972 23.3583 12.234V12.2782C23.3329 18.4729 18.274 23.5109 12.0812 23.5109Z" fill="#FCFCFC"/>
                    </svg>
                </a>
                <a href="https://t.me/ReWorkHUB" target="_blank">
                    <svg width="100%" height="100%" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 30C23.2843 30 30 23.2843 30 15C30 6.71573 23.2843 0 15 0C6.71573 0 0 6.71573 0 15C0 23.2843 6.71573 30 15 30Z" fill="#59AAE7"/>
                        <path d="M15 0C14.3369 0 13.6839 0.0435938 13.0435 0.126973C20.4033 1.08574 26.0869 7.37889 26.0869 15C26.0869 22.6211 20.4032 28.9143 13.0434 29.873C13.6839 29.9564 14.3369 30 15 30C23.2843 30 30 23.2842 30 15C30 6.71578 23.2843 0 15 0Z" fill="#3D9AE3"/>
                        <path d="M9.64974 18.2309L4.81213 15.8121C4.67953 15.7458 4.67824 15.5571 4.8099 15.4889L23.1885 5.98273C23.3235 5.91288 23.4793 6.03025 23.4496 6.17931L20.2853 22.0006C20.2627 22.1135 20.142 22.177 20.0361 22.1317L15.7357 20.2887C15.6842 20.2667 15.6253 20.2696 15.5763 20.2969L10.0193 23.3841C9.89848 23.4512 9.74994 23.3639 9.74994 23.2256V18.3931C9.75 18.3244 9.71121 18.2616 9.64974 18.2309Z" fill="#FCFCFC"/>
                        <path d="M11.7369 19.8613L11.7068 15.0316C11.7067 15.0006 11.7227 14.9719 11.749 14.9558L19.5947 10.163C19.6836 10.1087 19.7767 10.2264 19.7032 10.3004L13.7325 16.3135C13.7259 16.3202 13.7204 16.3278 13.7162 16.3362L12.6949 18.3786L11.9034 19.9014C11.8609 19.9831 11.7375 19.9534 11.7369 19.8613Z" fill="#D8D7DA"/>
                    </svg>
                </a>
            </div>
        </div>
    </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
