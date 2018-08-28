<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Users::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();
       // echo "<pre>"; print_r($model); die;
      //  $model->load(Yii::$app->request->post());
// $model->created_date_time=date("Y-m-d h:i:s");
       //  echo "<pre>";print_r($model); print_r($_POST); die("This is Test");

        if ($model->load(Yii::$app->request->post()) ) {

            //Populate the foloowing fields to the  forms
              // password_salt  create


              $model->created_date_time=date("Y-m-d h:i:s");  //Will be set for the First Time
              $model->updated_date_time=date("");  //Will be set after Update
              $model->is_active="Y"; // Will be set Y by default
              $model->authKey =  (string)rand ( 0000, 9999 );

              $ip = $this->getIp();
              $model->remote_address = $ip;

              $browserAgent = $this->getBrowser();
              $model->user_agent = $_SERVER['HTTP_USER_AGENT'] ;//$browserAgent["name"];

              $model->password_salt = $this->get_generated_password_salt($model->password, $model->email_id );
              $model->password = hash_hmac("sha1", $model->password, $model->password_salt);

           


           // echo "<pre>";print_r($model); print_r($_POST); die("This is Test");


            if($model->save()){
                return $this->redirect(['view', 'id' => $model->user_id]);
            }else{
                echo "<pre>";print_r($model->geterrors());die;
                return $this->render('create', ['model' => $model,]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionSave(){
       //$model = new Users();
       echo ("Are We Here"); die;
        echo "<pre>"; print_r($model); die("Insice SAve");
      //  echo <pre> .   $model->load(Yii::$app->request->post());
// $model->created_date_time=date("Y-m-d h:i:s");
//         echo "<pre>";print_r($model); print_r($_POST); die;


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


    //Browser Agent
    function getBrowser() {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";
        // First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
          $platform = 'linux';
        } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
          $platform = 'mac';
        } elseif (preg_match('/windows|win32/i', $u_agent)) {
          $platform = 'windows';
        }
        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) {
          $bname = 'Internet Explorer';
          $ub = "MSIE";
        } elseif(preg_match('/Firefox/i',$u_agent)) {
          $bname = 'Mozilla Firefox';
          $ub = "Firefox";
        } elseif(preg_match('/Chrome/i',$u_agent)) {
          $bname = 'Google Chrome';
          $ub = "Chrome";
        } elseif(preg_match('/Safari/i',$u_agent)) {
          $bname = 'Apple Safari';
          $ub = "Safari";
        } elseif(preg_match('/Opera/i',$u_agent)) {
          $bname = 'Opera';
          $ub = "Opera";
        } elseif(preg_match('/Netscape/i',$u_agent)) {
          $bname = 'Netscape';
          $ub = "Netscape";
        }
        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
          // we have no matching number just continue
        }
        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
          //we will have two since we are not using 'other' argument yet
          //see if version is before or after the name
          if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
          } else {
            $version= $matches['version'][1];
          }
        } else {
          $version= $matches['version'][0];
        }
        // check if we have a number
        if ($version==null || $version=="") {$version="?";}
      return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
        );
      }



     public function get_generated_password_salt($password, $email){

        //Defining a Constant
        define('PASSWORD_SALT_KEY', '1-1!=1\/\/@nT$@T1-1');

        $password_salt_key_generated =hash_hmac("sha1", time().$email, PASSWORD_SALT_KEY);

         //hash_hmac("sha1", $password, $password_salt_key_generated);

        return  $password_salt_key_generated;

      //  echo "<pre>"; print_r($password); print_r($email); print_r($password_salt); die;


     } 
}
