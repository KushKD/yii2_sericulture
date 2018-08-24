<?php
   /* @var $this \yii\web\View */
   /* @var $content string */
   
   use app\widgets\Alert;
   use yii\helpers\Html;
   use yii\bootstrap\Nav;
   use yii\bootstrap\NavBar;
   use yii\widgets\Breadcrumbs;
   use app\assets\AppAsset;
   use app\assets\DefaultAppAsset;
   
   DefaultAppAsset::register($this);
   ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
   <head>
      <meta charset="<?= Yii::$app->charset ?>">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php $this->registerCsrfMetaTags() ?>
      <title><?= Html::encode($this->title) ?></title>
      <?php $this->head() ?>
   </head>
   <body>
      <?php $this->beginBody() ?>
      <div class="container">
         <div class="page">
            <!--- header section begin --->
            <header>
               <!--- topbar section begin --->
              <!--  <div class="top-bar">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                     <div class="top-social">
                        <ul>
                           <li><a href="https://www.facebook.com/sericulturecouncil" target="_blank"><i class="fa fa-facebook"></i></a></li>
                           <li><a href="http://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
                           <li><a href="https://plus.google.com/u/0/+SericultureReseachDevelopmentCouncil" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                           <li><a href="webmail" target="_blank"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-12 col-xs-12">
                     <div class="top-touch">
                        <h4>Get in Touch +91-11-28759622 | info@sericulturecouncil.com</h4>
                     </div>
                  </div>
                  <div class="col-md-offset-1 col-md-2 col-sm-12 col-xs-12">
                     <div class="top-opt">
                        <div id="google_translate_element"></div>
                        <script type="text/javascript">
                           function googleTranslateElementInit() {
                           new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
                           }
                        </script>
                        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                     </div>
                  </div>
               </div> -->
               <!-- Department Icons and Govt. Of India Icons -->
               <!--- top-logo section begin --->
               <div class="top-logo-section">
                  <div class="col-md-2 col-sm-12 col-xs-12">
                     <div class="logo">
                        <figure>
                           <img src="http://sericulturecouncil.com/matrix_panel/upload/20662931581469611180logo-main.png" class="img-responsive center-block" />
                        </figure>
                     </div>
                  </div>
                  <div class="col-md-8 col-sm-12 col-xs-12 zero">
                     <div class="logo-slogan">
                        <h1><span>Sericulture Research & Development Council</span> </h1>
                     </div>
                  </div>
                  <div class="col-md-2 col-sm-12 col-xs-12 zero">
                     <div class="logo-right">
                        <figure>
                           <img src="http://sericulturecouncil.com/images/logo-main-1.png" class="img-responsive center-block" />
                        </figure>
                     </div>
                  </div>
               </div>
               <!--- top-logo section begin --->
               <!-- Menu Bar -->
               <!--- top-menu section begin --->
               <div class="top-menu-section">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero">
                     <div id='cssmenu'>
                        <ul>
                           <li class='active'><a href='http://sericulturecouncil.com'><span>Home</span></a></li>
                           <li class="has-sub">
                              <a href='javascript:void(0)'><span>About Us</span></a>
                              <ul>
                                 <li><a href='http://sericulturecouncil.com/vision-mission'><span>Vision & Mission</span></a>
                                 </li>
                                 <li><a href='http://sericulturecouncil.com/mandate'><span>Mandate</span></a>
                                 </li>
                                 <li><a href='http://sericulturecouncil.com/organization-chart'><span>Organization Chart</span></a>
                                 </li>
                              </ul>
                           </li>
                           <li class="has-sub">
                              <a href='javascript:void(0)'><span>Silk Sericulture</span></a>
                              <ul>
                                 <li><a href='http://sericulturecouncil.com/silk'><span>Silk</span></a>
                                 </li>
                                 <li><a href='http://sericulturecouncil.com/sericulture'><span>Sericulture</span></a>
                                 </li>
                                 <li><a href='http://sericulturecouncil.com/silk-of-india'><span>Silk of India</span></a>
                                 </li>
                              </ul>
                           </li>
                           <li class="has-sub">
                              <a href='javascript:void(0)'><span>Operational area</span></a>
                              <ul>
                                 <li>
                                    <a href='http://sericulturecouncil.com/north-east-region'><span>North East Region</span></a>
                                    <ul>
                                       <li><a href='http://sericulturecouncil.com/assam'><span>Assam</span></a>
                                       <li><a href='http://sericulturecouncil.com/arunachal-pradesh'><span>Arunachal Pradesh</span></a>
                                       <li><a href='http://sericulturecouncil.com/manipur'><span>Manipur</span></a>
                                       <li><a href='http://sericulturecouncil.com/meghalaya'><span>Meghalaya</span></a>
                                       <li><a href='http://sericulturecouncil.com/mizoram'><span>Mizoram</span></a>
                                       <li><a href='http://sericulturecouncil.com/nagaland'><span>Nagaland</span></a>
                                       <li><a href='http://sericulturecouncil.com/sikkim'><span>Sikkim</span></a>
                                       <li><a href='http://sericulturecouncil.com/tripura'><span>Tripura</span></a>
                                    </ul>
                                 </li>
                                 <li>
                                    <a href='http://sericulturecouncil.com/east-region'><span>East Region</span></a>
                                    <ul>
                                       <li><a href='http://sericulturecouncil.com/odisha'><span>Odisha</span></a>
                                       <li><a href='http://sericulturecouncil.com/jharkhand'><span>Jharkhand</span></a>
                                       <li><a href='http://sericulturecouncil.com/bihar'><span>Bihar</span></a>
                                       <li><a href='http://sericulturecouncil.com/west-bengal'><span>West Bengal</span></a>
                                    </ul>
                                 </li>
                                 <li>
                                    <a href='http://sericulturecouncil.com/north-west-region'><span>North West Region</span></a>
                                    <ul>
                                       <li><a href='http://sericulturecouncil.com/uttarakhand'><span>Uttarakhand</span></a>
                                       <li><a href='http://sericulturecouncil.com/himachal-pradesh'><span>Himachal Pradesh</span></a>
                                       <li><a href='http://sericulturecouncil.com/jammu-kashmir'><span>Jammu Kashmir</span></a>
                                       <li><a href='http://sericulturecouncil.com/haryana'><span>Haryana</span></a>
                                       <li><a href='http://sericulturecouncil.com/punjab'><span>Punjab</span></a>
                                       <li><a href='http://sericulturecouncil.com/delhi'><span>Delhi</span></a>
                                    </ul>
                                 </li>
                                 <li>
                                    <a href='http://sericulturecouncil.com/central-region'><span>Central Region</span></a>
                                    <ul>
                                       <li><a href='http://sericulturecouncil.com/uttar-pradesh'><span>Uttar Pradesh</span></a>
                                       <li><a href='http://sericulturecouncil.com/madhya-pradesh'><span>Madhya Pradesh</span></a>
                                       <li><a href='http://sericulturecouncil.com/chhattishgarh'><span>Chhattishgarh</span></a>
                                    </ul>
                                 </li>
                                 <li>
                                    <a href='http://sericulturecouncil.com/west-region'><span>West Region</span></a>
                                    <ul>
                                       <li><a href='http://sericulturecouncil.com/gujarat'><span>Gujarat</span></a>
                                       <li><a href='http://sericulturecouncil.com/rajasthan'><span>Rajasthan</span></a>
                                    </ul>
                                 </li>
                                 <li>
                                    <a href='http://sericulturecouncil.com/south-region'><span>South Region</span></a>
                                    <ul>
                                       <li><a href='http://sericulturecouncil.com/maharashtra'><span>Maharashtra</span></a>
                                       <li><a href='http://sericulturecouncil.com/goa'><span>Goa</span></a>
                                       <li><a href='http://sericulturecouncil.com/karnataka'><span>Karnataka</span></a>
                                       <li><a href='http://sericulturecouncil.com/kerala'><span>Kerala</span></a>
                                       <li><a href='http://sericulturecouncil.com/tamilnadu'><span>Tamilnadu</span></a>
                                       <li><a href='http://sericulturecouncil.com/telangana'><span>Telangana</span></a>
                                       <li><a href='http://sericulturecouncil.com/seemandhra'><span>Seemandhra</span></a>
                                    </ul>
                                 </li>
                              </ul>
                           </li>
                           <li class="has-sub">
                              <a href='javascript:void(0)'><span>EBP Schemes</span></a>
                              <ul>
                                 <li><a href='http://sericulturecouncil.com/aarthik-swavalamban-project-for-farmers'><span>Aarthik Swavalamban Project for Farmers</span></a>
                                 </li>
                                 <li><a href='http://sericulturecouncil.com/young-age-rearing-for-resham-mitra'><span>Young Age Rearing for Resham Mitra</span></a>
                                 </li>
                                 <li><a href='http://sericulturecouncil.com/service-of-disinfection-for-resham-sathi'><span>Service of Disinfection for Resham Sathi</span></a>
                                 </li>
                                 <li><a href='http://sericulturecouncil.com/project-ppp-model'><span>Project PPP Model</span></a>
                                 </li>
                                 <li><a href='http://sericulturecouncil.com/partners-role'><span>Partners Role</span></a>
                                 </li>
                                 <li><a href='http://sericulturecouncil.com/eligibility-criteria'><span>Eligibility Criteria</span></a>
                                 </li>
                                 <li><a href='http://sericulturecouncil.com//matrix_panel/upload/media/Partners-Application-Form_1469855799_0.pdf'><span>Application Form</span></a>
                                 </li>
                              </ul>
                           </li>
                           <li class="has-sub">
                              <a href='javascript:void(0)'><span>Publications</span></a>
                              <ul>
                                 <li><a href='http://sericulturecouncil.com//matrix_panel/upload/media/Ad-for-Partners_1469853804_0.pdf'><span>Ad for partners</span></a>
                                 </li>
                                 <li><a href='http://sericulturecouncil.com//matrix_panel/upload/media/English-flyer_1469855045_0.pdf'><span>English Flyer</span></a>
                                 </li>
                                 <li><a href='http://sericulturecouncil.com//matrix_panel/upload/media/hindi-flyer_1469855398_0.pdf'><span>Hindi Flyer</span></a>
                                 </li>
                                 <li><a href='http://sericulturecouncil.com//matrix_panel/upload/media/new.pdf'><span>Farmer Book</span></a>
                                 </li>
                              </ul>
                           </li>
                           <li><a href='<?=Yii::$app->urlManager->createUrl("site/contact")?>'><span>Contact Us</span></a></li>
                            <li><a href='<?=Yii::$app->urlManager->createUrl("users")?>'><span>User Management</span></a></li>


                           <?php 
                              $session = $_SESSION['user_id'];
                               echo "<pre>"; print_r($_SESSION);
                           if(empty($session)){

                                  echo '<li class="pull-right">
                                          <a href="'.Yii::$app->urlManager->createUrl("site/login").'"><span>Login</span></a>
                                       </li>';
                           }else{
                                echo '<li class="pull-right">
                                          <a href="'.Yii::$app->urlManager->createUrl("site/logout").'">
                                             <span>Logout('.$_SESSION["username"].')</span>
                                          </a>
                                       </li>';

                           }

                            /*  if(Yii::$app->user->isGuest)
                                 echo '<li class="pull-right">
                                          <a href="'.Yii::$app->urlManager->createUrl("site/login").'"><span>Login</span></a>
                                       </li>';
                              else 
                                 echo '<li class="pull-right">
                                          <a href="'.Yii::$app->urlManager->createUrl("site/logout").'">
                                             <span>Logout('.Yii::$app->user->identity->username.')</span>
                                          </a>
                                       </li>';*/
                           ?>

                        </ul>
                     </div>
                  </div>
                 <!--  <div class="col-md-1 col-sm-12 col-xs-12 blue zero">
                     <div class="login-tab">
                        <a href="javascript:void(0)" class="login">
                           <h3>Login</h3>
                        </a>
                     </div>
                  </div> -->
               </div>
               <div class="overlaylog">
               </div>
               <div class="popuplog" id="pro-log" style="margin-top:-120px;">
                  <div class="section-contact">
                     <div class="form-sec">
                        <form id="fomlog">
                           <div class="col-md-12">
                              <div class="col-md-3"><label>User Name</label></div>
                              <div class="col-md-9"><input type="text" name="username" placeholder="Your User Name" required="required"/></div>
                           </div>
                           <div class="col-md-12">
                              <div class="col-md-3"><label>Password</label></div>
                              <div class="col-md-9"> <input type="password" name="password" placeholder="Your Password" required="required"/></div>
                           </div>
                           <div class="col-md-12">
                              <div class="col-md-3"></div>
                              <div class="col-md-9"><input type="submit" class="btn btn-green-lg" name="login" value="SUBMIT"></div>
                           </div>
                           <div class="col-md-12">
                              <div class="col-md-3"></div>
                              <div class="col-md-6"><a href="javascript:void(0)" class="forgot"><strong>Forget Password</strong></a></div>
                              <div class="col-md-3"><input type="button" class="btn btn-danger" id="closelog" style="float:right" value="Close"></div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="overlaygot">
               </div>
               <div class="popupgot" id="pro-got">
                  <div class="section-contact">
                     <div class="form-sec">
                        <form id="fomgot">
                           <div class="col-md-12">
                              <div class="col-md-3"><label>Email Id</label></div>
                              <div class="col-md-9"><input type="text" name="email" placeholder="Your User Email Id" required="required"/></div>
                           </div>
                           <div class="col-md-12">
                              <div class="col-md-3"></div>
                              <div class="col-md-9"><input type="submit" class="btn btn-green-lg" name="login" value="SUBMIT"></div>
                           </div>
                        </form>
                     </div>
                     <input type="button" class="btn btn-danger" id="closegot" style="float:right" value="Close">
                  </div>
               </div>
               <!--- top-menu section end --->
               <!-- Menu Bar -->     
            </header>
         </div>
      </div>
      <div class="container">
         <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
         <?= Alert::widget() ?>
         <?= $content ?> 
      </div>
      <footer>
         <div class="section-footer  container">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <span>
               <img src="http://hitwebcounter.com/counter/counter.php?page=6207844&style=0006&nbdigits=5&type=ip&initCount=500000" title="good hits" Alt="good hits"   border="0" style="margin:auto;" class="center-block">
               </span>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="copy">
                  <strong> 
                  &COPY; Sericulture Research & Development Council. All Rights Reserved. Any unauthorized duplication of site is strictly prohibited liable to prosecution. 
                  </strong>
               </div>
            </div>
         </div>
      </footer>
      <!--- footer section end --->
      </div>
      <?php $this->endBody() ?>
   </body>
</html>
<?php $this->endPage() ?>