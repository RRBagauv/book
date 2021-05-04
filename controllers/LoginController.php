<?php


namespace app\controllers;


use app\models\Image;
use app\models\LoginForm;
use app\models\SingUp;
use app\models\User;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class LoginController extends Controller
{


    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSingup(){

        $model = new User();
        $image = new Image();

        if ($model->load(Yii::$app->request->post()) && $image->CreateFile($model, $model->img) &&  $model->save()) {
            return $this->redirect(['/login/login']);
        }


        /*$model = new SingUp();
        if(Yii::$app->request->post()){

            $model->load(Yii::$app->request->post());
            echo '<pre>';
            var_dump($model);
            echo '</pre>';
            die;
            $model->singup();
            return $this->redirect(['login/login']);

        }*/

        return $this->render('singup', compact('model'));
    }

}