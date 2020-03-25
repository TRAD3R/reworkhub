<?php

/* @var $this yii\web\View */
/* @var $jobs array */
/* @var $job \app\modules\main\models\Job */
/* @var $pages \yii\data\Pagination */

$this->title = Yii::$app->name;

use app\helpers\ViewHelper;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\LinkPager;
?>

<?php echo $this->render("main-page", ['jobs' => $jobs]); ?>




