<?php
  use yii\helpers\Url;
  use app\models\Posts;
  use app\models\Katagori;
  use app\models\VAllPost;
  use app\models\TbSosmed;
  use app\models\TbCso;
  use app\models\About;
  use app\models\Office;
  use app\models\Titlebox;
  use yii\db\Expression;
  use yii\bootstrap\ActiveForm;
  use yii\captcha\Captcha;
  use yii\helpers\Html;

?>
<script>
	function gantiTitleBox(id,judul){
		var jdl = prompt("Masukkan judul baru", judul);
		if (jdl != null) {
			$.get('index.php?r=titlebox/upd',{id:id,jdl:jdl},function(o){
				if(o==1){
					$('#t'+id).text(jdl);
				}
			})
		}
	}
</script>
<div class="clearfix" id="main">
    <div class="inner-wrap clearfix">
        <div class="front-page-top-section clearfix">
            <div class="widget_slider_area">
                <section class=
                "widget widget_featured_slider widget_featured_meta clearfix"
                id="colormag_featured_posts_slider_widget-4">
                    <div class="bx-wrapper" style=
                    "max-width: 100%; margin: 0px auto;">
                        <div class="bx-viewport" style=
                        "width: 100%; overflow: hidden; position: relative; height: 350px;">
                        <div class="widget_slider_area_rotate" style="width: 415%; position: relative; transition-duration: 0s; transform: translate3d(-1260px, 0px, 0px);">
                        <?php
                          $rows=VAllPost::find()->where(['posisi'=>-1])->andWhere(['post_status'=>1])->all();
                          foreach ($rows as $row) {
                        ?>
                            <div class="single-slide displaynone bx-clone" style="float: left; list-style: none; position: relative; width: 630px;">
                                <figure class="slider-featured-image">
                                    <a href="<?php echo Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>">
                                        <img alt="<?=$row->post_title ?>" class="attachment-colormag-featured-image size-colormag-featured-image wp-post-image"
                                        height="445" width="800" src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>"
                                        title="<?=$row->post_title ?>" >
                                    </a>
                                </figure>
                                    <div class="slide-content">
                                        <div class="above-entry-meta">
                                            <span class="cat-links">
                                              <a href="<?=Url::to(['front/kat','kat'=>$row->id_kat]); ?>" rel="category tag" style="background:#e5e220">
                                                <?=$row->nama_kat?>
                                              </a>
                                            </span>

                                        </div>
                                        <h3 class="entry-title">
                                          <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>">
                                            <?=$row->post_title ?>
                                          </a>
                                        </h3>
                                        <div class="below-entry-meta">
                                            <span class="posted-on">
                                              <a rel="bookmark">
                                                <i class="fa fa-calendar-o"></i>
                                                <time class="entry-date published" datetime="<?=$row->post_modified ?>">
                                                  <?=date("d M Y",strtotime($row->post_modified))?>
                                                </time>
                                              </a>
                                            </span>
                                            <span class="byline">
                                              <span class="author vcard">
                                                <i class="fa fa-user"></i><a class="url fn n" ><?=$row->user_login?></a>
                                              </span>
                                            </span>

                                        </div>
                                    </div>
                                </div>
                              <?php
                                } ?>
                            </div>
                        </div>
                        <div class="bx-controls"></div>
                    </div>
                </section>
            </div>
            <div class="widget_beside_slider">
                <section class=
                "widget widget_highlighted_posts widget_featured_meta clearfix"
                id="colormag_highlighted_posts_widget-3">
                    <div class="widget_highlighted_post_area">
                      <?php
                        $rows=VAllPost::find()->where(['posisi'=>0])->andWhere(['post_status'=>1])->limit('4')->all();
                        foreach ($rows as $row) {
                      ?>
                        <div class="single-article">
                            <figure class="highlights-featured-image">
                                <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>">
                                  <img alt="<?=$row->post_title ?>" class="attachment-colormag-highlighted-post size-colormag-highlighted-post wp-post-image"
                                    src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>" title="<?=$row->post_title ?>"/>
                                </a>
                            </figure>
                            <div class="article-content">
                                <h3 class="entry-title">
                                  <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title=""><?=$row->post_title ?></a>
                                </h3>
                                <div class="below-entry-meta">
                                    <span class="posted-on">
                                      <a rel="bookmark" title="<?=date('H:i',strtotime($row->post_modified))?>">
                                        <i class="fa fa-calendar-o"></i>
                                        <time class="entry-date published">
                                          <?=date("d M Y",strtotime($row->post_modified))?>
                                        </time>
                                      </a>
                                      <span class="author vcard">
                                        <i class="fa fa-user"></i><a class="url fn n" ><?=$row->user_login?></a>
                                      </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php
                      } ?>
                    </div>
                </section>
            </div>
        </div>
        <div class="main-content-section clearfix">
            <div id="primary">
                <div class="clearfix" id="content">
                    <section class="widget widget_featured_posts widget_featured_meta clearfix" id="colormag_featured_posts_widget-3">
                        <h3 class="widget-title" style="border-bottom-color:#81d742;">
                          <span style="background-color:#81d742;">
							<?php
								$rsT=Titlebox::find()->where(['id'=>1])->one();
								if (!isset(Yii::$app->user->identity->user_login)) {
									echo $rsT->judul;									
								}else{
									echo "<div style='color:white;cursor:pointer;' onclick='gantiTitleBox(\"".$rsT->id."\",\"".$rsT->judul."\")' ><i class='fa fa-pencil'></i><span id='t".$rsT->id."' style='background-color:transparent !important'>".$rsT->judul."</span></div>";									
								}
							?>
                          </span>
                        </h3>
                        <div class="first-post">
                            <div class="single-article clearfix">
                                <figure>
									<?php
									  $row=VAllPost::find()->where(['posisi'=>1])->andWhere(['post_status'=>1])->orderBy('post_date Desc')->one();
									  $idpost=$row->ID;
									?>

                                  <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="">
                                    <img alt="" class="attachment-colormag-featured-post-medium size-colormag-featured-post-medium wp-post-image"
                                    height="205" src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>" title="Coffee is health food: Myth or fact?" width="390">
                                  </a>
                                </figure>
                                <div class="article-content">
                                    <div class="above-entry-meta">
                                        <span class="cat-links">
                                          <a href="<?=Url::to(['front/kat','kat'=>$row->id_kat]);?>" rel="category tag" style="background:#81d742">
                                            <?=$row->nama_kat ?>
                                          </a>
                                        </span>
                                    </div>
                                    <h3 class="entry-title">
                                      <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>">
                                        <?=$row->post_title ?>
                                      </a>
                                    </h3>
                                    <div class="below-entry-meta">
                                        <span class="posted-on">
                                          <a href="" rel="bookmark" title="10:00 am">
                                            <i class="fa fa-calendar-o"></i>
                                            <time class="entry-date published">
                                              <?=date('d M Y',strtotime($row->post_date)) ?>
                                            </time>
                                          </a>
                                          <span class="author vcard">
                                            <i class="fa fa-user"></i><a class="url fn n" ><?=$row->user_login?></a>
                                          </span>
                                        </span>
                                    </div>
                                    <div class="entry-content">
                                        <p><?=substr($row->post_content,0,150)."..." ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="following-post">
                          <?php
                              $rows=VAllPost::find()->where(['posisi'=>1])->andWhere(['<>','ID',$idpost])->andWhere(['post_status'=>1])->limit('4')->orderBy(new Expression('rand()'))->all();
                              foreach($rows as $row){
                          ?>
                            <div class="single-article clearfix">
                                <figure>
                                  <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>">
                                    <img alt="<?=$row->post_title?>" class="attachment-colormag-featured-post-small size-colormag-featured-post-small wp-post-image" height="90" sizes="(max-width: 130px) 100vw, 130px"
                                    src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>" title="<?=$row->post_title ?>" width="130">
                                  </a>
                                </figure>
                                <div class="article-content">
                                    <div class="above-entry-meta">
                                        <span class="cat-links">
                                          <a href="<?=Url::to(['front/kat','kat'=>$row->id_kat]); ?>" rel="category tag" style="background:#81d742">
                                            <?=$row->nama_kat?>
                                          </a>
                                      </span>
                                    </div>
                                    <h3 class="entry-title">
                                      <a href="<?=Url::to(['front/detail','link'=>$row->link]);?>" title="<?=$row->post_title?>">
                                          <?=$row->post_title?>
                                      </a>
                                    </h3>
                                    <div class="below-entry-meta">
                                        <span class="posted-on">
                                          <a href="" rel="bookmark" title="9:57 am">
                                            <i class="fa fa-calendar-o"></i>
                                            <time class="entry-date published" >
                                              <?=date('d M Y',strtotime($row->post_date)) ?>
                                            </time>
                                          </a>
                                          <span class="author vcard">
                                            <i class="fa fa-user"></i><a class="url fn n" ><?=$row->user_login?></a>
                                          </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php
                              }
                            ?>
                        </div><!-- </div> -->
                    </section>

                    <div class="tg-one-half">
                        <section class="widget widget_featured_posts widget_featured_posts_vertical widget_featured_meta clearfix" id="colormag_featured_posts_vertical_widget-3">
                          <?php
                            $row=VAllPost::find()->where(['posisi'=>2])->andWhere(['post_status'=>1])->orderBy('post_date Desc')->one();
                            $idpost=$row->ID;
                          ?>
                            <h3 class="widget-title" style="border-bottom-color:red;">
                              <span style="background-color:red;">
								<?php
									$rsT=Titlebox::find()->where(['id'=>2])->one();
									if (!isset(Yii::$app->user->identity->user_login)) {
										echo $rsT->judul;									
									}else{
										echo "<div style='color:white;cursor:pointer;' onclick='gantiTitleBox(\"".$rsT->id."\",\"".$rsT->judul."\")' ><i class='fa fa-pencil'></i><span id='t".$rsT->id."' style='background-color:transparent !important'>".$rsT->judul."</span></div>";									
									}
								?>
                              </span>
                            </h3>
                            <div class="first-post">
                                <div class="single-article clearfix">
                                    <figure>
                                      <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>">
                                        <img alt="" class="attachment-colormag-featured-post-medium size-colormag-featured-post-medium wp-post-image"
                                        height="205" src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>" title="Coffee is health food: Myth or fact?" width="390">
                                      </a>
                                    </figure>
                                    <div class="article-content">
                                        <div class="above-entry-meta">
                                            <span class="cat-links">
                                              <a href="<?=Url::to(['front/kat','kat'=>$row->id_kat]); ?>" rel="category tag" style="background-color:red;">
                                                <?=$row->nama_kat ?>
                                              </a>
                                            </span>
                                        </div>
                                        <h3 class="entry-title">
                                          <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>">
                                            <?=$row->post_title ?>
                                          </a>
                                        </h3>
                                        <div class="below-entry-meta">
                                            <span class="posted-on">
                                              <a href="" rel="bookmark" title="10:00 am">
                                                <i class="fa fa-calendar-o"></i>
                                                <time class="entry-date published">
                                                  <?=date('d M Y',strtotime($row->post_date)) ?>
                                                </time>
                                              </a>
                                            </span>
                                            <span class="byline">
                                              <span class="author vcard">
                                                <i class="fa fa-user"></i><a class="url fn n" ><?=$row->user_login?></a>
                                              </span>
                                            </span>
                                        </div>
                                        <div class="entry-content">
                                            <p><?=substr($row->post_content,0,150)."..." ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="following-post">
                              <?php
                                  $rows=VAllPost::find()->where(['posisi'=>2])->andWhere(['<>','ID',$idpost])->andWhere(['post_status'=>1])->limit('4')->orderBy(new Expression('rand()'))->all();
                                  foreach($rows as $row){
                              ?>
                                <div class="single-article clearfix">
                                    <figure>
                                      <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>">
                                        <img alt="<?=$row->post_title?>" class="attachment-colormag-featured-post-small size-colormag-featured-post-small wp-post-image" height="90" sizes="(max-width: 130px) 100vw, 130px"
                                        src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>" title="<?=$row->post_title ?>" width="130">
                                      </a>
                                    </figure>
                                    <div class="article-content">
                                        <div class="above-entry-meta">
                                            <span class="cat-links">
                                              <a href="<?=Url::to(['front/kat','kat'=>$row->id_kat]);?>" rel="category tag" style="background:#81d742">
                                                <?=$row->nama_kat?>
                                              </a>
                                          </span>
                                        </div>
                                        <h3 class="entry-title">
                                          <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title?>">
                                              <?=$row->post_title?>
                                          </a>
                                        </h3>
                                        <div class="below-entry-meta">
                                            <span class="posted-on">
                                              <a href="" rel="bookmark" title="9:57 am">
                                                <i class="fa fa-calendar-o"></i>
                                                <time class="entry-date published" >
                                                  <?=date('d M Y',strtotime($row->post_date)) ?>
                                                </time>
                                              </a>
                                                <span class="author vcard">
                                                  <i class="fa fa-user"></i><a class="url fn n" ><?=$row->user_login?></a>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                  }
                                ?>
                            </div><!-- </div> -->
                        </section>
                    </div>
                    <div class="tg-one-half tg-one-half-last">
                      <section class="widget widget_featured_posts widget_featured_posts_vertical widget_featured_meta clearfix" id="colormag_featured_posts_vertical_widget-3">
                        <?php
                          $row=VAllPost::find()->where(['posisi'=>3])->andWhere(['post_status'=>1])->orderBy('post_date Desc')->one();
                          $idpost=$row->ID;
                        ?>
                          <h3 class="widget-title" style="border-bottom-color:#bd4cce;">
                            <span style="background-color:#bd4cce;">
								<?php
									$rsT=Titlebox::find()->where(['id'=>3])->one();
									if (!isset(Yii::$app->user->identity->user_login)) {
										echo $rsT->judul;									
									}else{
										echo "<div style='color:white;cursor:pointer;' onclick='gantiTitleBox(\"".$rsT->id."\",\"".$rsT->judul."\")' ><i class='fa fa-pencil'></i><span id='t".$rsT->id."' style='background-color:transparent !important'>".$rsT->judul."</span></div>";									
									}
								?>
                            </span>
                          </h3>
                          <div class="first-post">
                              <div class="single-article clearfix">
                                  <figure>
                                    <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>">
                                      <img alt="" class="attachment-colormag-featured-post-medium size-colormag-featured-post-medium wp-post-image"
                                      height="205" src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>" title="Coffee is health food: Myth or fact?" width="390">
                                    </a>
                                  </figure>
                                  <div class="article-content">
                                      <div class="above-entry-meta">
                                          <span class="cat-links">
                                            <a href="<?=Url::to(['front/kat','kat'=>$row->id_kat]); ?>" rel="category tag" style="background-color:#bd4cce;">
                                              <?=$row->nama_kat ?>
                                            </a>
                                          </span>
                                      </div>
                                      <h3 class="entry-title">
                                        <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>">
                                          <?=$row->post_title ?>
                                        </a>
                                      </h3>
                                      <div class="below-entry-meta">
                                          <span class="posted-on">
                                            <a rel="bookmark" >
                                              <i class="fa fa-calendar-o"></i>
                                              <time class="entry-date published">
                                                <?=date('d M Y',strtotime($row->post_date)) ?>
                                              </time>
                                            </a>
                                          </span>
                                          <span class="byline">
                                            <span class="author vcard">
                                              <i class="fa fa-user"></i><a class="url fn n" ><?=$row->user_login?></a>
                                            </span>
                                          </span>
                                      </div>
                                      <div class="entry-content">
                                          <p><?=substr($row->post_content,0,150)."..." ?></p>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="following-post">
                            <?php
                                $rows=VAllPost::find()->where(['posisi'=>3])->andWhere(['<>','ID',$idpost])->andWhere(['post_status'=>1])->limit('4')->orderBy(new Expression('rand()'))->all();
                                foreach($rows as $row){
                            ?>
                              <div class="single-article clearfix">
                                  <figure>
                                    <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>">
                                      <img alt="<?=$row->post_title?>" class="attachment-colormag-featured-post-small size-colormag-featured-post-small wp-post-image" height="90" sizes="(max-width: 130px) 100vw, 130px"
                                      src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>" title="<?=$row->post_title ?>" width="130">
                                    </a>
                                  </figure>
                                  <div class="article-content">
                                      <div class="above-entry-meta">
                                          <span class="cat-links">
                                            <a href="<?=Url::to(['front/kat','kat'=>$row->id_kat]); ?>" rel="category tag" style="background:#81d742">
                                              <?=$row->nama_kat?>
                                            </a>
                                        </span>
                                      </div>
                                      <h3 class="entry-title">
                                        <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title?>">
                                            <?=$row->post_title?>
                                        </a>
                                      </h3>
                                      <div class="below-entry-meta">
                                          <span class="posted-on">
                                            <a href="" rel="bookmark" title="9:57 am">
                                              <i class="fa fa-calendar-o"></i>
                                              <time class="entry-date published" >
                                                <?=date('d M Y',strtotime($row->post_date)) ?>
                                              </time>
                                            </a>
                                            <span class="author vcard">
                                              <i class="fa fa-user"></i><a class="url fn n" ><?=$row->user_login?></a>
                                            </span>
                                          </span>

                                      </div>
                                  </div>
                              </div>
                              <?php
                                }
                              ?>
                          </div><!-- </div> -->
                      </section>
                    </div>
					<div class="col-md-12" style='padding-left:0px !important;padding-right:0px !important'>
						<section class="widget widget_featured_posts widget_featured_meta clearfix" id="colormag_featured_posts_widget-3">
							<?php
							  $row=VAllPost::find()->where(['posisi'=>4])->andWhere(['post_status'=>1])->orderBy('post_date Desc')->one();
							  $idpost=$row->ID;
							?>

							<div style='margin-top:30px'></div>
							<h3 class="widget-title" style="border-bottom-color:blue;">
							  <span style="background-color:blue;">
								<?php
									$rsT=Titlebox::find()->where(['id'=>4])->one();
									if (!isset(Yii::$app->user->identity->user_login)) {
										echo $rsT->judul;									
									}else{
										echo "<div style='color:white;cursor:pointer;' onclick='gantiTitleBox(\"".$rsT->id."\",\"".$rsT->judul."\")' ><i class='fa fa-pencil'></i><span id='t".$rsT->id."' style='background-color:transparent !important'>".$rsT->judul."</span></div>";									
									}
								?>
							  </span>
							</h3>
								<?php
									$urt=1;
									$rows=VAllPost::find()->where(['posisi'=>4])->andWhere(['post_status'=>1])->limit('6')->orderBy(new Expression('rand()'))->all();
									foreach($rows as $row){
										if($urt==1){
											echo "<div class='col-md-12' style='padding:0px'>";
										}
								?>	
									<div class="col-md-4">
										<figure>
										  <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="">
											<img alt="" class="attachment-colormag-featured-post-medium size-colormag-featured-post-medium wp-post-image"
											height="205" src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>" title="Coffee is health food: Myth or fact?" width="390">
										  </a>
										</figure>
										<div class="article-content" style="padding:0px !important">
											<!--<div class="above-entry-meta">
												<span class="cat-links">
												  <a href="<?=Url::to(['front/kat','kat'=>$row->id_kat]);?>" rel="category tag" style="background:#81d742">
													<?=$row->nama_kat ?>
												  </a>
												</span>
											</div>
											-->
											<h3 class="entry-title">
											  <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>">
												<?=$row->post_title ?>
											  </a>
											</h3>
											<div class="below-entry-meta">
												<span class="posted-on">
												  <a href="" rel="bookmark" title="10:00 am">
													<i class="fa fa-calendar-o"></i>
													<time class="entry-date published">
													  <?=date('d M Y',strtotime($row->post_date)) ?>
													</time>
												  </a>
												  <span class="author vcard">
													<i class="fa fa-user"></i><a class="url fn n" ><?=$row->user_login?></a>
												  </span>
												</span>
											</div>
											<div class="entry-content">
												<p><?=substr($row->post_content,0,100)."..." ?></p>
											</div>
										</div>
									</div>
										<?php 
											if($urt==3){
												echo "</div>";
											}
											$urt++;
										} ?>
							
						</section>
					</div>
					<div class="col-md-12" style='padding-left:0px !important;padding-right:0px !important'>
						<section class="widget widget_featured_posts widget_featured_meta clearfix" id="colormag_featured_posts_widget-3">
							<div style='margin-top:30px'></div>
							<h3 class="widget-title" style="border-bottom-color:grey;">
							  <span style="background-color:grey;">
								<?php
									$rsT=Titlebox::find()->where(['id'=>5])->one();
									if (!isset(Yii::$app->user->identity->user_login)) {
										echo $rsT->judul;									
									}else{
										echo "<div style='color:white;cursor:pointer;' onclick='gantiTitleBox(\"".$rsT->id."\",\"".$rsT->judul."\")' ><i class='fa fa-pencil'></i><span id='t".$rsT->id."' style='background-color:transparent !important'>".$rsT->judul."</span></div>";									
									}
								?>
							  </span>
							</h3>							
						</section>
					</div>
					<!--- slider bawah--->
					<div class="col-md-12">
							<div class="widget_slider_area" style="width:auto !important">
								<section class="widget widget_featured_slider widget_featured_meta clearfix" id="colormag_featured_posts_slider_widget-4">
									<div class="bx-wrapper" style="max-width: 100%; margin: 0px auto;">
										<div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative;margin-bottom:30px">
										<div class="widget_slider_area_rotate" style="width: 415%; position: relative; transition-duration: 0s; transform: translate3d(-1260px, 0px, 0px);">
										<?php
										  $rows=VAllPost::find()->where(['posisi'=>5])->andWhere(['post_status'=>1])->all();
										  foreach ($rows as $row) {
										?>
											<div class="single-slide displaynone bx-clone" style="float: left; list-style: none; position: relative; width: 630px;">
												<figure class="slider-featured-image">
													<a href="<?php echo Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>">
														<img alt="<?=$row->post_title ?>" class="attachment-colormag-featured-image size-colormag-featured-image wp-post-image"
														height="445" width="800" src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>"
														title="<?=$row->post_title ?>" >
													</a>
												</figure>
													<div class="slide-content">
														<div class="above-entry-meta">
															<span class="cat-links">
															  <a href="<?=Url::to(['front/kat','kat'=>$row->id_kat]); ?>" rel="category tag" style="background:#e5e220">
																<?=$row->nama_kat?>
															  </a>
															</span>

														</div>
														<h3 class="entry-title">
														  <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>">
															<?=$row->post_title ?>
														  </a>
														</h3>
														<div class="below-entry-meta">
															<span class="posted-on">
															  <a rel="bookmark">
																<i class="fa fa-calendar-o"></i>
																<time class="entry-date published" datetime="<?=$row->post_modified ?>">
																  <?=date("d M Y",strtotime($row->post_modified))?>
																</time>
															  </a>
															</span>
															<span class="byline">
															  <span class="author vcard">
																<i class="fa fa-user"></i><a class="url fn n" ><?=$row->user_login?></a>
															  </span>
															</span>

														</div>
													</div>
												</div>
											  <?php
												} ?>
											</div>
										</div>
										<div class="bx-controls"></div>
									</div>
								</section>
							</div>
					
					</div>
					<!------end of slider------->
					<div class="col-md-12">
					<section class="widget widget_featured_posts widget_featured_meta clearfix" id="colormag_featured_posts_widget-3">
                        <?php
                          $row=VAllPost::find()->where(['posisi'=>6])->andWhere(['post_status'=>1])->orderBy('post_date Desc')->one();
                          $idpost=$row->ID;
                        ?>
                        <h3 class="widget-title" style="border-bottom-color:darkorange;">
                          <span style="background-color:darkorange;">
								<?php
									$rsT=Titlebox::find()->where(['id'=>6])->one();
									if (!isset(Yii::$app->user->identity->user_login)) {
										echo $rsT->judul;									
									}else{
										echo "<div style='color:white;cursor:pointer;' onclick='gantiTitleBox(\"".$rsT->id."\",\"".$rsT->judul."\")' ><i class='fa fa-pencil'></i><span id='t".$rsT->id."' style='background-color:transparent !important'>".$rsT->judul."</span></div>";									
									}
								?>
                          </span>
                        </h3>
                        <div class="first-post">
                            <div class="single-article clearfix">
                                <figure>
                                  <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="">
                                    <img alt="" class="attachment-colormag-featured-post-medium size-colormag-featured-post-medium wp-post-image"
                                    height="205" src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>" title="Coffee is health food: Myth or fact?" width="390">
                                  </a>
                                </figure>
                                <div class="article-content">
                                    <div class="above-entry-meta">
                                        <span class="cat-links">
                                          <a href="<?=Url::to(['front/kat','kat'=>$row->id_kat]);?>" rel="category tag" style="background:#81d742">
                                            <?=$row->nama_kat ?>
                                          </a>
                                        </span>
                                    </div>
                                    <h3 class="entry-title">
                                      <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>">
                                        <?=$row->post_title ?>
                                      </a>
                                    </h3>
                                    <div class="below-entry-meta">
                                        <span class="posted-on">
                                          <a href="" rel="bookmark" title="10:00 am">
                                            <i class="fa fa-calendar-o"></i>
                                            <time class="entry-date published">
                                              <?=date('d M Y',strtotime($row->post_date)) ?>
                                            </time>
                                          </a>
                                          <span class="author vcard">
                                            <i class="fa fa-user"></i><a class="url fn n" ><?=$row->user_login?></a>
                                          </span>
                                        </span>
                                    </div>
                                    <div class="entry-content">
                                        <p><?=substr($row->post_content,0,150)."..." ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="following-post">
                          <?php
                              $rows=VAllPost::find()->where(['posisi'=>6])->andWhere(['<>','ID',$idpost])->andWhere(['post_status'=>1])->limit('4')->orderBy(new Expression('rand()'))->all();
                              foreach($rows as $row){
                          ?>
                            <div class="single-article clearfix">
                                <figure>
                                  <a href="<?=Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>">
                                    <img alt="<?=$row->post_title?>" class="attachment-colormag-featured-post-small size-colormag-featured-post-small wp-post-image" height="90" sizes="(max-width: 130px) 100vw, 130px"
                                    src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>" title="<?=$row->post_title ?>" width="130">
                                  </a>
                                </figure>
                                <div class="article-content">
                                    <div class="above-entry-meta">
                                        <span class="cat-links">
                                          <a href="<?=Url::to(['front/kat','kat'=>$row->id_kat]); ?>" rel="category tag" style="background:#81d742">
                                            <?=$row->nama_kat?>
                                          </a>
                                      </span>
                                    </div>
                                    <h3 class="entry-title">
                                      <a href="<?=Url::to(['front/detail','link'=>$row->link]);?>" title="<?=$row->post_title?>">
                                          <?=$row->post_title?>
                                      </a>
                                    </h3>
                                    <div class="below-entry-meta">
                                        <span class="posted-on">
                                          <a href="" rel="bookmark" title="9:57 am">
                                            <i class="fa fa-calendar-o"></i>
                                            <time class="entry-date published" >
                                              <?=date('d M Y',strtotime($row->post_date)) ?>
                                            </time>
                                          </a>
                                          <span class="author vcard">
                                            <i class="fa fa-user"></i><a class="url fn n" ><?=$row->user_login?></a>
                                          </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php
                              }
                            ?>
                        </div><!-- </div> -->
                    </section>
					</div>
				</div>
					
            </div>

			
			
            <div id="secondary">
            <?php
              $row=VAllPost::find()->where(['posisi'=>7])->andWhere(['post_status'=>1])->one();
              $katOne=$row->id_kat;
            ?>
              <aside id="colormag_featured_posts_vertical_widget-5" class="widget widget_featured_posts widget_featured_posts_vertical widget_featured_meta clearfix">
                <h3 class="widget-title" style="border-bottom-color:#a38a6d;">
                  <span style="background-color:#a38a6d;">
					<?php
						$rsT=Titlebox::find()->where(['id'=>7])->one();
						if (!isset(Yii::$app->user->identity->user_login)) {
							echo $rsT->judul;									
						}else{
							echo "<div style='color:white;cursor:pointer;' onclick='gantiTitleBox(\"".$rsT->id."\",\"".$rsT->judul."\")' ><i class='fa fa-pencil'></i><span id='t".$rsT->id."' style='background-color:transparent !important'>".$rsT->judul."</span></div>";									
						}
					?>
				  
				  </span>
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
                        <a href="<?=Url::to(['front/kat','kat'=>$row->id_kat]); ?>" style="background:#a38a6d" rel="category tag">
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
                          <span class="author vcard">
                            <i class="fa fa-user"></i><a class="url fn n" ><?=$row->user_login?></a>
                          </span>
                      </span>
                    </div>

                    <div class="entry-content clearfix">
                      <p>
                        <?php
                          echo substr($row->post_content,0,200);
                          ?>
                      </p>
                       <a class="more-link" title="<?=$row->post_title ?>" href="<?php echo Url::to(['front/detail','link'=>$row->link]); ?>"><span>Read more</span></a>
                    </div>
                    </div>
                 </div>
              </div>
              <?php
                $rows=VAllPost::find()->where(['posisi'=>7])->andWhere(['<>','ID',$row->ID])->andWhere(['post_status'=>1])->limit('4')->All();
                foreach ($rows as $row) {
              ?>
                 <div class="following-post">
                     <div class="single-article clearfix">
                       <figure>
                         <a href="<?php echo Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>">
                           <img width="130" height="90" src="<?=Yii::$app->request->baseUrl.'/uploads/'.$row->gambar; ?>" class="attachment-colormag-featured-post-small size-colormag-featured-post-small wp-post-image" alt="<?=$row->post_title ?>" title="<?=$row->post_title ?>" sizes="(max-width: 130px) 100vw, 130px">
                         </a>
                       </figure>
                      <div class="article-content">
                         <div class="above-entry-meta">
                           <span class="cat-links">
                             <a href="" style="background:#a38a6d" rel="category tag">General</a>
                           </span>
                         </div>
                         <h3 class="entry-title">
                            <a href="<?php echo Url::to(['front/detail','link'=>$row->link]); ?>" title="<?=$row->post_title ?>"><?=$row->post_title ?></a>
                         </h3>
                         <div class="below-entry-meta">
                            <span class="posted-on">
                              <a title="<?=date("H:i",strtotime($row->post_modified))?>" rel="bookmark"><i class="fa fa-calendar-o"></i> <time class="entry-date published"><?=date("d M Y",strtotime($row->post_modified))?></time></a>
                                <span class="author vcard">
                                  <i class="fa fa-user"></i><a class="url fn n" ><?=$row->user_login?></a>
                                </span>
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
						if (!isset(Yii::$app->user->identity->user_login)) {
							echo $rsT->judul;									
						}else{
							echo "<div style='color:white;cursor:pointer;' onclick='gantiTitleBox(\"".$rsT->id."\",\"".$rsT->judul."\")' ><i class='fa fa-pencil'></i><span id='t".$rsT->id."' style='background-color:transparent !important'>".$rsT->judul."</span></div>";									
						}
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
						if (!isset(Yii::$app->user->identity->user_login)) {
							echo $rsT->judul;									
						}else{
							echo "<div style='color:white;cursor:pointer;' onclick='gantiTitleBox(\"".$rsT->id."\",\"".$rsT->judul."\")' ><i class='fa fa-pencil'></i><span id='t".$rsT->id."' style='background-color:transparent !important'>".$rsT->judul."</span></div>";									
						}
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
				
           </div><!---- katagori --->
		   
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
