<?php

namespace app\modules\masters\controllers;
use yii\web\Controller;
use app\models\District;
use app\models\Tehsil;
use app\models\UserProfile;
use app\models\UserBankDetail;
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
        $session = Yii::$app->session;
        if(!isset($session['username']) || empty($session['username'])){
            return Yii::$app->response->redirect(['site/index']);
        }else{

        $distt=District::find()->where(["is_active"=>"Y"])->all(); 
        return $this->render('index',["distt"=>$distt]);
        }
    }



    public function actionSave(){
        $session = Yii::$app->session;

        if(!isset($session['username']) || empty($session['username'])){
            return Yii::$app->response->redirect(['site/index']);
        }else{
           // echo print_r(Yii::$app->session); die;

            // foreach ($session as $session_name => $session_value){
            //     echo $session_name.' - '.json_encode($session_value);
            //     echo "<br>";
            //  }
            // echo "<pre>";print_r( $session['userid']);die;
           $userProfile=new UserProfile;
           $userProfile->user_id = $session['userid'];

            $bankDetails = new UserBankDetail;
            $bankDetails->user_id = $session['userid'];

            $postArray=Yii::$app->request->post();

           // echo "<pre>";print_r($postArray); die;
           //  echo "<pre>";print_r($postArray['UserBankDetail']); die;

            if(isset($postArray['UserProfile'],$postArray['UserBankDetail'],$postArray['app_submission'])){

                //Save User Profile
                $userProfile->attributes=Yii::$app->request->post('UserProfile');

                //Save Bank Details
                $bankDetails->attributes= Yii::$app->request->post('UserBankDetail');

               
                //Save application Data in Json
                $applicationData = Yii::$app->request->post('app_submission');
                //echo "<pre>";print_r($applicationData); 
                //Convert the Application Data to JSON
                $application_data_json = json_encode($applicationData);  
               

              //  echo "<pre>";print_r(Yii::$app->request->post());
             //  echo "<pre>";print_r($userProfile);  
               // echo "<br>"; 
                //echo "<pre>";print_r($userDetails);
                //echo "<pre>";print_r(Yii::$app->request->post('app_submission')); die;
                // if($userProfile->save())
                
                // echo "<pre>";print_r($userProfile);die;
                // echo "<pre>";print_r(Yii::$app->request->post('UserProfile'));die;
            }
        }
    }
}
