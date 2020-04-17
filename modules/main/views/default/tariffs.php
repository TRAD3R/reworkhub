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

    </div>
  </div>
</section>

