<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body background="http://cdc.unpar.ac.id/tiket/assets/img/backgroundfull.jpg">
<?php $this->beginBody() ?>

<nav class="navbar navbar-inverse" role="navigation">
   <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
      </button>
      <table>
        <tbody><tr>
          <td>&nbsp;<img src="http://cdc.unpar.ac.id/tiket/assets/img/logo-unpar.png" height="50" width="50"></td>
          <td><a href="http://cdc.unpar.ac.id/career-expo" class="navbar-brand">UCES UNPAR</a></td>
        </tr>
    </tbody></table>
   </div>
   <div class="collapse navbar-collapse" id="example-navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="http://cdc.unpar.ac.id/tiket/pembelian/create">Pembelian Tiket</a></li>
        <li><a href="http://cdc.unpar.ac.id/tiket/pembelian/kirimulang">Kirim Ulang Tiket</a></li>
        <li><a href="http://cdc.unpar.ac.id/tiket/pembelian/information">Informasi</a></li>
        <li class='active'><a href="http://cdc.unpar.ac.id/career-expo/seminar">Daftar Seminar</a></li>
      </ul>
   </div>
</nav>

<div class="container">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= $content ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
