<?php


namespace app\controllers;


use app\models\Image;
use app\models\User;
use app\models\Userbook;
use Yii;
use yii\base\Model;
use yii\web\Controller;

class UserController extends Controller
{

    
    public function actionAccount($id){

        if(Yii::$app->user->identity && Yii::$app->user->getIdentity()->id == $id){

            $model = new User();
            $user = User::findOne($id);
            $modelUsers = new Userbook();
            $userBook = $modelUsers->getBookUsers($id, 1);
            $title = 'Активные книги';


        }else{
            $this->redirect(['/book/book-page']);
        }

        return $this->render('account', compact('model', 'user', 'userBook', 'title'));

    }

    public function actionRead($id){

        if(Yii::$app->user->identity && Yii::$app->user->getIdentity()->id == $id){

            $model = new User();
            $user = User::findOne($id);
            $modelUsers = new Userbook();
            $userBook = $modelUsers->getBookUsers($id, 2);
            $title = 'Прочитанные книги';

        }else{
            $this->redirect(['/book/book-page']);
        }
        return $this->render('account', compact('model', 'user', 'userBook', 'title'));


    }


    public function actionWaiting($id){
        if(Yii::$app->user->identity && Yii::$app->user->getIdentity()->id == $id){

            $model = new User();
            $user = User::findOne($id);
            $modelUsers = new Userbook();
            $userBook = $modelUsers->getBookUsers($id, 0);
            $title = 'Книги в обработке';

        }else{
            $this->redirect(['/book/book-page']);
        }
        return $this->render('account', compact('model', 'user', 'userBook', 'title'));


    }

    public function actionEdit($id){

        if(Yii::$app->user->identity && Yii::$app->user->getIdentity()->id == $id){

            $model = User::findOne($id);
            $image = new Image();

            if ($model->load(Yii::$app->request->post()) && $image->CreateFile($model, $model->img) && $model->save()) {

                return $this->redirect(['account', 'id' => $model->id]);
            }

        }else{
            $this->redirect(['/book/book-page']);
        }
        return $this->render('edit', [
            'model' => $model,
        ]);

    }

}