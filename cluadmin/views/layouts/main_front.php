<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\FrontAsset;
use app\models\Katagori;
use app\models\LogoNama;
use app\models\Posts;
use app\models\TbSosmed;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

FrontAsset::register($this);
$this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<link rel="icon" type="image/png" href="uploads/logo.png" />
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>
		<?php 
			if(isset($_GET['kat'])){
				$rs=Katagori::find()->where(['id_kat'=>$_GET['kat']])->one();
				echo $rs->nama_kat;
			}else if(isset($_GET['link'])){
				$rs=Posts::find()->where(['link'=>$_GET['link']])->one();
				echo $rs->post_title;
            }else{
				echo "FataMata";
			}			
			
		?>
	</title>
    <?php $this->head() ?>
</head>
<script src="js/jquery.js" type="text/javascript"/>
<script type="text/javascript">
      window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"http:\/\/demo.themegrill.com\/colormag\/wp-includes\/js\/wp-emoji-release.min.js?ver=37e854f94e0ee8529717b2a744584ebe"}};
      !function(a,b,c){function d(a){var c,d=b.createElement("canvas"),e=d.getContext&&d.getContext("2d"),f=String.fromCharCode;return e&&e.fillText?(e.textBaseline="top",e.font="600 32px Arial","flag"===a?(e.fillText(f(55356,56806,55356,56826),0,0),d.toDataURL().length>3e3):"diversity"===a?(e.fillText(f(55356,57221),0,0),c=e.getImageData(16,16,1,1).data.toString(),e.fillText(f(55356,57221,55356,57343),0,0),c!==e.getImageData(16,16,1,1).data.toString()):("simple"===a?e.fillText(f(55357,56835),0,0):e.fillText(f(55356,57135),0,0),0!==e.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag"),unicode8:d("unicode8"),diversity:d("diversity")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag&&c.supports.unicode8&&c.supports.diversity||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
</script>
<style type="text/css">
  img.wp-smiley,
  img.emoji {
  display: inline !important;
  border: none !important;
  box-shadow: none !important;
  height: 1em !important;
  width: 1em !important;
  margin: 0 .07em !important;
  vertical-align: -0.1em !important;
  background: none !important;
  padding: 0 !important;
  }
  .txt{
    margin: 2px !important;
    border-radius: 0px !important;
    background-color: #303440 !important;
    color:white !important;
    border: none !important;
    border-bottom: solid thin #eaeaea;
  }
</style>

<style id="fit-vids-style">
.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}
</style>

<body class="home blog">
<?php $this->beginBody() ?>
<div class="hfeed site" id="page">
    <header class="site-header clearfix" id="masthead">
        <div class="clearfix" id="header-text-nav-container">
            <div class="inner-wrap">
                <div class="clearfix" id="header-text-nav-wrap">
                    <div id="header-right-section">
                        <div class="clearfix" id="header-right-sidebar">
							<div class="social-links clearfix">
								<ul>
								<?php
								  $rows=TbSosmed::find()->all();
								  foreach ($rows as $row) {
								?>
									<li>
										<a href="<?php echo Url::to($row->link); ?>" target="_blank">
											<img src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>" width="25" height="25"/>
										</a>
									</li>
								<?php }?>
								</ul>
							</div>
						</div>
                    </div><!-- #header-right-section -->
					<div class="col-md-12">
						<img alt="FATAMATA" src="uploads/logo.png" width='60px' class='pull-left' style='margin-bottom:0px !important;margin-right:20px'>
						<div style='font-weight:bold;font-size:50px;margin-top:-15px'>
						<?php 
							$rs=LogoNama::find()->one();
							echo $rs->nama;
						?>
						</div>
                    </div><!-- #header-left-section -->

                </div><!-- #header-text-nav-wrap -->
            </div><!-- .inner-wrap -->
            <div class="sticky-wrapper is-sticky" id=
            "site-navigation-sticky-wrapper" style="height: 46px;">
                <nav class="main-navigation clearfix" id="site-navigation"
                role="navigation" >
                    <div class="inner-wrap clearfix">
                        <div class="home-icon front_page_on">
                            <a href="http://fatamata.com">
                              <i class="fa fa-home"></i>
                            </a>
                        </div>
                        <h4 class="menu-toggle"></h4>
                        <div class="menu-primary-container">
                            <ul class="menunav-menu" id="menu-primary">
                              <?php
                                $rows=Katagori::find()->where(['<>','id_kat',1])->all();
                                foreach ($rows as $row) {
                              ?>
                                <li class=
                                "menu-item menu-item-type-custom menu-item-object-custom menu-item-200"
                                id="menu-item-200">
                                    <a href="<?php echo Url::to(['front/kat','kat'=>$row->id_kat]); ?>">
                                  <?=$row['nama_kat']?></a>
                                </li>
                                <?php }?>
                            </ul>
                        </div>

                    </div>
                </nav>
            </div>
        </div><!-- #header-text-nav-container -->
    </header>
    <?=$content; ?>
    
</div><!-- #page -->
<div style="display:none"></div>

<div id="stb-overlay"></div><!-- / Scroll Triggered Box -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
