<?php


namespace app\components;



use app\models\Categorybook;
use yii\bootstrap4\Widget;

class MenuWidget extends Widget
{

    public function run()
    {

        $category = Categorybook::find()->all();
        return $this->render('menu', compact('category'));

    }

}