<?php

/* @var $this yii\web\View */

?>


<div class="row profile">

    <div class="col-md-2 card">
           <div class="profile-sidebar">
               <div class="profile-user-pic">
                   <img src="<?=\Yii::getAlias('@web') .'/userfile/'.$user->img?>" class="img-responsive img-circle">
               </div>
               <div class="profile-user-title">
                   <div class="profile-user-name text-center">
                       <h3><?=$user->name .' '. $user->surname?></h3>
                   </div>
               </div>
               <div class="profile-use-menu">
                   <ul>
                       <li><a href ="account?id=<?=$user->id?>"><i class="glyphicon glyphicon-ok"> </i> Активные книги </a></li>
                       <li><a href ="waiting?id=<?=$user->id?>"><i class="glyphicon glyphicon-time"> </i> Книги в обработке </a></li>
                       <li><a href ="read?id=<?=$user->id?>"><i class="glyphicon glyphicon-education"> </i> Прочитанные книги </a></li>
                       <li><a href ="edit?id=<?=$user->id?>"><i class="glyphicon glyphicon-pencil"> </i> Редактировать профиль </a></li>

                   </ul>
               </div>
           </div>

    </div>
    <div class="col-md-9">

        <div class="container card">
            <h2 class="title"><?=$title?></h2>
            <?php if(!empty($userBook)):?>
                <?php foreach ($userBook as $k=>$v):?>
                    <section class="text-center mb-4" style="margin: 15px">
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
                <h1 class="title">В данной категории книг пока нет....</h1>
            <?php endif;?>

        </div>

    </div>


</div>
