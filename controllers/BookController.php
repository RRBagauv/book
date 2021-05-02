<?php


namespace app\controllers;


use app\models\Book;
use app\models\Category;
use app\models\Categorybook;
use app\models\User;
use app\models\Userbook;
use Yii;
use yii\web\Controller;

class BookController extends Controller
{

    public function actionBookPage(){


        $allBooks = Book::find()->all();
        return $this->render('bookpage', compact('allBooks'));


    }

    public function actionCategoryBook($id){

        $category = Category::findOne($id);
        $categoryBooks = Categorybook::findAll(['category_id' => $id]);
        $allBooks = $categoryBooks->books;
        return $this->render('bookpage', compact('allBooks', '$category'));

    }

    public function actionDescription($id){

        $book = Book::findOne($id);
        $model = new Book();
        $userBook = new Userbook();

        $get = Userbook::findOne(['book_id'=>$id, 'user_id'=>$model->getUserId(Yii::$app->user->getIdentity()->login)]);

        return $this->render('description', compact('book', 'model', 'userBook', 'get'));

    }

    public function actionGetter(){

        $model = new Userbook();
        $post = Yii::$app->request->post('Userbook');
        $sender = $model->getUserBook($post);
        if(!isset($sender) && $model->load(Yii::$app->request->post()) && $model->save()){


            return $this->redirect(['description?', 'id' => $post['book_id']]);


        }else if($sender){

            return $this->redirect(['description', 'id' => $post['book_id']]);


        }
        return $this->redirect(['description', 'id' => $post['book_id']]);

    }

}