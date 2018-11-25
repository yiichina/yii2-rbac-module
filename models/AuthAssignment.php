<?php

namespace yiichina\modules\rbac\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\base\InvalidConfigException;

class AuthAssignment extends Model
{
    public $user_id;
    public $items;
    public $manager;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['items', 'checkItems'],
        ];
    }


    public function checkItems()
    {
        return true;
    }


    public function init()
    {
        parent::init();
        $this->manager = Yii::$app->authManager;
        if ($this->user_id === null) {
            throw new InvalidConfigException('用户名不能为空');
        }
        $this->items = array_keys($this->manager->getAssignments($this->user_id));
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'items' => '角色列表',
        ];
    }

    public function save()
    {
        if (!$this->validate()) {
            return false;
        }

        if (is_array($this->items)) {
            $oldAssignments = array_keys($this->manager->getAssignments($this->user_id));
            foreach (array_diff($oldAssignments, $this->items) as $item) {
                $this->manager->revoke($this->manager->getRole($item), $this->user_id);
            }
            foreach (array_diff($this->items, $oldAssignments) as $item) {
                $this->manager->assign($this->manager->getRole($item), $this->user_id);
            }
        } else {
            $this->manager->revokeAll($this->user_id);
        }

        return true;
    }

    public function getRolesList()
    {
        return ArrayHelper::map($this->manager->getRoles(), 'name', 'description');
    }
}
