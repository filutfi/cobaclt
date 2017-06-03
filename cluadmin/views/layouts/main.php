<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
AppAsset::register($this);
?>
<?php
  $this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<link rel="shortcut icon" type="image/x-icon" href="<?=Yii::$app->request->baseUrl?>/image/iconlogo.png">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody();

if (!isset(Yii::$app->user->identity->user_login)) {
  //return Yii::$app->response->redirect(['site/login']);
  echo "<div class='container'><p>
     Anda tidak berhak mengakses halaman ini silahkan <a class='btn btn-flat btn-danger' href=".Url::to(['site/login']).">
    Login</a> terlebih dulu
    </p>
  </div>";
  return;
}

 ?>

<div class="skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo">

      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <li class="dropdown user user-menu">
              <div style="margin:10px 10px 1px">
                  <?php echo
                  Html::beginForm(['/site/logout'], 'post')
                               . Html::submitButton(
                                   'Logout (' . Yii::$app->user->identity->user_login . ')',
                                   ['class' => 'btn btn-success']
                               )
                               . Html::endForm()
                  ?>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <?php
          // NavBar::begin([
          //     'brandLabel' => 'My Company',
          //     'brandUrl' => Yii::$app->homeUrl,
          //     'options' => [
          //         'class' => 'navbar-inverse navbar-fixed-top',
          //     ],
          // ]);
          // echo Nav::widget([
          //     'options' => ['class' => 'navbar-nav navbar-right'],
          //     'items' => [
          //         ['label' => 'Home', 'url' => ['/site/index']],
          //         ['label' => 'About', 'url' => ['/site/about']],
          //         ['label' => 'Contact', 'url' => ['/site/contact']],
          //         ['label' => 'Barang', 'url' => ['/tb-barang/index']],
          //         Yii::$app->user->isGuest ? (
          //             ['label' => 'Login', 'url' => ['/site/login']]
          //         ) : (
          //             '<li>'
          //             . Html::beginForm(['/site/logout'], 'post')
          //             . Html::submitButton(
          //                 'Logout (' . Yii::$app->user->identity->username . ')',
          //                 ['class' => 'btn btn-link']
          //             )
          //             . Html::endForm()
          //             . '</li>'
          //         )
          //     ],
          // ]);
          // NavBar::end();
          // ?>

          <li class="header">MAIN NAVIGATION</li>
          <li>
            <a href="<?php echo Url::to(['posts/index']); ?>">
              <i class="fa  fa-paint-brush"></i> <span>Post</span>
            </a>
          </li>
          <li>
            <a href="<?php echo Url::to(['katagori/index']); ?>">
              <i class="fa fa-puzzle-piece"></i> <span>Catagory</span>
            </a>
          </li>
          <!-- <li>
            <a href="<?php echo Url::to(['logo/index']); ?>">
              <i class="fa fa-buysellads"></i> <span>Logo & nama</span>
            </a>
          </li>
          <li>
            <a href="<?php echo Url::to(['cso/index']); ?>">
              <i class="fa fa-rss"></i> <span>Cost Service</span>
            </a>
          </li>
          <li>
            <a href="<?php echo Url::to(['sosmed/index']); ?>">
              <i class="fa fa-jsfiddle"></i> <span>Sosmed</span>
            </a>
          </li>
          <li>
            <a href="<?php echo Url::to(['about/index']); ?>">
              <i class="fa fa-tint"></i> <span>About</span>
            </a>
          </li>
          <li>
            <a href="<?php echo Url::to(['office/index']); ?>">
              <i class="fa fa-coffee"></i> <span>Office</span>
            </a>
          </li>
          <li>
            <a href="<?php echo Url::to(['users/index']); ?>">
              <i class="fa fa-users"></i> <span>User</span>
            </a>
          </li> -->
          <!-- <li>
            <a href="<?php echo Url::to(['site/contact']); ?>">
              <i class="fa fa-th"></i> <span>Contact</span>
            </a>
          </li>

          <li>
            <a href="<?php echo Url::to(['site/hello','message'=>'hohoho']); ?>">
              <i class="fa fa-th"></i> <span>Hello word</span>
            </a>
          </li> -->

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      <!-- Main content -->
      <section class="content">
          <?= $content ?>
      </section>
    </section>
    </div>
  </div>
</div>

<footer class="main-footer">
  <div class="pull-right hidden-xs">
  </div>
  <strong>Copyright &copy; FataMata All rights reserved.
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
