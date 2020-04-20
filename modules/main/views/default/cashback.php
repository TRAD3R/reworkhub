<?php

use app\modules\main\forms\CashbackForm;
use app\modules\main\models\Cashback;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var $model CashbackForm */

?>
<section class="section section-payment-method">
  <div class="container">
    <div class="section-content">
      <p class="dr-h1 section-title">
        Методы возврата кэшбека
      </p>
        <?php $form = ActiveForm::begin([
                'options' => [
                    'class' => 'payment-methods'
            ]
        ])?>
        <div class="payment-methods-wrapper">
          <div class="payment-methods-item">
              <?= Html::activeRadio($model, 'wallet', [
                  'label'    => false,
                  'id'       => 'id-yandexmoney',
                  'value'    => Cashback::WALLET_YANDEX_MONEY,
                  'checked ' => true,
              ]); ?>
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
              <?= Html::activeRadio($model, 'wallet', [
                  'label'    => false,
                  'id'       => 'id-qiwi',
                  'value'    => Cashback::WALLET_YANDEX_MONEY,
                  'checked ' => true,
              ]); ?>
            <label for="id-qiwi" class="dr-panel">
              <span class="payment-methods-photo">
                <img src="/images/qiwi_koshelek.svg" alt="">
              </span>
              <span class="payment-methods-info">
                <span class="payment-methods-title">QIWI</span>
              </span>
            </label>
          </div>
          <div class="payment-methods-item">
            <?= Html::activeRadio($model, 'wallet', [
                'label'    => false,
                'id'       => 'id-card',
                'value'    => Cashback::WALLET_YANDEX_MONEY,
                'checked ' => true,
            ]); ?>
            <label for="id-card" class="dr-panel">
              <span class="payment-methods-photo">
                <img src="/images/credit-card.svg" alt="">
              </span>
              <span class="payment-methods-info">
                <span class="payment-methods-title">Оплата картой</span>
              </span>
            </label>
          </div>
        </div>
        <div class="dr-panel paymets-methods-fields">
          <div class="form-group">
            <label for="id-name-receiver">Имя получателя:</label>
              <?=$form->field($model, 'name')
                  ->textInput(['class' => 'form-control'])
                  ->label(false)
              ?>
          </div>
          <div class="form-group">
            <label for="id-email">E-mail:</label>
              <?=$form->field($model, 'email')
                  ->input('email', ['class' => 'form-control'])
                  ->label(false)
              ?>
          </div>
          <div class="form-group">
            <label for="id-number">Номер:</label>
              <?=$form->field($model, 'number')
                  ->textInput(['class' => 'form-control'])
                  ->label(false)
              ?>
          </div>
        </div>
        <div class="vacancy-button">
          <?=Html::submitButton('Пропустить', ['class' => 'btn btn-secondary'] )?>
          <?=Html::submitButton('Оплатить
              <span class="icon">
                <svg width=\'13\' height=\'14\' viewBox=\'0 0 13 14\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M6 1L12 7M12 7L6 13M12 7H0\' stroke=\'inherit\' stroke-width=\'2\' stroke-linejoin=\'round\'/></svg>
              </span>', ['class' => 'btn btn-accent btn-route'] )?>
          </div>
      <?php ActiveForm::end()?>
    </div>
  </div>
</section>
