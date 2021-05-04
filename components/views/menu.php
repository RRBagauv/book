<?php use yii\bootstrap4\Html;

?>


    <nav class="navbar-dark bg-dark navbar-expand-lg">
        <div class="container">
        <a class="navbar-brand" href="#">My Book</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                <li class="nav-item active">
                    <a class="nav-link" href="/web/book/book-page">Все книги <span class="sr-only">(current)</span></a>
                </li>
                <?php if(!empty($category)):?>
                    <?php foreach ($category as $k=>$v):?>
                        <li class="nav-item active">
                            <a class="nav-link" href="/web/book/category-book?id=<?=$v->category->id?>"><?=$v->category->name?> <span class="sr-only">(current)</span></a>
                        </li>
                    <?php endforeach?>
                <?php endif;?>
                <li class="nav-item">
                    <?=
                    Yii::$app->user->isGuest ? (
                    Html::a('Login','/web/login/login',['class'=>'nav-link'])
                    ) : (
                        '<li>'
                        . Html::beginForm(['/login/logout'], 'post')
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->login . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>' )?>
                </li>
            </ul>
        </div>
        </div>
    </nav>

