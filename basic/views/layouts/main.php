<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" ng-app="rosRamsay">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body ng-controller="MainController">
<?php $this->beginBody() ?>

<nav class="navbar z-depth-2 primary-color">
    <div class="container ">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand waves-effect waves-light" href="#" ><p>Rosalind Ramsay Ltd</p><!--  <img src="img/logo.png" />--></a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
        <ul class="nav navbar-nav">
          <li data-match-route="/$">
        <a href="#/">Home</a>
    </li>
    <li data-match-route="/hotlist" ng-show="loggedIn()">
        <a href="#/hotlist">Hot List</a>
    </li>
    <li data-match-route="/reports" ng-show="loggedIn()" class="ng-hide">
        <a href="#/reports">Reports</a>
    </li>
    <li data-match-route="/admin" ng-show="loggedIn()" class="ng-hide">
        <a href="#/admin">Admin</a>
    </li>
    <li ng-class="{active:isActive('/logout')}" ng-show="loggedIn()" ng-click="logout()"  class="ng-hide">
        <a href="">Logout</a>
    </li>
    <li data-match-route="/login" ng-hide="loggedIn()">
        <a href="#/login">Login</a>
    </li>
          
        </ul>
          <form class="navbar-form navbar-right waves-effect waves-light" role="search" ng-show="loggedIn()">
          <div class="form-group">
            <input type="text" id="search" class="form-control" placeholder="Search" ng-keypress="search($event)" ng-click="advancedFilter()">
          </div>
        </form>
      </div>
    </div>
  </nav>



    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]); ?>
        <ng-view></ng-view>
        <?= $content ?>
    </div>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Rosalind Ramsay Ltd <?= date('Y') ?></p>

        <p class="pull-right">Site by <a href="http://www.linearblue.co.uk">Linear Blue</a></p>
    </div>
</footer>

<?php $this->endBody() ?>
<script>
              new WOW().init();
             
              

 </script>
</body>
</html>
<?php $this->endPage() ?>
