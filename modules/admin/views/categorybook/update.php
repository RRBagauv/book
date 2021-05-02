<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categorybook */

$this->title = 'Update Categorybook: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Categorybooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categorybook-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
