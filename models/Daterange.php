<?php

namespace app\models;

use yii\base\Model;

/**
 * 
 * 
 * @property string $datetime_start
 * @property string $datetime_end
 */
class Daterange extends Model
{
    public  $datetimeStart;
    public  $datetimeEnd; 

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['datetimeStart'], 'required'],
            ['datetimeStart', 'string', 'max' => 150],
            
            [['datetimeEnd'],   'required'],
            ['datetimeEnd', 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'datetimeStart' => 'Date Start',
            'datetimeEnd' => 'Date End',
        ];
    }
}
