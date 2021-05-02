<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserbookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $search*/
$this->title = 'Userbooks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userbook-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Userbook', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['format'=> 'html',
               'label'=> 'Получил',
                'value'=>function($data){
                    if($data->get == 0){

                        $button = Html::a('Выдать книгу', ['take-book', 'id'=>$data->id], ['method'=>'post',
                            'class' => ['btn btn-success','center'],
                            ]);

                        return "Пользователь отправил запрос на получение книги <br> $button";



                    }else if($data->get == 1){

                        return 'Пользователю одобрили запрос на получение книги';

                    }else{

                        return 'Пользователь вернул книгу';

                    }
                }]
            ,
            ['format' => 'html',
                'label'=>'Название книги',
                'value'=>function($data){

                    return $data->book->name;
                }],
            ['format' => 'html',
                'label'=>'Категория',
                'value'=>function($data){
                    $data->findOne($data->id);
                    return $data->user->name . ' '. $data->user->surname;
                }],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



</div>
