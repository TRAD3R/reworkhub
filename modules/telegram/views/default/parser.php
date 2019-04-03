<?php

/* @var $this \yii\web\View */
/* @var $emails array*/
/* @var $nextPage integer*/
/* @var $channel string*/
/* @var $error array*/
?>
<div class="block-jobs">
    <div class="container">

<?php
    if($error)
        echo "<h3>{$error[0]}</h3><br>";
?>
<form action="" method="post">
    <input type="text" name="teleChannelName" placeholder="Введите адрес телеграм-канала (например: u_job)"
           value="<?=$channel?>"
    >
    <button type="submit"name="parsing">Парсить</button>
    <?php if($nextPage > 1):?>

        <input type="hidden" name="page" value="<?=$nextPage?>">
        <button type="submit" name="next">Следующая страница</button>
    <?php endif;?>
    <?php if($nextPage == 0):?>
        <h4>Это была последняя страница в канале.</h4>
    <?php endif;?>
</form>

<?php
    if($emails){
        echo "<br><br>";
        foreach ($emails as $email) {
            echo "<p>$email</p>";
        }
    }else{
        echo "<h4>На данной странице нет e-mail</h4>";
    }
?>

    </div>
</div>
