<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'category_image:image',
            [
                'format' => 'html',
                'label' => 'img',
                'value'=> function($data){
                    $image = new \app\models\Image;
                    $img = $image->getImage($data->img);
                    return Html::img("$img",
                        ['width' => '100px']);

                }
            ],
            'description:ntext',
            'count',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
