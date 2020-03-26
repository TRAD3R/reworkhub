<?php

use yii\helpers\Url;

?>
<section class="section section-payment-method">
  <div class="container">
    <div class="section-content">
      <p class="dr-h1 section-title">
        Методы оплаты
      </p>
      <form action="" class="payment-methods">
        <div class="payment-methods-wrapper">
          <button type="button" class="payment-methods-item">
            <span class="payment-methods-photo">
              <img src="/images/yandex-money.svg" alt="">
            </span>
            <span class="payment-methods-info">
              <span class="payment-methods-title">Яндекс Деньги</span>
            </span>
          </button>
          <button type="button" class="payment-methods-item">
            <span class="payment-methods-photo">
              <img src="/images/qiwi_koshelek.svg" alt="">
            </span>
            <span class="payment-methods-info">
              <span class="payment-methods-title">QIWI</span>
            </span>
          </button>
        </div>
      </form>
      <div class="vacancy-button">
        <a href="<?= Url::to('/tariffs')?>" class="btn btn-secondary btn-route btn-route-right">
          <span class="icon">
            <svg width='13' height='14' viewBox='0 0 13 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M7 13L1 7M1 7L7 0.999999M1 7L13 7' stroke='inherit' stroke-width='2' stroke-linejoin='round'/></svg>
          </span>
          К выбору тарифа
        </a>
      </div>
    </div>
  </div>
</section>