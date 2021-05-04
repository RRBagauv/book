<?php

/* @var $this yii\web\View */

use yii\bootstrap4\Html;

$this->title = $category->name;
$this->params['breadcrumbs'][] = ['label' => 'Книги', 'url' => ['book-page']];



$this->params['breadcrumbs'][] = $this->title;

?>

<h1><?= Html::encode($this->title) ?></h1>
<div class="container">
    <?php if(!empty($categoryBooks)):?>
        <?php foreach ($categoryBooks as $k=>$v):?>
            <section class="text-center mb-4">
                <div class="row wow fadeIn">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="view overlay">
                                <img class="card-img-top" src="<?=\Yii::getAlias('@web') .'/userfile/'.$v->book->img?>" alt="image">
                                <a href="description<?='?id='.$v->book->id?>">
                                    <div class="mask rgba-while-slight"></div>
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <h5>
                                    <strong>
                                        <a href="description<?='?id='.$v->book->id?>" class="text-dark"><?=$v->book->name?></a>
                                    </strong>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endforeach;?>
    <?php else:?>
        <h1>В данной категории книг пока нет....</h1>
    <?php endif;?>

</div>