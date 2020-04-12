<?php

use yii\helpers\Url;

$tariffs = Yii::$app->params['tariffs'];
?>

<div class="tariffs">
    <?php foreach ($tariffs as $key => $tariff):?>
        <div class="tariffs-item <?=$tariff['type']?>">
            <div class="tariffs-item-content">
                <p class="dr-h3 tariffs-title"><?=$tariff['title']?></p>
                <p class="tariffs-subtitle"><?=$tariff['subtitle']?></p>
                <p class="tariffs-description"><?=$tariff['description']?></p>
            </div>
            <div class="tariffs-item-cta">
                <p class="price">
                    <span class="price-old"><?=($tariff['price']['old'] > 0) ? $tariff['price']['old'] . ' руб.' : '' ?></span>
                    <span class="price-current"><?=$tariff['price']['current']?> руб.</span>
                </p>
                <a href="<?=Url::to(['freekassa-pay', 'id' => $key])?>" class="btn visible-select-tariff">Выбрать</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
