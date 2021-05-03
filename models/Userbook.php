<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "userbook".
 *
 * @property int $id
 * @property int $user_id
 * @property int $book_id
 * @property int $get
 *
 * @property User $user
 * @property Book $book
 */
class Userbook extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userbook';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'book_id', 'get'], 'required'],
            [['user_id', 'book_id', 'get'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'book_id' => 'Book ID',
            'get' => 'Get',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    public function getUserBook($array){

        $book = Userbook::find()->where(['user_id'=>$array['user_id'], 'book_id'=>$array['book_id']])->one();
        if($book->id){

            $book->get = $array['get'];

            if($book->update($book->id)){

               return true;

            }
        }

        return $book;

    }



    public function searchQuery($array){

        $query = $this->find()->where($array);

        $dataProvider = new ActiveDataProvider(['query'=>$query]);

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'book_id' => $this->book_id,
            'get' => $this->get,
        ]);

        return $dataProvider;

    }


    public function getBookUsers($id, $get){

        return Userbook::find()->where(['user_id'=>$id, 'get'=>$get])->all();

    }
}
