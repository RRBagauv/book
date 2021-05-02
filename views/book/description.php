<?php

/* @var $this yii\web\View */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->params['breadcrumbs'][] = ['label' => 'Книги', 'url' => ['book-page']];
$this->params['breadcrumbs'][] = $book->name;
?>





<div class="row featurette">

    <div class="col-md-7">
        <h2 class="featurette-heading"><?=$book->name?>></h2>
        <p class="lead"><?=$book->description?></p>
        <?php if(isset($get) && $get->get == 0):?>

            <p><h2>Ваша заявка на рассмотрении...</h2></p>

        <?php elseif(isset($get) && $get->get==1):?>
            <div class="form-group">
                <?php $form = ActiveForm::begin(['action' => ['getter'],'options' => ['method' => 'post']]) ?>

                <?= $form->field($userBook, 'user_id', ['template' => '{input}'])->hiddenInput(['value' => Yii::$app->user->id])?>
                <?= $form->field($userBook, 'book_id', ['template' => '{input}'])->hiddenInput(['value' => $book->id])?>
                <?= $form->field($userBook, 'get', ['template' => '{input}'])->hiddenInput(['value' => 2])?>
                <div class="form-group">
                    <?= Html::submitButton('Сдать книгу', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end()?>

            </div>
        <?php elseif((!isset($get) && Yii::$app->user->identity) || $get->get == 2):?>
            <?php $form = ActiveForm::begin(['action' => ['getter'],'options' => ['method' => 'post']]) ?>

            <?= $form->field($userBook, 'user_id', ['template' => '{input}'])->hiddenInput(['value' => Yii::$app->user->id])?>
            <?= $form->field($userBook, 'book_id', ['template' => '{input}'])->hiddenInput(['value' => $book->id])?>
            <?= $form->field($userBook, 'get', ['template' => '{input}'])->hiddenInput(['value' => 0])?>
            <div class="form-group">
                <?= Html::submitButton('Подать заявку на получение', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end()?>
        <?php endif;?>
    </div>
    <div class="col-md-5">
        <img class="card-img-top" src="<?=\Yii::getAlias('@web') .'/userfile/'.$book->img?>">
    </div>

</div>