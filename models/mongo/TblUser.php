<?php

namespace app\models\mongo;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for collection "tbl_user".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 */
class TblUser extends \yii\mongodb\ActiveRecord implements IdentityInterface {

    /**
     * @inheritdoc
     */
    public static function collectionName() {
        return 'tbl_user';
    }

    /**
     * @inheritdoc
     */
    public function attributes() {
        return [
            '_id',
            'username',
            'password',
            'email',
            'profile',
            'active',
            'name',
            'fname',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['username', 'password', 'email'], 'required'],
            [['profile'], 'string'],
            [['active'], 'integer'],
            [['username', 'password', 'email'], 'string', 'max' => 128],
            [['name', 'fname'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            '_id' => 'ID',
            'id' => 'ID0',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'profile' => 'Profile',
            'active' => 'Active',
            'name' => 'Name',
            'fname' => 'Fname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts() {
        return $this->hasMany(Post::className(), ['author_id' => 'id']);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['username' => $username]);
        // return static::findOne($username);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password) {
        return $this->password === $password;
    }

    public function getAuthKey() {
        $this->password;
    }

    public function getId() {
        return $this->getPrimaryKey();
    }

    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    public static function findIdentity($id) {
        // return  static::findOne(['id' => $id ]) ;
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

}
