<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categorybook */

$this->title = 'Create Categorybook';
$this->params['breadcrumbs'][] = ['label' => 'Categorybooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorybook-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categories'=>$categories,
        'books' => $books
    ]) ?>

</div>
