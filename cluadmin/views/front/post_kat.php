<?php
use app\models\Posts;
use app\models\VAllPost;
use app\models\Katagori;
use app\models\Titlebox;
use app\models\TbSosmed;
use app\models\TbCso;
use app\models\Office;
use app\models\About;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
$rowK=Katagori::find()->where(['id_kat'=>Html::encode($kat)])->one();
$rows=VAllPost::find()->where(['id_kat'=>Html::encode($kat)])->andWhere(['post_status'=>1])->All();
?>
<div id="main" class="clearfix">
  <div class="inner-wrap clearfix">
    <div id="primary">
      <div id="content" class="clearfix">
      <header class="page-header">
         <h1 class="page-title" style="border-bottom-color: #dd5a5a">
           <span style="background-color: #dd5a5a">
             <?=$rowK->nama_kat?>
           </span>
         </h1>
      </header><!-- .page-header -->
      <div class="article-container">
        <?php
        $pertama=true;
        foreach ($rows as $row) {
        ?>
        <article id="post-85" class="post-85 post type-post status-publish format-standard has-post-thumbnail hentry category-entertainment category-female category-health category-sports">
          <div class="featured-image">
            <a href="<?php echo Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>">
              <img width="800" height="445" src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>" class="attachment-colormag-featured-image size-colormag-featured-image wp-post-image" alt="relay-race-655353_1280">
            </a>
          </div>
          <div class="article-content clearfix">
              <div class="above-entry-meta">
                <span class="cat-links">
                  <a href="<?=Url::to(['front/kat','kat'=>$row->id_kat]); ?>" style="background:#e8357c" rel="category tag"><?=$row->nama_kat?></a>
                </span>
              </div>
              <header class="entry-header">
                 <h2 class="entry-title">
                    <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>"><?=$row->post_title ?></a>
                 </h2>
              </header>
              <div class="below-entry-meta">
                <span class="posted-on">
          				<a title="<?=date("H:i",strtotime($row->post_modified))?>" rel="bookmark"><i class="fa fa-calendar-o"></i> <time class="entry-date published"><?=date("d M Y",strtotime($row->post_modified))?></time></a>
          			</span>
                <span class="byline">
          				<span class="author vcard">
          					<i class="fa fa-user"></i><a class="url fn n" title="<?=$row->user_login;?>"><?=$row->user_login;?></a></span></span>
              </div>

              <div class="entry-content clearfix">
                <p>
                  <?php
                  $pjg=200;
                  if($pertama) $pjg=500;
                  echo substr($row->post_content,0,$pjg);?>
                </p>
                 <a class="more-link" title="<?=$row->post_title ?>" href="<?php echo Url::to(['front/detail','link'=>$row->link]); ?>"><span>Read more</span></a>
              </div>
            </div>
          </article>

          <?php
            $pertama=false;
          } ?>
    </div>
  </div><!-- #content -->
</div><!-- #primary -->

<?php
  $row=VAllPost::find()->where(['<>','id_kat',Html::encode($kat)])->andWhere(['post_status'=>1])->one();
  $katOne=$row->id_kat;
