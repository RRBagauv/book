<?php

namespace app\models;

use PHPUnit\Framework\MockObject\Builder\Identity;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $password
 * @property string $login
 * @property string|null $role
 * @property string $img
 *
 * @property Userbook[] $userbooks
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'password', 'login'], 'required'],
            [['name', 'surname', 'password', 'login', 'role', 'img'], 'string', 'max' => 255],
            [['login'], 'unique'],
            [['img'], 'file', 'extensions'=>'jpg, jpeg, png'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'password' => 'Password',
            'login' => 'Login',
            'role' => 'Role',
            'img' => 'Img',
        ];
    }

    /**
     * Gets query for [[Userbooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserbooks()
    {
        return $this->hasMany(Userbook::className(), ['user_id' => 'id']);
    }

    public static function findIdentity($id)
    {

        return User::findOne($id);

    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {

        return $this->id;

    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }


    public static function findByUsername($username){

        return User::findOne(['login'=>$username]);

    }

    public function validatePassword($password){

        return $this->password == $password;

    }

    public function redirect(){

        $this->redirect(['book/book-page']);

    }
       /* public function updateUser($post, $user){

            $user->name = $post->name;
            $user->surname = $post->surname;
            $user->password = $post->password;

        }*/




}
