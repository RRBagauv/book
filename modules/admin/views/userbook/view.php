<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Userbook */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Userbooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="userbook-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            ['label'=>'Логин пользователя',
            'value'=>function($data){
                return $data->user->login;
            }],
            ['label'=>'Наименование книги',
                'value' => function($data){
                    return $data->book->name;
                }
            ],
            'user_id',
            'book_id',

            'get',
        ],
    ]) ?>

</div>
