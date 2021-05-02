<?php

/* @var $this yii\web\View */

use yii\bootstrap4\Html;
if(isset($category)){
    $this->title = $category->name;
    $this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
}else{
    $this->title = 'Книги';
}

$this->params['breadcrumbs'][] = $this->title;

?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="container">
    <?php if(isset($allBooks)):?>
        <?php foreach ($allBooks as $k):?>
            <section class="text-center mb-4">
                <div class="row wow fadeIn">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="view overlay">
                                <img class="card-img-top" src="<?=\Yii::getAlias('@web') .'/userfile/'.$k->img?>" alt="image">
                                <a href="description<?='?id='.$k->id?>">
                                    <div class="mask rgba-while-slight"></div>
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <h5>
                                    <strong>
                                        <a href="description<?='?id='.$k->id?>" class="text-dark"><?=$k->name?></a>
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