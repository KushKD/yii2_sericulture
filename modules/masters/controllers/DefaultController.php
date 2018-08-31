<?php

namespace app\modules\masters\controllers;
use yii\web\Controller;
use app\models\District;
/**
 * Default controller for the `frontend` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $distt=District::find()->where(["is_active"=>"Y"])->all(); 
        return $this->render('index',["distt"=>$distt]);
    }
    public function actionTest()
    {
        return $this->render('test');
    }
}