?>
<div id="secondary">
  <aside id="colormag_featured_posts_vertical_widget-5" class="widget widget_featured_posts widget_featured_posts_vertical widget_featured_meta clearfix">
    <h3 class="widget-title" style="border-bottom-color:#a38a6d;">
      <span style="background-color:#a38a6d;">Recommended</span>
    </h3>
    <div class="first-post">
      <div class="single-article clearfix">
        <figure>
          <a href="<?php echo Url::to(['front/detail','link'=>$row->link]); ?>">
            <img width="390" height="205" src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>" class="attachment-colormag-featured-post-medium size-colormag-featured-post-medium wp-post-image" alt="<?=$row->post_title ?>" title="<?=$row->post_title ?>">
          </a>
        </figure>
        <div class="article-content">
        <div class="above-entry-meta">
          <span class="cat-links">
            <a  style="background:#a38a6d" rel="category tag">
              <?=$row->nama_kat?>
            </a>
          </span>
        </div>
        <header class="entry-header">
           <h2 class="entry-title">
              <a href="<?php echo Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>"><?=$row->post_title ?></a>
           </h2>
        </header>
        <div class="below-entry-meta">
          <span class="posted-on">
            <a title="<?=date("H:i",strtotime($row->post_modified))?>" rel="bookmark"><i class="fa fa-calendar-o"></i> <time class="entry-date published"><?=date("d M Y",strtotime($row->post_modified))?></time></a>
          </span>
          <span class="byline">
            <span class="author vcard">
              <i class="fa fa-user"></i><a class="url fn n" title="<?=$row->user_login;?>"><?=$row->user_login;?></a></span></span>
        </div>

        <div class="entry-content clearfix">
          <p>
            <?php
            $pjg=200;
            if($pertama) $pjg=500;
            echo substr($row->post_content,0,$pjg);?>
          </p>
           <a class="more-link" title="<?=$row->post_title ?>" href="<?php echo Url::to(['front/detail','link'=>$row->link]); ?>"><span>Read more</span></a>
        </div>
        </div>
     </div>
  </div>
  <?php
    $rows=VAllPost::find()->where(['<>','id_kat',Html::encode($kat)])->andWhere(['<>','id_kat',Html::encode($katOne)])->andWhere(['post_status'=>1])->limit('4')->All();
    foreach ($rows as $row) {
  ?>
     <div class="following-post">
         <div class="single-article clearfix">
           <figure>
             <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>">
               <img width="130" height="90" src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>" class="attachment-colormag-featured-post-small size-colormag-featured-post-small wp-post-image" alt="<?=$row->post_title ?>" title="<?=$row->post_title ?>" sizes="(max-width: 130px) 100vw, 130px">
             </a>
           </figure>
          <div class="article-content">
             <div class="above-entry-meta">
               <span class="cat-links">
                 <a style="background:#a38a6d" rel="category tag"><?=$row->nama_kat?></a>
               </span>
             </div>
             <h3 class="entry-title">
                <a href="<?php echo Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>"><?=$row->post_title ?></a>
             </h3>
             <div class="below-entry-meta">
                <span class="posted-on">
                  <a title="<?=date("H:i",strtotime($row->post_modified))?>" rel="bookmark"><i class="fa fa-calendar-o"></i> <time class="entry-date published"><?=date("d M Y",strtotime($row->post_modified))?></time></a>
                  <span class="author vcard">
                    <i class="fa fa-user"></i><a class="url fn n" title="<?=$row->user_login;?>"><?=$row->user_login;?></a></span></span>

                </span>
             </div>
         </div>
       </div>
     </div>
     <?php }
     ?>
   </aside>
   
   <aside id="colormag_featured_posts_vertical_widget-5" class="widget widget_featured_posts widget_featured_posts_vertical widget_featured_meta clearfix">
		<h3 class="widget-title" style="border-bottom-color:#a38a6d;">
		  <span style="background-color:#a38a6d;">Catagory</span>
		</h3>
		<div class="first-post" style="padding-left:20px">
			<ul>
				<?php
				  $rows=Katagori::find()->all();
				  foreach ($rows as $row) {
				?>
				<li>
						<a href="<?php echo Url::to(['front/kat','kat'=>$row->id_kat]); ?>">
					  <?=$row['nama_kat']?></a>
				</li>
				<?php }?>
			</ul>
		</div>
		</aside>

		<aside id="colormag_featured_posts_vertical_widget-5" class="widget widget_featured_posts widget_featured_posts_vertical widget_featured_meta clearfix">
		<h3 class="widget-title" style="border-bottom-color:#a38a6d;">
		  <span style="background-color:#a38a6d;">
			<?php
				$rsT=Titlebox::find()->where(['id'=>8])->one();
				echo $rsT->judul;									
			?>
		  
		  </span>
		</h3>
		<div class="first-post" style="padding-left:20px">
				<?php
				  $rows=TbSosmed::find()->all();
				  foreach ($rows as $row) {
				?>
					<a href="<?php echo Url::to($row->link); ?>" target='_blank'>
						<img src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>" width="50" height="50"/>
					</a>
				<?php }?>
		</div>
		</aside>
		
		<aside id="colormag_featured_posts_vertical_widget-5" class="widget widget_featured_posts widget_featured_posts_vertical widget_featured_meta clearfix">
		<h3 class="widget-title" style="border-bottom-color:#a38a6d;">
		  <span style="background-color:#a38a6d;">
			<?php
				$rsT=Titlebox::find()->where(['id'=>9])->one();
					echo $rsT->judul;									
			?>
		  
		  </span>
		</h3>
		<div class="first-post">
				<?php
				  $rows=TbCso::find()->all();
				  foreach ($rows as $row) {
				?>
				<div class="col-md-12">
					<img src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>" width="40" height="40" style='margin-top:-7px'/>
						<b style='margin-top:5px'><?=$row->nomer ?></b>
				</div>
				<?php }?>
		</div>
		</aside>
   
   
   
   </div>
  </div><!-- .inner-wrap -->
