<?php

/* @var $jobs array */
/* @var $pages \yii\data\Pagination */

$this->title = Yii::$app->name;
?>

<div class="block-jobs">
  <div class="container">
    <div class="holder-search">
      <div class="box-search">
        <input id="search" type="text" placeholder="Поиск" class="input-search"><i class="fa fa-search" onclick="trd_search()"></i>
      </div>
    </div>
  </div>
  <div class="container">
    <?php echo $this->render("jobs-items", ['jobs' => $jobs, 'pages' => $pages]) ?>
  </div>
</div>

<?php echo $this->render("paginator", ['pages' => $pages]) ?>