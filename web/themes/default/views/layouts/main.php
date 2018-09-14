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
       <!--HEADER GOES HERE START-->
    <header>

        <div class="row" style="background-color: #e67e22">
            <!-- FaceBook Twitter Goes Here--> &nbsp;
        </div>

        <section class="section-heading-logo">
            <div class="row">
                <img src="<?=Yii::$app->view->theme->baseUrl?>/resources/img/logo.png" class="logo col span1-of-4" alt="Himachal Pradesh Government">
                <div style="margin-top: 30px; " class="col span-2-of-4">
                    <h3 style="color: #e67e22;  text-align: justify; display: inline;   ">DIRECTORATE OF SERICULTURE</h3><br>
                    <h4 style="color: #2a75bb;  display: inline-block;">GOVERNMENT OF HIMACHAL PRADESH </h4>
                </div>

                <div style="float: right; margin: 0; padding:0; " class="col span-1-of-4">

                    <div class="col span-2-of-4">
                        <div class="col span-4-of-4">

                            <img src="<?=Yii::$app->view->theme->baseUrl?>/resources/img/CM.jpg" class="minister col span1-of-4" alt="Shri. Jai Ram Thakur">

                        </div>
                        <div class="col span-4-of-4">
                            <span class="profile-discription">Hon'ble Chief Minister </span>
                        </div>
                    </div>

                    <div class="col span-2-of-4">
                        <div class="col span-4-of-4">

                            <img src="<?=Yii::$app->view->theme->baseUrl?>/resources/img/minister.jpg" class="minister col span1-of-4" alt="Shri. Jai Ram Thakur">

                        </div>
                        <div class="col span-4-of-4">
                            <span class="profile-discription">Hon'ble Minister</span>
                        </div>
                    </div>

                </div>
            </div>
            </div>
        </section>
        <!--Navigation Starts Here-->
        <nav>
            <div class="row" style="background-color: #2a75bb; ">
                <!-- <img src="resources/img/logo-white.png"  class="logo" alt="Himachal Pradesh Government"> -->
                <ul class="main-nav">
                    <li><a href="#"><i class="ion-home">&nbsp;</i>Home</a></li>
                    <li><a href="#"><i class="ion-arrow-dropup">&nbsp;</i>Information and Services</a></li>
                    <li><a href="#">Schemes and Projects</a></li>
                    <li><a href="#">Documents <span style="font-weight: bold;">&#8595;</span> </a>
                        <ul class="dropdown_more">
                            <li><a href="#">Link 1</a></li>
                            <li><a href="#">Link 2</a></li>
                            <li><a href="#">Link 3</a></li>
                            <li><a href="#">Link 4</a></li>

                        </ul>


                    </li>
                    <li><a href="#">About Us</a>
                        <ul class="dropdown_more">
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">What We Do</a></li>
                            <li><a href="#">History</a></li>
                            <li><a href='<?=Yii::$app->urlManager->createUrl("site/contact")?>'>Contact Us</a></li>
                            <li><a href='<?=Yii::$app->urlManager->createUrl("users")?>'>User Management</a></li>

                        </ul>
                    </li>
                     <?php 
                             // $session = $_SESSION['user_id'];
                           $session = Yii::$app->session;
                              // echo "<pre>"; print_r($session['username']);die;
                           if(!isset($session['username']) || empty($session['username'])){
                                  echo '<li>
                                          <a href="'.Yii::$app->urlManager->createUrl("site/login").'">Login</a>
                                       </li>';
                           }else{
                                echo '<li>
                                          <a href="'.Yii::$app->urlManager->createUrl("site/logout").'">
                                             <span>Logout &nbsp; ('.$session["username"].')</span>
                                          </a>
                                       </li>';

                           }

                           ?>
                   
                </ul>
            </div>
        </nav>
        <!--Navigation Ends Here -->

    </header>
    <!--Header GOES HERE Ends-->
       
         
      <div class="row">
        
          
         <?= $content ?> 
      </div>
     
      <!--- footer  --->
      
      <?php $this->endBody() ?>
   </body>
</html>
<?php $this->endPage() ?>