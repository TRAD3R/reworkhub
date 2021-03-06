<?php

use yii\helpers\Url;
/* @var $jobs array */

?>
<main class="page main-page">
  <section class="section section-promo" style="background-image:url('/images/photo.jpg');">
    <div class="container">
      <div class="section-content">
        <div class="promo-composition">
          <h1 class="dr-h1">Найдите идеального кандидата в самом быстроразвивающимся комьюнити удалёнщиков в СНГ</h1>
          <p class="dr-subtitle">Вашу вакансию увидят тысячи активных соискателей. Вы получите десятки заявок от кандидатов и быстро закроете открытую позицию.
          </p>
          <a href="<?= Url::to('/add')?>" class="btn" type="button">Разместить вакансию</a>
        </div>
      </div>
    </div>
  </section>
  <section style="display: none;" class="section section-features">
    <div class="container">
      <div class="section-content">
        <div class="features">
          <div class="features-item">
            <div class="features-icon">
              <img src="/images/features1.svg" alt="">
            </div>
            <div class="dr-h4 features-title text-center">
              Крупнейшая база удалёнщиков в РФ
            </div>
            <div class="features-description tariffs-subtitle text-center">
              Вашу вакансию увидят более 50 000 соискателей
            </div>
          </div>
          <div class="features-item">
            <div class="features-icon">
              <img src="/images/features2.svg" alt="">
            </div>
            <div class="dr-h4 features-title text-center">
              Много откликов
            </div>
            <div class="features-description tariffs-subtitle text-center">
              Вы получите десятки откликов от целевых кандитатов. Наш рекорд - 500 качественных откликов в первые сутки.
            </div>
          </div>
          <div class="features-item">
            <div class="features-icon">
              <img src="/images/features3.svg" alt="">
            </div>
            <div class="dr-h4 features-title text-center">
              Низкая цена
            </div>
            <div class="features-description tariffs-subtitle text-center">
              У нас три эффективных формата: за 1399, 2199 и за 7000 рублей
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section section-tariffs">
    <div class="container">
      <div class="section-content">
        <p class="dr-h2 section-title">
          Тарифы на размещение
        </p>
        <?php echo $this->render("tariffs-items") ?>
        <div class="section-content-cta">
          <a href="<?= Url::to('/add')?>" class="btn" type="button">Разместить вакансию</a>
        </div>
      </div>
    </div>
  </section>
  <section class="section section-vacancies">
    <div class="container">
      <div class="section-content">
        <p class="dr-h2 section-title">
          Вакансии
        </p>
        <div class="jobs">
          <?php echo $this->render("jobs-items", ['jobs' => $jobs]) ?>
        </div>
        <div class="section-content-cta">
          <a href="<?= Url::to('/jobs')?>" class="btn btn-accent btn-route">
            <span>Больше вакансий</span>
            <span class="icon">
              <svg width='13' height='14' viewBox='0 0 13 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6 1L12 7M12 7L6 13M12 7H0' stroke='inherit' stroke-width='2' stroke-linejoin='round'/></svg>
            </span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <section style="display: none;" class="section section-reviews">
    <div class="container">
      <div class="section-content">
        <p class="dr-h2 section-title">
          Отзывы клиентов
        </p>
        <div class="reviews">
          <div class="reviews-carousel owl-carousel default-carousel">
            <!-- вывод в js -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section section-feedback">
    <div class="container">
      <div class="section-content">
        <div class="feedback">
          <p class="dr-h1 section-title">
            Остались вопросы? <span class="c-accent">Напишите нам</span> в чат в правом нижнем углу страницы
          </p>
          <p class="dr-subtitle text-center">Либо напишите нам в <a href="https://ttttt.me/udalenka_robot" target="_blank">Telegram</a> или на почту
            <a href="mailto:info@udalyonka.com" target="_blank">info@udalyonka.com</a></p>
          <div class="social-links">
            <div class="social-links-wrapper">
              <a href="https://t.me/joinchat/AAAAAFQzh6UEUQVWgHSMFw" class="social-links-item sl-telegram" target="_blank">
              <span class="icon">
                <svg width="21" height="17" viewBox="0 0 21 17" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.6646 0.110375L0.934606 6.94737C-0.275394 7.43337 -0.268393 8.10837 0.712607 8.40937L5.26461 9.82937L15.7966 3.18437C16.2946 2.88137 16.7496 3.04437 16.3756 3.37637L7.84261 11.0774H7.84061L7.84261 11.0784L7.52861 15.7704C7.98861 15.7704 8.19161 15.5594 8.44961 15.3104L10.6606 13.1604L15.2596 16.5574C16.1076 17.0244 16.7166 16.7844 16.9276 15.7724L19.9466 1.54437C20.2556 0.305375 19.4736 -0.255625 18.6646 0.110375V0.110375Z" fill="inherit"/>
                </svg>
              </span>
              </a>
<!--              <a href="https://twitter.com/ReWorkhub1" class="social-links-item sl-twitter" target="_blank">-->
<!--              <span class="icon">-->
<!--                <svg width="20" height="17" viewBox="0 0 14 11" xmlns="http://www.w3.org/2000/svg">-->
<!--                <path d="M13.0016 1.25469C12.5234 1.46094 12.0031 1.60938 11.4672 1.66719C12.0236 1.33662 12.4403 0.814381 12.6391 0.198444C12.1169 0.509052 11.5449 0.726856 10.9484 0.842194C10.6991 0.575673 10.3976 0.36335 10.0627 0.218456C9.72771 0.0735613 9.36651 -0.000799662 9.00156 6.485e-06C7.525 6.485e-06 6.3375 1.19688 6.3375 2.66563C6.3375 2.87188 6.3625 3.07813 6.40313 3.27657C4.19219 3.16094 2.22031 2.10469 0.909375 0.487506C0.670508 0.895499 0.545334 1.36005 0.546875 1.83282C0.546875 2.75782 1.01719 3.57344 1.73437 4.05313C1.31173 4.03649 0.898973 3.92032 0.529688 3.71407V3.74688C0.529688 5.04219 1.44531 6.11563 2.66563 6.36251C2.4365 6.42202 2.20079 6.45247 1.96406 6.45313C1.79063 6.45313 1.62656 6.43594 1.46094 6.41251C1.79844 7.46876 2.78125 8.23594 3.95156 8.26094C3.03594 8.97813 1.88906 9.40001 0.64375 9.40001C0.420313 9.40001 0.214062 9.39219 0 9.36719C1.18125 10.125 2.58281 10.5625 4.09219 10.5625C8.99219 10.5625 11.6734 6.50313 11.6734 2.97969C11.6734 2.86407 11.6734 2.74844 11.6656 2.63282C12.1844 2.25313 12.6391 1.78282 13.0016 1.25469Z" fill="inherit"/>-->
<!--                </svg>-->
<!--              </span>-->
<!--              </a>-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
