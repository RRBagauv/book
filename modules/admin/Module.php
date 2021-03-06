<?php

namespace app\modules\admin;

use Yii;
use yii\filters\AccessControl;


/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{


    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function($rule, $action){

                    Yii::$app->response->redirect(['/']);

                 }
            ,
            'rules' =>[[

                'allow' => true,
                'matchCallback' =>function($rule, $action){

                    return Yii::$app->user->identity->role  == 'admin';

                }
            ]]
            ]
        ]; // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public $layout = '/admin';
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