</div><!-- #main -->


<!-- foooooooooooooooooooooteeeeeeeeeeeeeeeeeerrrrrrrrr -->
<footer class="clearfix" id="colophon">
    <div class="footer-widgets-wrapper">
        <div class="inner-wrap">
		    <div class="footer-widgets-area ">
				<div class="col-md-12">
					<div class="col-md-3">
						<div class="tg-first-footer-widget">
							<aside class="widget widget_text clearfix" id=
							"text-3">
								<h3 class="widget-title"><span>About
								Us</span></h3>
								<div class="textwidget">
									<?php
									  $row=About::find()->one();
									  echo $row->desc;
									?>
								</div>
							</aside>
						</div>
					</div>
					<div class="col-md-3">
						<div class="tg-first-footer-widget">
							<aside class="widget widget_text clearfix" id=
							"text-3">
								<h3 class="widget-title"><span>Office</span></h3>
								<div class="textwidget">
									<?php
									  $row=Office::find()->one();
									  echo $row->alamat;
									?>
								</div>
							</aside>
						</div>
					</div>
					<div class="col-md-3">
						<aside class="widget widget_text clearfix" id="text-4">
							<h3 class="widget-title">
							  <span>All Catagory</span>
							</h3>
							<div class="textwidget">
								<ul>
									<?php
									  $rows=Katagori::find()->all();
									  foreach ($rows as $row) {
									?>
									<li>
											<a href="<?php echo Url::to(['front/kat','kat'=>$row->id_kat]); ?>">
										  <?=$row['nama_kat']?></a>
									</li>
									<?php }?>

								</ul>
							</div>
						</aside>
					</div>
					
					<div class="col-md-3">
							<aside class="widget widget_nav_menu clearfix"
							id="nav_menu-2">
								<h3 class="widget-title">
								  <span>Contact</span>
								</h3>
								<div class="menu-primary-container">
									<!-- form pengiriman email dari yii2 -->
									<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

										<div class="alert alert-success">
											Thank you for contacting us. We will respond to you as soon as possible.
										</div>
									<?php else: ?>
										<ul class="menu" id="menu-primary-1">
										  <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
											<?= $form->field($model, 'name',['template'=>'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-221">{input}{error}</li>'])->textInput(['class'=>'txt','placeholder'=>'enter your name..']) ?>
											<?= $form->field($model, 'email',['template'=>'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-221">{input}{error}</li>'])->textInput(['class'=>'txt','placeholder'=>'your email..']) ?>
											<?= $form->field($model, 'subject',['template'=>'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-221">{input}{error}</li>'])->textInput(['class'=>'txt','placeholder'=>'your subject..']) ?>
											<?= $form->field($model, 'body',['template'=>'<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-221">{input}{error}</li>'])->textArea(['rows' => 3,'class'=>'txt','placeholder'=>'Message..']) ?>
											<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
												'template' => '<div class="row"><div class="col-lg-7">{image}</div><div class="col-lg-5">{input}</div></div>',
											]) ?>

											<div class="form-group">
												<?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
											</div>
										  </ul>
									  <?php ActiveForm::end(); ?>

									<?php endif; ?>
									<!-- end of email -->


								</div>
							</aside>
					</div>
			
				</div>
			
				
               
            </div>
        </div>
    </div>
    <div class="footer-socket-wrapper clearfix">
        <div class="inner-wrap">
            <div class="footer-socket-area">
                <div class="footer-socket-left-sectoin">
                    <div class="copyright">
                        Copyright © <span>FATAMATA</span>. All
                        rights reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
