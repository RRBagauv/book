<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Categorybook */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Categorybooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="categorybook-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Category', ['find-category', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'book_id',
            ['format' => 'html',
                'label'=>'book_name',
                'value'=>function($data){
                    $data->findOne($data->id);
                    return $data->book->name;
                }],
            'category_id',

            ['format' => 'html',
                'label'=>'category_name',
                'value'=>function($data){
                    $data->findOne($data->id);
                    return $data->category->name;
                }],
        ],
    ]) ?>

</div>
