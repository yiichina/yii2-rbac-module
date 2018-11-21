<?php

namespace yiichina\modules\rbac\models;

class Permission extends Model
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['parent_id'], 'number'],
            [['content'], 'string', 'min' => 5],
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
