<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
   // public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['Contact'],
                'rules' => [
                    [
                        'actions' => ['Contact'],
                        'allow' => true,
                        'roles' => ['*'],
                    ],
                ],
            ],
           /* 'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['post'],
                ],
            ],*/
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('homePage');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
         if (!Yii::$app->session) {
             return $this->goHome();
         }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
          //  return $this->goHome();
          return Yii::$app->response->redirect(['frontend/default/index']);
        }else{
           
            $model->password = '';
            return $this->render('login', ['model' => $model,]);

        }
      //  echo print_r(Yii::$app->session);
       // echo("Go Away"); die;
        //  Yii::app()->model->setFlash('You have been successfully logged out');
       // Yii::$app->session->setFlash('myMessage', 'Article has been Created Successfully');
         // $model->password = '';
         // return $this->render('login', ['model' => $model,]);

       
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
    // echo "<pre>"; print_r(Yii::$app->session); die("Asdas");
       // Yii::$app->user->logout();
        // die("yahna");
        $model = new LoginForm(); 
        $model->logout(); 


        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionChamba($id){
         return $this->render('chamba',array('id'=> $id));
    }

    public function actionAjax()
{
    if(isset($_POST['test'])){
        $test = "Ajax Worked!";
    }else{
        $test = "Ajax failed";
    }

    return $test;
   // return  \yii\helpers\Json::encode($test);
}


/*public function actionAjax()
{
    if(isset(Yii::$app->request->post('test'))){
        $test = "Ajax Worked!";
        // do your query stuff here
    }else{
        $test = "Ajax failed";
        // do your query stuff here
    }

    // return Json    
    return \yii\helpers\Json::encode($test);
}*/

}
