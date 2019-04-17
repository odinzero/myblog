<?php

namespace app\models\mongo;

use Yii;

/**
 * This is the model class for collection "tbl_post".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 */
class TblPost extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'tbl_post';
    }
    
     /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title', 'description', 'content'], 'required'],
            [['content'], 'string'],
            [['create_time', 'author_id'], 'integer'],
            [['title', 'description', 'img'], 'string', 'max' => 128],
            [['author_id'], 'exist',  'skipOnError' => true,
              'targetClass' => User::className(), 
              'targetAttribute' => ['author_id' => 'id']],
           // [['author_id'], 'default'],
            [['img'], 'string' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'title',
            'description',
            'content',
            'img',
            'create_time',
            'author_id',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'img' => 'File',
            'create_time' => 'Create Time',
            'author_id' => 'Author ID',
        ];
    }
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor() {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }
    
    public function afterFind() {
        
        $id_action = Yii::$app->controller->action->id;
        if($id_action != 'update' && $id_action != 'view') {
        // ссылка на картинку
        $this->img = "images/".$this->img;
        }
    }
}
