<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserbookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $search*/
$this->title = 'История читателей';
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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            ['format'=>'html',
                'label'=>'книга',
                'value'=>function($data){
                    $data->findOne($data->id);
                    return $data->book->name;
                }],
            ['format' => 'html',
                'label'=>'Пользователь',
                'value'=>function($data){
                    $data->findOne($data->id);
                    return $data->user->name . ' '. $data->user->surname;
                }],
            ['format'=>'html',
                'label'=>'Состояние',
                'value'=>function($data){
                    if($data->get == 1){
                        return 'На прочтении';
                    }else if($data->get == 0){
                        return 'Запрос на прочтение';
                    }else{
                        return 'Прочитал';
                    }
                }],
            ['class' => 'yii\grid\ActionColumn', 'template'=>'{view}'],
        ],
    ]); ?>



</div>
