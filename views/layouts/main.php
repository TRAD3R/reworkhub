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
    <meta itemprop="image" content="<?=Url::base(true)?>/images/logo.svg">
    <meta property="og:image" content="<?=Url::base(true)?>/images/logo.svg">
    <meta property="og:site_name" content="<?=Yii::$app->name;?>">
    <meta property="og:title" content="<?= Html::encode($this->title) ?>">
    <meta property="og:description" content="">

    <!-- Template Basic Images Start -->
    <link rel="icon" href="<?=Url::base(true)?>/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=Url::base(true)?>/favicon/apple-touch-icon-180x180.png">
    <!-- Template Basic Images End -->

  <link rel="apple-touch-icon" sizes="180x180" href="<?=Url::base(true)?>/favicon/apple-touch-icon.png">
  <link rel="icon" sizes="192x192" href="<?=Url::base(true)?>/favicon/android-chrome-192x192.png">
  <link rel="icon" sizes="512x512" href="<?=Url::base(true)?>/favicon/android-chrome-512x512.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?=Url::base(true)?>/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?=Url::base(true)?>/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?=Url::base(true)?>/favicon/site.webmanifest">
  <meta name="theme-color" content="#ffffff">

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!-- Custom Browsers Color Start -->
    <meta name="theme-color" content="#000">
    <!-- Custom Browsers Color End -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<style>
  html body #__replain_widget_iframe path.accent-color-fill {
    fill: #26ae61!important;
  }
