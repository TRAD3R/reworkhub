<?php

$this->title = Yii::$app->name;

use app\helpers\ViewHelper;
use yii\helpers\Url; ?>

<section class="section section-select-tariffs">
  <div class="container">
    <div class="section-content">
      <p class="dr-h1 section-title">
        Выбор тарифа
      </p>
<!--      <form action="">-->
        <?php echo $this->render('tariffs-items'); ?>
<!--      </form>-->
      <div class="vacancy-button">
        <a href="<?= Url::to('/preview')?>" class="btn btn-secondary btn-route btn-route-right">
          <span class="icon">
            <svg width='13' height='14' viewBox='0 0 13 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M7 13L1 7M1 7L7 0.999999M1 7L13 7' stroke='inherit' stroke-width='2' stroke-linejoin='round'/></svg>
          </span>
          К предпросмотру
        </a>
      </div>
    </div>
  </div>
</section>

