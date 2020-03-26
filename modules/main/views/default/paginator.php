<?php

/* @var $pages \yii\data\Pagination */

use yii\widgets\LinkPager;
$this->title = Yii::$app->name;

?>

<div class="block-pagination">
  <div class="container">
    <?php echo LinkPager::widget([
        'pagination' => $pages,
        'maxButtonCount' => 5,
        'activePageCssClass' => 'active',
        'nextPageCssClass' => 'arrow-right',
        'nextPageLabel' => '<svg width="100%" height="100%" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.13174 7.99958L0.905881 0.77372C0.728168 0.596008 0.728168 0.310997 0.905881 0.133284C1.08359 -0.0444281 1.3686 -0.0444281 1.54632 0.133284L9.09407 7.68104C9.27178 7.85875 9.27178 8.14376 9.09407 8.32148L1.54632 15.8659C1.45914 15.9531 1.34178 16 1.22777 16C1.11377 16 0.996413 15.9564 0.909233 15.8659C0.731521 15.6882 0.731521 15.4032 0.909233 15.2254L8.13174 7.99958Z" fill="black"/>
                </svg>',
        'prevPageCssClass' => 'arrow-left',
        'prevPageLabel' => '<svg width="100%" height="100%" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.86826 7.99958L9.09412 0.77372C9.27183 0.596008 9.27183 0.310997 9.09412 0.133284C8.91641 -0.0444281 8.6314 -0.0444281 8.45368 0.133284L0.905928 7.68104C0.728216 7.85875 0.728216 8.14376 0.905928 8.32148L8.45368 15.8659C8.54086 15.9531 8.65822 16 8.77223 16C8.88623 16 9.00359 15.9564 9.09077 15.8659C9.26848 15.6882 9.26848 15.4032 9.09077 15.2254L1.86826 7.99958Z" fill="black"/>
                </svg>',
        'options' => ['class' => 'list-pagination'],
    ]); ?>
  </div>
</div>