<?php

namespace yiichina\modules\rbac\models;

use Yii;
use yii\base\Model;

class Permission extends Model
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'string', 'max' => 64],
            [['description', 'data'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => '内容',
            'created_at' => '创建时间',
        ];
    }
}
