<?php

namespace app\models;

use Yii;

class Registration  extends \yii\db\ActiveRecord {
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_user';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required'],
            [['username', 'password'], 'string', 'max' => 128],
           // [['email', 'email']],
           // [['email', 'unique'],  'targetClass'=> 'app\models\User'],
            [['name', 'fname'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'name' => 'Name',
            'fname' => 'Fname',
        ];
    }
    
     
    public function registrate() {
        $user = new User();
        $user->username = $this->username;
        $user->password = $this->password;
        $user->email = $this->email;
        $user->name = $this->name;
        $user->fname = $this->fname;
        return $user->save();
    }
    
}
