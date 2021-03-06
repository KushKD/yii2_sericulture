<?php

namespace app\modules\masters\controllers;
use yii\web\Controller;
use app\models\District;
use app\models\Tehsil;
use app\models\UserProfile;
use app\models\UserBankDetail;
use app\models\ApplicationSubmission;
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
            $userProfileData = UserProfile::find()->where(["is_active"=>"Y","user_id"=>$session['userid']])->one(); 
            $userBankDetails = UserBankDetail::find()->where(["user_id"=>$session['userid']])->one();
            $userApplicationData = ApplicationSubmission::find()->where(["user_id"=>$session['userid']])->one();
            return $this->render('index',["distt"=>$distt,"userProfileData"=>$userProfileData,"userBankDetails"=>$userBankDetails , "userApplicationData"=>$userApplicationData]);
        }
    }
    // function getIncompleteModelsofUser($uid){
    //     $userProfileData = UserProfile::find()->where(["is_active"=>"Y","user_id"=>$session['userid']])->one(); 
    //     $userBankDetails = UserBankDetail::find()->where(["user_id"=>$session['userid']])->one();
    //     $userApplicationData = ApplicationSubmission::find()->where(["user_id"=>$session['userid']])->one();
    //     return ["userProfileData"=>$userProfileData,"userBankDetails"=>$userBankDetails,$userApplicationData=>$userApplicationData];
    // }


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
           $application_submission = new ApplicationSubmission;
          
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
                //Convert the Application Data to JSON
                $application_data_json = json_encode($applicationData);  

                //ApplicationSubmission
                $application_submission = $this->populateApplicationSubmission($session['userid'],$application_data_json);
                $db = Yii::$app->db;
               $transaction = $db->beginTransaction();

               try{
                //echo "<pre>";
                if($userProfile->validate() && $bankDetails->validate() && $application_submission->validate()){
                    $userProfile->save();
                     $bankDetails->save();
                      $application_submission->save();

                      $transaction->commit();
                      Yii::$app->getSession()->setFlash('success', 'Data Saved Successfully.');
        
                      return   $this->redirect(['index']);


                }
                else{
                    $err="";
                    $userProfileError=$userProfile->geterrors();
                    if(!empty($userProfileError))
                    foreach($userProfileError as $errrs)
                        foreach($errrs as $err)
                            $err.="<li>$err</li>";
                            $bankDetails=$bankDetails->geterrors();
                     if(!empty($bankDetails))
                     foreach($bankDetails as $errrs)
                        foreach($errrs as $err)
                            $err.="<li>$err</li>";

                            $application_submission=$application_submission->geterrors();
                    if(!empty($application_submission))
                      foreach($application_submission as $errrs)
                        foreach($errrs as $err)
                            $err.="<li>$err</li>";
                     Yii::$app->getSession()->setFlash('danger', $err);
                    $this->redirect(['index']);
                    // exit;


                }
             

               }catch(Exception $e){
                $transaction->rollback();
                    throw new HttpException(520,'Records can not be saved.'. $e);
                 }

            }
        }
    }


            function populateApplicationSubmission($userID,$applicationDataJson){

                $application_submission = new ApplicationSubmission;

                  $application_submission->application_id = 1; 
                  $application_submission->user_id = $userID;
                  $application_submission->field_value = $applicationDataJson;
                  $application_submission->application_status = 'P';

                  $application_submission->application_created_date=date("Y-m-d h:i:s");  //Will be set for the First Time
                  $application_submission->application_updated_date_time=date("Y-m-d h:i:s");  
                 
                
    
                 
                  $application_submission->ip_address = $this->getIp();
                  $application_submission->user_agent = $_SERVER['HTTP_USER_AGENT'] ;

                  return $application_submission;

                
            }


            public function getIp(){
                //whether ip is from share internet
                    if (!empty($_SERVER['HTTP_CLIENT_IP']))   
                        {
                            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
                        }
                //whether ip is from proxy
                    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
                        {
                            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
                        }
                //whether ip is from remote address
                    else
                        {
                            $ip_address = $_SERVER['REMOTE_ADDR'];
                        }
                return $ip_address;
            }


            public function actionUpdate(){

               // echo "<pre>"; print_r("This is some Text"); die();
                $session = Yii::$app->session;
                if(isset($session['userid'])){


                   // $model = User::find($id);
                   // $model->name = 'YII';
                   // $model->email = 'yii2@framework.com';
                   // $model->save();  // equivalent to $model->update();
                 
                   //Get the Data From Server
                   $userProfileUpdate =   UserProfile::findOne(['user_id' => $session['userid']]);
                   $bankDetailsUpdate =   UserBankDetail::findOne(['user_id' => $session['userid']]);

                 
        
                 
        
                    $postArray=Yii::$app->request->post();
        
                   // echo "<pre>";print_r($postArray); die;
                    

                   
                    
                    
        
                    if(isset($postArray['UserProfile'],$postArray['UserBankDetail'],$postArray['app_submission'])){
        
                        //Update User Profile
                        $userProfileUpdate->attributes=Yii::$app->request->post('UserProfile');
        
                        //Update Bank Details
                        $bankDetailsUpdate->attributes=Yii::$app->request->post('UserBankDetail');

                        //Update Application Subbmission Data
                        $applicationDataUpdate = ApplicationSubmission::findOne(['user_id' => $session['userid']]);
                        $application_data_Update_object = Yii::$app->request->post('app_submission');
                        $application_data_Update_json =  json_encode($application_data_Update_object); 

                        $applicationDataUpdate->field_value = $application_data_Update_json;
                        echo "<pre>";print_r($applicationDataUpdate); 
        
                       
                      
        
                       
                     //   $application_submission = $this->populateApplicationSubmission($session['userid'],$application_data_json);
                    $db = Yii::$app->db;
                    $transaction = $db->beginTransaction();
        
                       try{
                        //echo "<pre>";
                        if($userProfileUpdate->validate() && $bankDetailsUpdate->validate() && $applicationDataUpdate->validate()){
                            $userProfileUpdate->save();
                             $bankDetailsUpdate->save();
                              $applicationDataUpdate->save();
        
                              $transaction->commit();
                              Yii::$app->getSession()->setFlash('success', 'Data Updated Successfully.');
                
                              return   $this->redirect(['index']);
        
        
                        }
                        else{
                            $err="";
                            $userProfileError=$userProfile->geterrors();
                            if(!empty($userProfileError))
                            foreach($userProfileError as $errrs)
                                foreach($errrs as $err)
                                    $err.="<li>$err</li>";
                                    $bankDetails=$bankDetails->geterrors();
                             if(!empty($bankDetails))
                             foreach($bankDetails as $errrs)
                                foreach($errrs as $err)
                                    $err.="<li>$err</li>";
        
                                    $application_submission=$application_submission->geterrors();
                            if(!empty($application_submission))
                              foreach($application_submission as $errrs)
                                foreach($errrs as $err)
                                    $err.="<li>$err</li>";
                             Yii::$app->getSession()->setFlash('danger', $err);
                            $this->redirect(['index']);
                            // exit;
        
        
                        }
                     
        
                       }catch(Exception $e){
                        $transaction->rollback();
                            throw new HttpException(520,'Records can not be saved.'. $e);
                         }
        
                    }
                }
            
            }
}
