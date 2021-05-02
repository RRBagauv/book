<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Userbook */

$this->title = 'Create Userbook';
$this->params['breadcrumbs'][] = ['label' => 'Userbooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userbook-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
