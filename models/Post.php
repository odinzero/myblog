<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "tbl_post".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $img
 * @property integer $create_time
 * @property integer $author_id
 *
 * @property User $author
 */
class Post extends \yii\db\ActiveRecord {
    
    // public $file;

    /**
     * @inheritdoc
     */
    public static function tableName() {
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
    public function attributeLabels() {
        return [
            'id' => 'ID',
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

//    public function behaviors() {
//        return [
//            // Other behaviors
//            [
//                'class' => TimestampBehavior::className(),
//                'createdAtAttribute' => 'create_time',
//                'updatedAtAttribute' => false,
//                'value' => new Expression('NOW()'),
//            ],
//        ];
//    }

     public function savePost() {
        $post = new Post();
        $post->title = $this->title;
        $post->description = $this->description;
        $post->content = $this->content;
        $post->img = $this->img;
       // $post->create_time = date('Y-m-d H:i:s');
        $post->create_time = time();
        echo $post->create_time;
        $post->author_id = $this->author_id;
       // return $post->save();
    }
}