</style>
<body>
<?php $this->beginBody() ?>
<div id="wrapper">
    <div class="w1">
        <header id="header">
            <div class="header-holder">
                <a href="<?= Url::to('/')?>" class="logo">
                    <img src="/images/udalyonka-logo.svg" alt="Udalyonka">
                </a>
                <div class="header-hold">
                  <a href="<?= Url::to('/jobs') ?>" class="btn btn-accent-outline btn-route">
                    <span>Все вакансии</span>
                    <span class="icon">
                    <svg width='13' height='14' viewBox='0 0 13 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path
                          d='M6 1L12 7M12 7L6 13M12 7H0' stroke='inherit' stroke-width='2' stroke-linejoin='round'/></svg>
                  </span>
                  </a>
                    <a href="<?= Url::to('/add')?>" class="btn"><?= Yii::t('app', 'BTN_POST_JOB')?></a>
                    <div id="telegram-top-menu" class="box-social">
                        <a class="social-links-item social-links-item-min sl-telegram" href="https://t.me/ReWorkHUB" target="_blank">
                            <span class="icon">
                              <svg width="21" height="17" viewBox="0 0 21 17" xmlns="http://www.w3.org/2000/svg">
                              <path d="M18.6646 0.110375L0.934606 6.94737C-0.275394 7.43337 -0.268393 8.10837 0.712607 8.40937L5.26461 9.82937L15.7966 3.18437C16.2946 2.88137 16.7496 3.04437 16.3756 3.37637L7.84261 11.0774H7.84061L7.84261 11.0784L7.52861 15.7704C7.98861 15.7704 8.19161 15.5594 8.44961 15.3104L10.6606 13.1604L15.2596 16.5574C16.1076 17.0244 16.7166 16.7844 16.9276 15.7724L19.9466 1.54437C20.2556 0.305375 19.4736 -0.255625 18.6646 0.110375V0.110375Z" fill="inherit"/>
                              </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </header>

    <?= Alert::widget() ?>
    <?= $content ?>
    </div>

    <div class="block-consent" id="cookie-panel" style="display: none">
    	<div class="holder-consent">
    		Этот сайт использует файлы cookie. Продолжая использовать сайт, вы даете согласие на обработку файлов cookie.
    		<span class="btn-consent" id="cookie-accept">Согласен</span>
    		<span class="btn-close">
    			<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 viewBox="0 0 212.982 212.982" style="enable-background:new 0 0 212.982 212.982;" xml:space="preserve">
					<g id="Close">
						<path style="fill-rule:evenodd;clip-rule:evenodd;" d="M131.804,106.491l75.936-75.936c6.99-6.99,6.99-18.323,0-25.312
						c-6.99-6.99-18.322-6.99-25.312,0l-75.937,75.937L30.554,5.242c-6.99-6.99-18.322-6.99-25.312,0c-6.989,6.99-6.989,18.323,0,25.312
						l75.937,75.936L5.242,182.427c-6.989,6.99-6.989,18.323,0,25.312c6.99,6.99,18.322,6.99,25.312,0l75.937-75.937l75.937,75.937
						c6.989,6.99,18.322,6.99,25.312,0c6.99-6.99,6.99-18.322,0-25.312L131.804,106.491z"/>
					</g>
				</svg>
    		</span>
    	</div>
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
<!--                <a href="https://twitter.com/ReWorkhub1" target="_blank">-->
<!--                    <svg width="100%" height="100%" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                        <path d="M15 30C23.2843 30 30 23.2843 30 15C30 6.71573 23.2843 0 15 0C6.71573 0 0 6.71573 0 15C0 23.2843 6.71573 30 15 30Z" fill="#78BAEB"/>-->
<!--                        <path d="M15 0C14.3369 0 13.6839 0.0435938 13.0435 0.126973C20.4033 1.08574 26.0869 7.37889 26.0869 15C26.0869 22.6211 20.4032 28.9143 13.0434 29.873C13.6839 29.9564 14.3369 30 15 30C23.2843 30 30 23.2842 30 15C30 6.71578 23.2843 0 15 0Z" fill="#59AAE7"/>-->
<!--                        <path d="M12.0812 23.5109C10.7035 23.5109 9.35349 23.263 8.06853 22.7744L6.79517 22.2901C6.65589 22.2371 6.67517 22.0343 6.82194 22.0085L8.1638 21.7729C9.40699 21.5546 10.5826 21.0484 11.5902 20.301C11.6965 20.2221 11.6536 20.0562 11.5227 20.037C10.3494 19.8649 9.29601 19.1554 8.70497 18.1143L8.40374 17.5837C8.34972 17.4886 8.41511 17.37 8.52427 17.3647L9.1337 17.3356C9.13575 17.3355 9.13775 17.3354 9.13986 17.3352C9.2929 17.3277 9.32947 17.1193 9.19031 17.0549C8.07386 16.5381 7.26509 15.5002 7.05732 14.2575L6.96444 13.702C6.94716 13.5987 7.04062 13.5111 7.14257 13.5349L7.69089 13.6634C7.98275 13.7318 8.28445 13.7665 8.58767 13.7665C8.59124 13.7665 8.59482 13.7665 8.59845 13.7665C7.42915 13.0176 6.73452 11.7518 6.73452 10.3586C6.73452 10.0121 6.778 9.66934 6.86384 9.33981L7.02778 8.71016C7.05626 8.60076 7.19255 8.56338 7.27288 8.64277L7.7356 9.10027C8.95763 10.3086 10.4582 11.2388 12.0753 11.7904C12.5034 11.9261 13.8019 12.2945 14.2515 12.2963L14.2626 12.2964C14.2642 12.2964 14.3939 12.3011 14.4781 12.3051C14.4776 12.2814 14.4772 12.2577 14.4772 12.234C14.4772 9.78547 16.4692 7.79346 18.9177 7.79346C20.0869 7.79346 21.1846 8.24135 22.019 9.05686C22.052 9.08908 22.0979 9.10479 22.1435 9.09787C22.5725 9.03277 22.9995 8.93006 23.41 8.79254L24.779 8.33387C24.9224 8.28582 25.0359 8.46002 24.934 8.57176L23.9614 9.63869C23.8318 9.78084 23.6926 9.91314 23.5446 10.0348C23.4274 10.1312 23.5146 10.3208 23.6637 10.2928C23.7963 10.2679 23.928 10.2398 24.0585 10.2085L25.3143 9.90723C25.4571 9.87301 25.556 10.0465 25.4538 10.152L24.5548 11.079C24.1908 11.4544 23.7873 11.7989 23.3552 12.103L23.3559 12.1242C23.3572 12.1607 23.3583 12.1972 23.3583 12.234V12.2782C23.3329 18.4729 18.274 23.5109 12.0812 23.5109Z" fill="#FCFCFC"/>-->
<!--                    </svg>-->
<!--                </a>-->
                <a class="social-links-item social-links-item-min sl-telegram" href="https://t.me/ReWorkHUB" target="_blank">
                    <span class="icon">
                      <svg width="21" height="17" viewBox="0 0 21 17" xmlns="http://www.w3.org/2000/svg">
                      <path d="M18.6646 0.110375L0.934606 6.94737C-0.275394 7.43337 -0.268393 8.10837 0.712607 8.40937L5.26461 9.82937L15.7966 3.18437C16.2946 2.88137 16.7496 3.04437 16.3756 3.37637L7.84261 11.0774H7.84061L7.84261 11.0784L7.52861 15.7704C7.98861 15.7704 8.19161 15.5594 8.44961 15.3104L10.6606 13.1604L15.2596 16.5574C16.1076 17.0244 16.7166 16.7844 16.9276 15.7724L19.9466 1.54437C20.2556 0.305375 19.4736 -0.255625 18.6646 0.110375V0.110375Z" fill="inherit"/>
                      </svg>
                    </span>
                </a>
            </div>
            <a href="https://www.free-kassa.ru/">
                <img src="//www.free-kassa.ru/img/fk_btn/6.png" title="Прием платежей">
            </a>
        </div>


    </footer>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
