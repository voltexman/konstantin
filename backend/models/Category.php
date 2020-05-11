<?php

namespace backend\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    const ACTIVE = 1;
    const INACTIVE = 0;

    public $statusList = [
        self::ACTIVE => 'Активная',
        self::INACTIVE => 'Не активная'
    ];

    public function behaviors()
    {
        return [
            [
                'class' => '\yiidreamteam\upload\ImageUploadBehavior',
                'attribute' => 'image',
                'thumbs' => [
                    'admin' => ['width' => 400, 'height' => 400],
                    'front' => ['width' => 400, 'height' => 300],
                ],
                'filePath' => '@frontend/web/images/categories/[[pk]].[[extension]]',
                'fileUrl' => '/frontend/web/images/categories/[[pk]].[[extension]]',
                'thumbPath' => '@frontend/web/images/categories/[[profile]]_[[pk]].[[extension]]',
                'thumbUrl' => '/frontend/web/images/categories/[[profile]]_[[pk]].[[extension]]',
            ],
        ];
    }

    public static function tableName()
    {
        return '{{%product_categories}}';
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'text' => 'Описание',
            'status' => 'Статус'
        ];
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'boolean'],
            [['name'], 'unique', 'message' => 'Категория уже существует'],
            [['name', 'title', 'keywords'], 'string', 'max' => '255'],
            [['text', 'description'], 'string'],
            [['image'], 'file', 'extensions' => 'jpeg, jpg, gif, png'],
        ];
    }
}