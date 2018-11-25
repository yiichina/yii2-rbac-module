<?php

namespace yiichina\modules\rbac\models;

use Yii;
use yii\base\Model;

class Permission extends Model
{
    public $name;
    public $ruleName;
    public $description;
    public $data;
    public $createdAt;
    public $updatedAt;
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
            'name' => '名称',
            'ruleName' => '规则名称',
            'description' => '描述',
        ];
    }

    /**
     * Add new role.
     *
     * @return boolean Whether role was added or not
     * @throws \Exception
     */
    public function create()
    {
        $auth = Yii::$app->authManager;
        $permission = $auth->createPermission($this->name);
        $permission->description = $this->description;

        $auth->add($permission);
        return true;

    }
    public function update()
    {
        $auth = Yii::$app->authManager;
        $permission = $auth->createPermission($this->name);
        $permission->description = $this->description;
        $permission->ruleName = $this->ruleName;
        $permission->data = $this->data;
        if ($auth->update($this->name, $permission)) {
            $auth->removeChildren($permission);
            if ($this->children) {
                foreach ($this->children as $child) {
                    $auth->addChild($permission, $this->permissions[$child]);
                }
            }
            return true;
        } else {
            return false;
        }
    }
}
