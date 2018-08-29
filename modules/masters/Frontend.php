<?php

namespace app\modules\masters;

use Yii;

/**
 * frontend module definition class
 */
class Frontend extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\masters\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        Yii::$app->view->theme->pathMap = ['@app/views' => '@webroot/themes/frontend/views'];
        Yii::$app->view->theme->baseUrl = '@web/themes/frontend';
        Yii::$app->view->theme->basePath = '@webroot/themes/frontend';


      
    }
}
