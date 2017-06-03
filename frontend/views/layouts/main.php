<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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
<body>
<?php
 $this->beginBody(); ?>

 <div class="pace-overlay"></div>
 <!--[if lt IE 10]>
         <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
     <![endif]-->

 <div class="verso-content-box verso-content-box-move-behind">

     <!-- Header -->

     <div class="verso-header verso-header-transparent">

         <!-- Top Bar -->
         <div class="verso-topbar verso-topbar-leftright">
             <div class="verso-topbar-inner">
                 <div class="verso-topbar-container">
                     <div class="verso-topbar-col">
                         <div class="verso-widget widget_text">
                             <i class="fa fa-phone"></i> &nbsp; 1-800-555-555
                         </div>
                     </div>
                     <div class="verso-topbar-col">
                         <div class="verso-widget widget_social">
                             <div class="verso-icon-set">
                                 <a class="verso-icon-set-item verso-transition" href="#">
                                     <i class="fa fa-instagram"></i>
                                 </a>
                                 <a class="verso-icon-set-item verso-transition" href="#">
                                     <i class="fa fa-linkedin"></i>
                                 </a>
                                 <a class="verso-icon-set-item verso-transition" href="#">
                                     <i class="fa fa-facebook"></i>
                                 </a>
                                 <a class="verso-icon-set-item verso-transition" href="#">
                                     <i class="fa fa-twitter"></i>
                                 </a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Navigation -->
         <div class="verso-nav verso-nav-sticky verso-nav-layout-logo-l-menu-r verso-nav-hover">
             <div class="verso-nav-inner">
                 <div class="verso-nav-container">

                     <!-- Logo -->
                     <div class="verso-nav-brand">
                         <a href="index.html">
                             <img src="https://placehold.it/130x100" alt="verso"> CORPO
                         </a>
                     </div>

                     <!-- Mobile menu toggle button -->
                     <div class="verso-nav-mobile">
                         <a id="nav-toggle" href="#">
                             <span></span>
                         </a>
                     </div>

                     <!-- Menu One -->
                     <nav class="verso-nav-menu">
                         <ul class="verso-nav-list">
                             <li>
                                 <a href="index.html">HOME</a>
                             </li>
                             <li>
                                 <a href="#">ABOUT</a>
                                 <ul class="verso-nav-dropdown closed">
                                     <li>
                                         <a href="about.html">ABOUT US</a>
                                     </li>
                                     <li>
                                         <a href="team.html">OUR TEAM</a>
                                     </li>
                                     <li>
                                         <a href="pricing.html">PRICING</a>
                                     </li>
                                 </ul>
                             </li>
                             <li>
                                 <a href="services.html">SERVICES</a>
                             </li>
                             <li>
                                 <a href="#">PROJECTS</a>
                                 <ul class="verso-nav-dropdown closed">
                                     <li>
                                         <a href="projects.html">PROJECTS</a>
                                     </li>
                                     <li>
                                         <a href="project.html">SINGLE PROJECT</a>
                                     </li>
                                 </ul>
                             </li>
                             <li>
                                 <a href="#">BLOG</a>
                                 <ul class="verso-nav-dropdown closed">
                                     <li>
                                         <a href="blog.html">BLOG</a>
                                     </li>
                                     <li>
                                         <a href="post.html">SINGLE POST</a>
                                     </li>
                                     <li>
                                         <a href="author.html">AUTHOR'S PAGE</a>
                                     </li>
                                 </ul>
                             </li>
                             <li>
                                 <a href="contact.html">CONTACT</a>
                             </li>
                         </ul>
                         <div class="verso-nav-widget">
                             <div class="verso-widget">
                                 <div class="verso-icon-set">
                                     <a class="verso-icon-set-item verso-transition verso-search-widget-button-open" href="#">
                                         <i class="fa fa-search"></i>
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </nav>
                 </div>
             </div>
         </div>
     </div>


<?=$content;?>
</div>

    <!-- Footer -->

    <footer class="verso-footer">
        <div class="section verso-py-9">
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="verso-widget widget_text">
                                <h4 class="h5 verso-widget-header text-uppercase">About Us</h4>
                                <p>Quickly coordinate e-business applications through revolutionary catalysts for change. Seamlessly underwhelm optimal testing procedures whereas bricks-and-clicks. </p>
                                <p>Distinctively exploit optimal alignments for intuitive bandwidth. </p>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="verso-widget widget_categories">
                                <h4 class="h5 verso-widget-header text-uppercase">Categories</h4>
                                <ul>
                                    <li>
                                        <a href="blog.html">
                                            Human Resources (3)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog.html">
                                            Web Development (2)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog.html">
                                            Corporate Funding (1)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog.html">
                                            Marketing &amp; Media (3)
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="verso-widget widget_recent_entries">
                                <h4 class="h5 verso-widget-header text-uppercase">Recent Posts</h4>

                                <ul>
                                    <li class="text-truncate">
                                        <a href="post.html" class="float-left verso-mr-1 verso-widget-image" title="Post title">
                                            <img alt="post image" src="https://placehold.it/100x100">
                                        </a>
                                        <a href="post.html">Corporate Enviroment</a>
                                        <small class="post-date d-block">September 25, 2017</small>
                                    </li>

                                    <li class="text-truncate">
                                        <a href="post.html" class="float-left verso-mr-1 verso-widget-image" title="Post title">
                                            <img alt="post image" src="https://placehold.it/100x100">
                                        </a>
                                        <a href="post.html"> Better Sales</a>
                                        <small class="post-date d-block">June 12, 2017</small>
                                    </li>
                                    <li class="text-truncate">
                                        <a href="post.html" class="float-left verso-mr-1 verso-widget-image" title="Post title">
                                            <img alt="post image" src="https://placehold.it/100x100">
                                        </a>
                                        <a href="post.html">Stronger Leads & new visitors</a>
                                        <small class="post-date d-block">May 05, 2017</small>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="verso-widget widget_tag_cloud">
                                <h4 class="h5 verso-widget-header text-uppercase">Tags</h4>
                                <ul>
                                    <li>
                                        <a href="blog.html">company</a>
                                    </li>

                                    <li>
                                        <a href="blog.html">leads</a>
                                    </li>

                                    <li>
                                        <a href="blog.html">marketshare</a>
                                    </li>

                                    <li>
                                        <a href="blog.html">events</a>
                                    </li>

                                    <li>
                                        <a href="blog.html">resources</a>
                                    </li>
                                    <li>
                                        <a href="blog.html">capital</a>
                                    </li>
                                    <li>
                                        <a href="blog.html">enviroment</a>
                                    </li>

                                    <li>
                                        <a href="blog.html">offices</a>
                                    </li>

                                    <li>
                                        <a href="blog.html">offshore</a>
                                    </li>

                                    <li>
                                        <a href="blog.html">accounting</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section verso-py-1">
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 text-sm-left">
                            <div class="verso-widget widget_text">
                                <p>
                                    Verso Template. © Oxygenna 2017
                                </p>
                            </div>

                        </div>
                        <div class="col-sm-6 text-sm-right">
                            <div class="verso-widget widget_social">
                                <div class="verso-icon-set">
                                    <a class="verso-icon-set-item verso-transition" href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                    <a class="verso-icon-set-item verso-transition" href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                    <a class="verso-icon-set-item verso-transition" href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a class="verso-icon-set-item verso-transition" href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </footer>


<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage() ?>
