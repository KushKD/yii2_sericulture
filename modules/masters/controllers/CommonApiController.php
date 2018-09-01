<?php

namespace app\modules\masters\controllers;
use app\components\CommonUtility;
use Yii;

class CommonApiController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    private function isPOSTRequest(){
        // echo "<pre>";print_r($_SERVER);die;
		if($_SERVER['REQUEST_METHOD']!='POST'){
			// http_response_code(405);
            // header('STATUS: Method Not allowed', true, 405);
            $response['STATUS'] = 405;
            $response['ERROR'] = "Method Not Allowed";
            $response['RESPONSE'] = "";
            echo json_encode($response);
            exit;
        }
        return true;
	}

    public function actionIndex()
    {
        die("aa gya kutta");
        return $this->render('index');
    }

    public function actionTehsil(){
		if($this->isPOSTRequest()){
            $commonUtility=new CommonUtility;
            $postParam= Yii::$app->request->post();
            $post=$commonUtility->sanatizeParams($postParam);
			extract($post);
			$teh=$commonUtility->getTeshilsFromDisttId($distt_id);
			if(!empty($teh)){
				echo json_encode(array("STATUS"=>200,"response"=>$teh));
				exit;
			}
			return false;
		}
    }
    
    
    public function actionVillage(){

        if($this->isPOSTRequest()){
            $commonUtility=new CommonUtility;
            $postParam= Yii::$app->request->post();
            $post=$commonUtility->sanatizeParams($postParam);
			extract($post);
			$vill=$commonUtility->getVillagesFromTehId($teh_id);
			if(!empty($vill)){
				echo json_encode(array("STATUS"=>200,"response"=>$vill));
				exit;
			}
			return false;
		}
    }


}
