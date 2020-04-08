<?php

use yii\helpers\Url;

?>
<section class="section section-payment-method">
  <div class="container">
    <div class="section-content">
      <p class="dr-h1 section-title">
        Методы возврата кэшбека
      </p>
      <form action="/" class="payment-methods">
        <div class="payment-methods-wrapper">
          <div class="payment-methods-item">
            <input type="radio" id="id-yandexmoney" name="radio-group-payment" checked>
            <label for="id-yandexmoney" class="dr-panel">
              <span class="payment-methods-photo">
                <img src="/images/yandex-money.svg" alt="">
              </span>
              <span class="payment-methods-info">
                <span class="payment-methods-title">Яндекс Деньги</span>
              </span>
            </label>
          </div>
          <div class="payment-methods-item">
            <input type="radio" id="id-qiwi" name="radio-group-payment">
            <label for="id-qiwi" class="dr-panel">
              <span class="payment-methods-photo">
                <img src="/images/qiwi_koshelek.svg" alt="">
              </span>
              <span class="payment-methods-info">
                <span class="payment-methods-title">QIWI</span>
              </span>
            </label>
          </div>
        </div>
        <div class="dr-panel paymets-methods-fields">
          <div class="form-group">
            <label for="id-name-receiver">Имя получателя:</label>
            <input type="text" class="form-control" id="id-name-receiver" name="name-receiver" required>
          </div>
          <div class="form-group">
            <label for="id-email">E-mail:</label>
            <input type="email" class="form-control" id="id-email" name="email" required>
          </div>
          <div class="form-group">
            <label for="id-number">Номер:</label>
            <input type="number" class="form-control" id="id-number" name="number" min="0" required>
          </div>
        </div>
        <button type="submit" id="btn-to-payment" style="display: none;">отправить форму</button>
      </form>
      <div class="vacancy-button content-right">

        <!--TODO: после нажатия на кн. Выбор тарифа - срабатывает клик по скрытой кнопке submit в форме в :51 -->
        <button class="btn btn-accent btn-route" onclick="toPayment()">
          К выбору тарифа
          <span class="icon">
            <svg width='13' height='14' viewBox='0 0 13 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6 1L12 7M12 7L6 13M12 7H0' stroke='inherit' stroke-width='2' stroke-linejoin='round'/></svg>
          </span>
        </button>
      </div>
    </div>
  </div>
</section>
