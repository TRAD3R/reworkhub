<?php

return [
    'adminEmail' => '',
    'supportEmail' => '',
    'user.passwordResetTokenExpire' => 3600,
    'tariffs' => [
        [
            'type' => '',
            'title' => 'Стандарт',
            'subtitle' => 'Единоразовое размещение вакансии на сайте и в нашем Telegram канале (50.000 подписчиков)',
            'description' => 'Вашу вакансию увидят тысячи соискателей, а вы получите десятки целевых откликов.',
            'price' => [
                'old' => 0,
                'current' => 690,
            ],
            'cacheBack' => '<span class="c-accent">кэшбек 25%</span>(вернём 170 рублей на карту/киви/яндекс)'
        ],
        [
            'type' => 'primary',
            'title' => 'Премиум',
            'subtitle' => 'Увеличенный охват и быстрая публикация вакансии',
            'description' => 'Ваша вакансия будет опубликована вне очереди, получит выделяющиеся визуальное оформление, а также увеличенное время на самом видном месте в ленте',
            'price' => [
                'old' => 0,
                'current' => 1490,
            ],
            'cacheBack' => '<span class="c-accent">кэшбек 30%</span>(вернём 450 рублей на карту/киви/яндекс)'
        ],
        [
            'type' => '',
            'title' => 'Бизнес',
            'subtitle' => 'Полный пакет опций с самым большим охватом',
            'description' => 'Все опции тарифа “Премиум” + картинка + URL-кнопка и фиксация вашей вакансии в верхней части нашего Telegram канала',
            'price' => [
                'old' => 0,
                'current' => 2990,
            ],
            'cacheBack' => '<span class="c-accent">кэшбек 35%</span>(вернём 1050 рублей на карту/киви/яндекс)'
        ]
    ]
];
