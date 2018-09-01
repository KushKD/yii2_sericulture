<?php

namespace app\modules\masters\controllers;
use yii\web\Controller;
use app\models\District;
use app\models\Tehsil;
use app\models\UserProfile;
use Yii;
/**
 * Default controller for the `frontend` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        $userProfile=new UserProfile;
        $postArray=Yii::$app->request->post();
        if(isset($postArray['UserProfile'],$postArray['UserBankDetail'])){
            $userProfile->attributes=Yii::$app->request->post('UserProfile');
            // if($userProfile->save())
            
            // echo "<pre>";print_r($userProfile);die;
            // echo "<pre>";print_r(Yii::$app->request->post('UserProfile'));die;
        }
       
        $distt=District::find()->where(["is_active"=>"Y"])->all(); 
        return $this->render('index',["distt"=>$distt]);
    }
}
