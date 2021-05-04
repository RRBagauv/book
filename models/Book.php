<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $count

 *
// * @property string $img
 *
 * @property Categorybook[] $categorybooks
 * @property Userbook[] $userbooks
 */
class Book extends \yii\db\ActiveRecord
{

    public int $user_id;
    public int $book_id;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'count'], 'required'],
            [['description'], 'string'],
            [['count'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['img'], 'file', 'extensions'=>'jpg, jpeg, png'],
        ];
    }


    public function getUserId($login){
        return User::findOne(['login'=>$login]);
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'count' => 'Count',

        ];
    }

    /**
     * Gets query for [[Categorybooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategorybooks()
    {
        return $this->hasMany(Categorybook::className(), ['book_id' => 'id']);
    }

    /**
     * Gets query for [[Userbooks]].
     *
     * @return \yii\db\ActiveQuery
     */




}
