<?php

namespace app\modules\admin\controllers;

use app\models\BookSearch;
use app\models\UserSearch;
use Yii;
use app\models\Userbook;
use app\models\UserbookSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserbookController implements the CRUD actions for Userbook model.
 */
class UserbookController extends Controller
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
     * Lists all Userbook models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserbookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    /**
     * Displays a single Userbook model.
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
     * Creates a new Userbook model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Userbook();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Userbook model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Userbook model.
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
     * Finds the Userbook model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Userbook the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Userbook::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



    public function actionTakeBook($id)
    {


        $get = $this->findModel($id);
        $get->get = 1;
        $get->save();
        return $this->redirect(['index']);

    }

    public function actionQuery()
    {
        $searchModel = new Userbook;
        $dataProvider = $searchModel->searchQuery(['get' => 0]);
        return $this->render('query', compact('searchModel', 'dataProvider'));

    }

    public function actionHistory($id){

        $searchModel = new Userbook();
        $dataProvider = $searchModel->searchQuery(['book_id' => $id]);
        return $this->render('history', compact('searchModel', 'dataProvider'));

    }

    /*public function actionFindCategory($id)
    {

        $book = $this->findModel($id);

        var_dump( $book->categorybooks);
        die;

    }*/
}
