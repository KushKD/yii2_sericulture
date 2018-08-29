<?php
   /* @var $this \yii\web\View */
   /* @var $content string */
   
   use yii\helpers\Html;
   
   ?>
<script src="<?=Yii::$app->view->theme->baseUrl?>/js/bootstrap.min.js"></script>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
   
   <body>
 
    <p>go Away</p>
   
      <div class="container">
       
         <?= $content ?> 
      </div>
  
      <!--- footer section end --->
      </div>
      <?php $this->endBody() ?>
   </body>
</html>
<?php $this->endPage() ?>