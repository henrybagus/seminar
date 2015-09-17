<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Hello <?php echo $name ?>!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <?= Html::a('Login', ['login'], ['class' => 'btn btn-success']) ?>
    </div>
</div>
