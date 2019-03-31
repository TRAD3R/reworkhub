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

    <!-- Template Basic Images Start -->
    <meta property="og:image" content="path/to/image.jpg">
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
                    <img src="/img/favicon/reworkhub.png" alt="Reworkhub">
<!--                    <svg width="100%" height="100%" viewBox="0 0 99 68" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                        <path d="M7.29477 15.0637H13.1145C14.3382 15.0711 15.5418 14.7508 16.6009 14.1357C17.6733 13.5175 18.562 12.6238 19.1756 11.5467C19.8206 10.4344 20.1541 9.16815 20.141 7.88154C20.1429 6.67781 19.811 5.49729 19.1823 4.47193C18.5506 3.41702 17.6625 2.54009 16.6009 1.92321C15.5465 1.29405 14.3414 0.963945 13.1145 0.968145H0.965452V22.273H0V-0.000102327H13.1145C14.5062 -0.00325346 15.873 0.370844 17.0702 1.08264C18.2824 1.78333 19.2956 2.78341 20.0137 3.98775C20.73 5.15932 21.1083 6.50721 21.1065 7.88154C21.1065 9.47761 20.7646 10.8809 20.0807 12.0914C19.426 13.2722 18.4644 14.2529 17.2982 14.9293L19.7924 22.273H18.7732L16.3864 15.3865C16.0287 15.5301 15.7561 15.6287 15.5684 15.6824L17.8078 22.273H16.7887L14.6029 15.9111C14.5225 15.9291 14.2364 15.9605 13.7447 16.0052L15.8231 22.2729H14.8041L12.7524 16.0321H11.8808L13.8386 22.273H12.8195L10.8483 16.0321H7.29477V15.0637ZM7.29477 13.127H13.1145C13.7815 13.1365 14.4435 13.011 15.061 12.7579C15.6785 12.5049 16.2387 12.1295 16.7082 11.6542C17.7093 10.6723 18.2099 9.41478 18.21 7.88154C18.21 6.56341 17.6982 5.40447 16.6746 4.40469C15.651 3.40491 14.4643 2.90504 13.1145 2.90507H2.89645V22.273H1.93092V1.93671H13.1144C14.1689 1.93422 15.2044 2.21769 16.1114 2.75714C17.0295 3.28841 17.7978 4.04514 18.3441 4.95619C18.8869 5.83489 19.1748 6.84788 19.1755 7.88154C19.1755 9.64812 18.5788 11.1254 17.3853 12.3132C16.8316 12.8858 16.1672 13.3391 15.4329 13.6455C14.6986 13.952 13.9097 14.105 13.1145 14.0954H7.29477V13.127ZM7.29477 11.1902H13.1145C13.9469 11.2105 14.7538 10.9013 15.3606 10.3294C15.9728 9.75564 16.279 8.93968 16.2792 7.88154C16.2792 7.10142 15.9574 6.39978 15.3137 5.77661C15.0276 5.48188 14.6857 5.24739 14.3081 5.08688C13.9304 4.92637 13.5247 4.84308 13.1146 4.84189H4.82737V22.273H3.86187V3.8734H13.1145C13.6518 3.87231 14.1839 3.9795 14.6792 4.1886C15.1744 4.3977 15.6228 4.70445 15.9976 5.09066C16.829 5.90226 17.2447 6.83255 17.2447 7.88154C17.2447 9.17271 16.8424 10.2084 16.0378 10.9885C15.653 11.3692 15.1961 11.6689 14.6941 11.8698C14.192 12.0708 13.655 12.169 13.1146 12.1586H7.29477V11.1902ZM6.75837 22.273H5.79291V5.81025H13.1145C13.691 5.80145 14.2477 6.02141 14.6633 6.42225C14.8692 6.60493 15.0337 6.82964 15.1459 7.08133C15.258 7.33302 15.3152 7.60585 15.3137 7.88154C15.3137 9.44172 14.5806 10.2218 13.1145 10.2218H7.29477V9.25338H13.1145C13.4437 9.27246 13.7676 9.16416 14.0196 8.95081C14.2386 8.74907 14.3481 8.39265 14.3481 7.88154C14.3506 7.73218 14.32 7.58413 14.2586 7.44806C14.1971 7.312 14.1063 7.19132 13.9927 7.09473C13.7502 6.88197 13.4365 6.76905 13.1145 6.77863H6.75837V22.273Z" fill="#00B473"/>-->
<!--                        <path d="M24.137 22.2731H23.1715V2.90518H24.137V22.2731ZM26.068 22.2731H25.1025V2.90518H26.068L26.068 22.2731ZM27.9989 22.2731H27.0335V2.90518H27.9989V22.2731ZM29.9299 17.431H39.169V18.3994H29.9299V19.3678H39.169V20.3362H29.9299V21.3046H39.169V22.2731H28.9644V2.90518H39.169V3.87351H29.9299V4.84195H39.169V5.81031H29.9299V6.77868H39.169V7.74704H29.9299V10.1546H38.6326V11.123H29.9299V12.0915H38.6326V13.0598H29.9299V14.0282H38.6326V14.9966H29.9299V17.431Z" fill="#00B473"/>-->
<!--                        <path d="M41.328 18.3994V17.431H46.1554V18.3994H41.328ZM41.328 20.3362V19.3678H46.1554V20.3362H41.328ZM41.328 22.273V21.3046H46.1554V22.2731L41.328 22.273Z" fill="#00B473"/>-->
<!--                        <path d="M6.76962 48.203L12.1468 27.84H13.1525L7.26574 50.1131H6.26008L0.386658 27.84H1.3924L6.76962 48.203ZM7.44008 43.2671L6.98419 45.1769L2.39808 27.84H3.39039L7.44008 43.2671ZM8.44576 39.5414L7.94964 41.3974L4.39614 27.84H5.37503L8.44576 39.5414ZM9.4515 35.6813L8.94197 37.5643L6.38071 27.84H7.38647L9.4515 35.6813ZM9.26372 50.113H8.27149L14.1582 27.8399H15.1371L9.26372 50.113ZM11.2618 50.113H10.2695L16.1428 27.8399H17.1351L11.2618 50.113ZM13.2732 50.113H12.2675L18.1409 27.8669L18.1274 27.84H19.1465V27.8669L21.7614 36.9051L24.1617 27.8401H25.1673L19.2807 50.1131H18.2749L15.6467 41.0883L13.2732 50.113ZM16.1562 39.1916L18.7577 48.2839L19.2672 46.3605L16.6523 37.2952L16.1562 39.1916ZM17.1485 35.3988L19.7634 44.464L20.2729 42.5675L17.6581 33.4888L17.1485 35.3988ZM18.1409 31.6327L20.7691 40.698L21.2652 38.7881L18.6637 29.696L18.1409 31.6327ZM21.2787 50.113H20.2863L26.1731 27.8399H27.152L21.2787 50.113ZM23.2767 50.113H22.2843L28.1577 27.8399H29.15L23.2767 50.113ZM25.2881 50.113H24.2824L30.1557 27.8399H31.1614L25.2881 50.113Z" fill="black"/>-->
<!--                        <path d="M33.3203 44.5649C32.7629 43.2578 32.4756 41.8508 32.4756 40.4291C32.4756 39.0074 32.7629 37.6004 33.3203 36.2932C34.3839 33.729 36.4158 31.6909 38.9724 30.6241C40.2756 30.065 41.6784 29.7767 43.0958 29.7767C44.5133 29.7767 45.916 30.065 47.2193 30.6241C49.7758 31.691 51.8077 33.729 52.8713 36.2932C53.4287 37.6004 53.7161 39.0074 53.7161 40.4291C53.7161 41.8508 53.4287 43.2578 52.8713 44.5649C51.8077 47.1292 49.7758 49.1672 47.2193 50.234C45.916 50.7932 44.5133 51.0815 43.0958 51.0815C41.6784 51.0815 40.2756 50.7932 38.9724 50.234C36.4158 49.1673 34.3839 47.1292 33.3203 44.5649ZM34.2053 36.6699C33.701 37.8586 33.441 39.1372 33.441 40.4291C33.441 41.721 33.701 42.9995 34.2053 44.1883C34.6817 45.3453 35.3812 46.3966 36.2637 47.2818C37.1462 48.167 38.1943 48.8686 39.3479 49.3464C40.533 49.8522 41.8078 50.113 43.0958 50.113C44.3839 50.113 45.6586 49.8522 46.8438 49.3464C47.9974 48.8686 49.0455 48.167 49.928 47.2818C50.8106 46.3967 51.51 45.3453 51.9863 44.1883C52.4907 42.9995 52.7507 41.721 52.7507 40.4291C52.7507 39.1372 52.4907 37.8586 51.9863 36.6699C51.51 35.5128 50.8106 34.4615 49.9281 33.5763C49.0455 32.6912 47.9974 31.9896 46.8438 31.5118C45.6586 31.0059 44.3839 30.7452 43.0958 30.7452C41.8078 30.7452 40.533 31.0059 39.3479 31.5118C38.1943 31.9896 37.1462 32.6912 36.2637 33.5764C35.3812 34.4616 34.6817 35.5129 34.2053 36.6699ZM35.0971 43.8185C34.6414 42.747 34.4065 41.594 34.4065 40.4291C34.4065 39.2641 34.6414 38.1112 35.0971 37.0397C35.9637 34.9421 37.6253 33.2755 39.7166 32.4062C40.785 31.9492 41.9344 31.7136 43.0958 31.7136C44.2573 31.7136 45.4067 31.9492 46.4751 32.4062C48.5665 33.2753 50.2281 34.942 51.0945 37.0397C51.5501 38.1112 51.785 39.2642 51.785 40.4291C51.785 41.594 51.5501 42.7469 51.0945 43.8185C50.2281 45.9162 48.5665 47.5829 46.4751 48.452C45.4067 48.909 44.2573 49.1445 43.0958 49.1445C41.9344 49.1445 40.785 48.909 39.7166 48.452C37.6253 47.5827 35.9637 45.9161 35.0971 43.8185V43.8185ZM35.9821 37.423C35.5795 38.3738 35.372 39.3961 35.372 40.4291C35.372 41.462 35.5795 42.4844 35.9821 43.4352C36.7548 45.3042 38.2354 46.7892 40.0989 47.5642C41.0467 47.9681 42.066 48.1763 43.0959 48.1763C44.1257 48.1763 45.145 47.9681 46.0929 47.5642C47.9563 46.7893 49.4369 45.3042 50.2095 43.4352C50.6121 42.4844 50.8196 41.4621 50.8196 40.4291C50.8196 39.3961 50.6121 38.3738 50.2095 37.423C49.4369 35.554 47.9563 34.0689 46.0929 33.294C45.145 32.8901 44.1257 32.6819 43.0959 32.6819C42.066 32.6819 41.0467 32.8901 40.0989 33.294C38.2354 34.069 36.7548 35.554 35.9821 37.423ZM37.2426 43.8319C36.6496 42.7965 36.3375 41.6232 36.3375 40.4291C36.3375 39.235 36.6496 38.0617 37.2426 37.0263C37.8317 36.0005 38.6806 35.1491 39.7033 34.5582C40.7356 33.9634 41.9053 33.6504 43.0958 33.6504C44.2864 33.6504 45.4561 33.9634 46.4884 34.5582C47.5111 35.1491 48.3601 36.0006 48.9492 37.0264C49.5422 38.0618 49.8542 39.2351 49.8542 40.4292C49.8542 41.6233 49.5422 42.7965 48.9492 43.832C48.3601 44.8578 47.5112 45.7092 46.4884 46.3001C45.4561 46.8949 44.2864 47.2079 43.0958 47.2079C41.9053 47.2079 40.7356 46.8949 39.7033 46.3001C38.6805 45.7093 37.8316 44.8578 37.2426 43.8319ZM38.9993 36.3269C38.0568 37.277 37.4717 38.5255 37.3437 39.8596C37.2157 41.1938 37.5527 42.5312 38.2972 43.6442C39.0417 44.7572 40.1478 45.577 41.4272 45.964C42.7066 46.3511 44.0801 46.2814 45.3141 45.7669C46.548 45.2524 47.566 44.3248 48.1948 43.1422C48.8236 41.9595 49.0243 40.5948 48.7628 39.2804C48.5012 37.966 47.7936 36.7832 46.7604 35.9332C45.7271 35.0833 44.4321 34.6187 43.0958 34.6187C42.3329 34.6079 41.5758 34.7538 40.8713 35.0476C40.1667 35.3414 39.5296 35.7768 38.9993 36.3269V36.3269ZM39.6832 43.852C38.8947 43.0602 38.4042 42.0186 38.2955 40.9048C38.1867 39.791 38.4662 38.6738 39.0866 37.7435C39.7069 36.8133 40.6295 36.1275 41.6974 35.803C42.7653 35.4786 43.9123 35.5355 44.943 35.964C45.9737 36.3926 46.8244 37.1664 47.3502 38.1535C47.8759 39.1406 48.0442 40.28 47.8264 41.3777C47.6085 42.4753 47.018 43.4632 46.1555 44.1731C45.2929 44.883 44.2116 45.271 43.0958 45.271C42.4605 45.2809 41.8299 45.1601 41.243 44.9161C40.656 44.672 40.1252 44.3099 39.6832 43.8521V43.852ZM40.367 37.692C39.7381 38.3251 39.3474 39.1572 39.2614 40.0467C39.1754 40.9362 39.3995 41.8281 39.8955 42.5705C40.3915 43.3129 41.1287 43.8599 41.9816 44.1184C42.8345 44.3768 43.7504 44.3308 44.5732 43.9881C45.3961 43.6454 46.0751 43.0272 46.4946 42.2387C46.9141 41.4503 47.0481 40.5404 46.8739 39.664C46.6997 38.7876 46.228 37.9988 45.5391 37.432C44.8503 36.8652 43.9868 36.5555 43.0958 36.5555C42.5877 36.5479 42.0834 36.6448 41.614 36.8403C41.1447 37.0358 40.7203 37.3257 40.367 37.6921V37.692Z" fill="black"/>-->
<!--                        <path d="M63.17 44.733H68.9896C70.1455 44.7416 71.2833 44.4447 72.2885 43.8722C73.3056 43.2921 74.15 42.4502 74.7345 41.4336C75.3191 40.417 75.6226 39.2623 75.6138 38.0888C75.6155 36.9737 75.3042 35.8807 74.7156 34.9348C74.1191 33.9555 73.2807 33.1471 72.2816 32.5878C71.2801 32.0109 70.1446 31.7093 68.9896 31.7136H56.8405V50.113H55.8752V30.7452H68.9896C69.9923 30.7437 70.9847 30.9473 71.9062 31.3437C72.8036 31.7186 73.6243 32.2567 74.3267 32.9308C75.0148 33.6025 75.5699 34.3989 75.9625 35.2778C76.3684 36.159 76.5789 37.118 76.5795 38.0888C76.5795 39.658 76.2219 41.0276 75.5067 42.1978C74.8174 43.3438 73.8176 44.2697 72.6237 44.8676L74.6484 50.113H73.6158L71.6982 45.2575C71.457 45.3384 71.1754 45.4191 70.8535 45.4997L72.6639 50.113H71.6313L69.8614 45.661C69.584 45.6879 69.2934 45.7014 68.9896 45.7015L70.6927 50.113H69.6736L67.9841 45.7015H67.1123L68.7349 50.113H67.7158L66.0797 45.7015H63.17V44.733ZM63.17 42.7963H68.9896C69.6011 42.8066 70.2086 42.6955 70.777 42.4692C71.3455 42.243 71.8636 41.9061 72.3017 41.4781C73.2224 40.5994 73.6829 39.4697 73.683 38.0888C73.683 36.9143 73.2137 35.8809 72.275 34.9885C71.842 34.5598 71.3289 34.2209 70.7652 33.9912C70.2014 33.7616 69.598 33.6458 68.9896 33.6503H58.7716V50.113H57.8062V32.682H68.9896C69.7253 32.6752 70.4549 32.8149 71.1363 33.0931C71.8177 33.3713 72.4372 33.7824 72.959 34.3026C74.0852 35.3832 74.6484 36.6453 74.6485 38.0888C74.6485 39.7027 74.092 41.0521 72.9791 42.1371C72.4567 42.6625 71.8343 43.0773 71.149 43.3569C70.4637 43.6365 69.7294 43.7751 68.9897 43.7646H63.17V42.7963ZM63.17 40.8594H68.9896C69.7108 40.8772 70.4114 40.6173 70.9474 40.1331C71.4836 39.649 71.7518 38.9675 71.7519 38.0888C71.7519 37.4431 71.4725 36.8648 70.9138 36.3537C70.3952 35.8585 69.7056 35.5838 68.9896 35.5871H60.7026V50.113H59.7369V34.6188H68.9896C69.9626 34.6109 70.8996 34.9878 71.5976 35.6677C72.344 36.3672 72.7173 37.1743 72.7173 38.0888C72.7173 39.2277 72.3553 40.1356 71.6312 40.8125C70.9176 41.4854 69.9688 41.8501 68.9896 41.8278H63.17V40.8594ZM62.6334 50.113H61.668V36.5555H68.9897C69.4552 36.543 69.9088 36.7035 70.2636 37.0061C70.4265 37.1352 70.5582 37.2998 70.6488 37.4872C70.7394 37.6747 70.7865 37.8804 70.7866 38.0887C70.7866 39.2903 70.1876 39.8911 68.9897 39.8911H63.17V38.9226H68.9896C69.5438 38.9226 69.8208 38.6447 69.8208 38.0887C69.8168 38.0068 69.7919 37.9274 69.7485 37.8579C69.7051 37.7885 69.6447 37.7313 69.573 37.692C69.4001 37.5778 69.1966 37.5192 68.9896 37.5239H62.6334L62.6334 50.113Z" fill="black"/>-->
<!--                        <path d="M78.7113 30.7452H79.677V50.113H78.7113V30.7452ZM80.6424 30.7452H81.6078V50.113H80.6424V30.7452ZM82.5734 30.7452H83.5388V50.113H82.5734V30.7452ZM84.5042 30.7452H85.4699V50.113H84.5042V30.7452ZM92.5232 30.7452H91.4503L86.0599 40.5098L91.3699 50.113H92.4428L87.1327 40.5098L92.5232 30.7452ZM94.682 30.7452H93.6095L88.2322 40.5098L93.5288 50.113H94.6016L89.305 40.5098L94.682 30.7452ZM96.8412 30.7452H95.7683L90.391 40.5098L95.6879 50.113H96.7607L91.4638 40.5098L96.8412 30.7452ZM99 30.7452H97.9272L92.5498 40.5098L97.8467 50.113H98.9195L93.6227 40.5098L99 30.7452Z" fill="black"/>-->
<!--                        <path d="M69.5313 54.6401H70.9V59.9678H70.9732C71.3935 59.5962 71.8819 59.3104 72.4112 59.1261C72.9624 58.9337 73.5423 58.837 74.126 58.8402C75.1363 58.8402 75.9306 59.1166 76.509 59.6695C77.0873 60.2224 77.3765 61.0872 77.3765 62.2639V67.8448H76.0079V62.3292C76.0079 61.5176 75.8151 60.9347 75.4295 60.5806C75.0438 60.2266 74.4952 60.0496 73.7839 60.0495C73.248 60.0492 72.7171 60.1518 72.2197 60.3519C71.7206 60.5492 71.2703 60.8531 70.9 61.2424V67.8447H69.5312L69.5313 54.6401Z" fill="black"/>-->
<!--                        <path d="M80.8591 67.1625C80.2753 66.6097 79.9833 65.7449 79.9833 64.5681V58.979H81.3521V64.5028C81.3521 65.3146 81.5421 65.9002 81.9223 66.2596C82.3024 66.619 82.8374 66.7988 83.5272 66.7989C84.0541 66.7979 84.5757 66.6938 85.0628 66.4925C85.5615 66.2908 86.0105 65.9827 86.3786 65.5896V58.979H87.7472V67.8448H86.6066L86.5088 66.8642H86.4274C86.0012 67.2307 85.5109 67.5147 84.9814 67.7018C84.4361 67.896 83.8615 67.9941 83.2829 67.992C82.2508 67.992 81.4429 67.7155 80.8591 67.1625Z" fill="black"/>-->
<!--                        <path d="M90.6146 67.5589V54.6401H91.9833V59.9514H92.0565C92.4184 59.5917 92.8513 59.312 93.3274 59.1302C93.8477 58.9322 94.4004 58.8338 94.9568 58.8402C95.6459 58.8273 96.3276 58.9859 96.9406 59.3018C97.5359 59.6272 98.0145 60.1316 98.3092 60.744C98.6432 61.3977 98.8102 62.2257 98.8103 63.228C98.8103 64.808 98.3921 65.9983 97.5556 66.7989C96.7192 67.5997 95.4782 68.0001 93.8326 68C92.7444 68.0081 91.6607 67.8595 90.6146 67.5589ZM96.5658 66.0267C97.1387 65.4466 97.4252 64.5519 97.4253 63.3424C97.4253 62.1659 97.1727 61.3147 96.6676 60.7889C96.1624 60.2633 95.4673 60.0005 94.5821 60.0004C94.093 59.9975 93.6078 60.0876 93.1522 60.266C92.7035 60.4436 92.303 60.7249 91.9833 61.0872V66.6355C92.6277 66.8148 93.2941 66.9028 93.9629 66.897C95.1251 66.897 95.9927 66.6069 96.5658 66.0267Z" fill="black"/>-->
<!--                    </svg>-->
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
            <div class="box-copyright">&copy; <?=Yii::t('app', 'ALL_RIGHTS_RESERVED')?></div>
            <div class="box-social">
                <a href="#">
                    <svg width="100%" height="100%" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 30C23.2843 30 30 23.2843 30 15C30 6.71573 23.2843 0 15 0C6.71573 0 0 6.71573 0 15C0 23.2843 6.71573 30 15 30Z" fill="#78BAEB"/>
                        <path d="M15 0C14.3369 0 13.6839 0.0435938 13.0435 0.126973C20.4033 1.08574 26.0869 7.37889 26.0869 15C26.0869 22.6211 20.4032 28.9143 13.0434 29.873C13.6839 29.9564 14.3369 30 15 30C23.2843 30 30 23.2842 30 15C30 6.71578 23.2843 0 15 0Z" fill="#59AAE7"/>
                        <path d="M12.0812 23.5109C10.7035 23.5109 9.35349 23.263 8.06853 22.7744L6.79517 22.2901C6.65589 22.2371 6.67517 22.0343 6.82194 22.0085L8.1638 21.7729C9.40699 21.5546 10.5826 21.0484 11.5902 20.301C11.6965 20.2221 11.6536 20.0562 11.5227 20.037C10.3494 19.8649 9.29601 19.1554 8.70497 18.1143L8.40374 17.5837C8.34972 17.4886 8.41511 17.37 8.52427 17.3647L9.1337 17.3356C9.13575 17.3355 9.13775 17.3354 9.13986 17.3352C9.2929 17.3277 9.32947 17.1193 9.19031 17.0549C8.07386 16.5381 7.26509 15.5002 7.05732 14.2575L6.96444 13.702C6.94716 13.5987 7.04062 13.5111 7.14257 13.5349L7.69089 13.6634C7.98275 13.7318 8.28445 13.7665 8.58767 13.7665C8.59124 13.7665 8.59482 13.7665 8.59845 13.7665C7.42915 13.0176 6.73452 11.7518 6.73452 10.3586C6.73452 10.0121 6.778 9.66934 6.86384 9.33981L7.02778 8.71016C7.05626 8.60076 7.19255 8.56338 7.27288 8.64277L7.7356 9.10027C8.95763 10.3086 10.4582 11.2388 12.0753 11.7904C12.5034 11.9261 13.8019 12.2945 14.2515 12.2963L14.2626 12.2964C14.2642 12.2964 14.3939 12.3011 14.4781 12.3051C14.4776 12.2814 14.4772 12.2577 14.4772 12.234C14.4772 9.78547 16.4692 7.79346 18.9177 7.79346C20.0869 7.79346 21.1846 8.24135 22.019 9.05686C22.052 9.08908 22.0979 9.10479 22.1435 9.09787C22.5725 9.03277 22.9995 8.93006 23.41 8.79254L24.779 8.33387C24.9224 8.28582 25.0359 8.46002 24.934 8.57176L23.9614 9.63869C23.8318 9.78084 23.6926 9.91314 23.5446 10.0348C23.4274 10.1312 23.5146 10.3208 23.6637 10.2928C23.7963 10.2679 23.928 10.2398 24.0585 10.2085L25.3143 9.90723C25.4571 9.87301 25.556 10.0465 25.4538 10.152L24.5548 11.079C24.1908 11.4544 23.7873 11.7989 23.3552 12.103L23.3559 12.1242C23.3572 12.1607 23.3583 12.1972 23.3583 12.234V12.2782C23.3329 18.4729 18.274 23.5109 12.0812 23.5109Z" fill="#FCFCFC"/>
                    </svg>
                </a>
                <a href="#">
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
