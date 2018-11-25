<?php

namespace yiichina\modules\rbac\models;

use Yii;
use yii\base\Model;

abstract class AbstractAuthItem extends Model
{
    public $name;
    public $ruleName;
    public $description;
    public $data;
    public $createdAt;
    public $updatedAt;
    public $children = [];
    public $manager;
    public $oldName;
    public $authItem;

    abstract protected function getAuthItems();

    abstract protected function getAuthItem($name);

    abstract protected function createAuthItem($name);

    abstract protected function getChildrenList();

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'string', 'max' => 64],
            ['data', 'checkData'],
            ['children', 'checkChildren'],
            [['description', 'data'], 'string'],
        ];
    }

    public function checkData()
    {
        return true;
    }

    public function checkChildren()
    {
        return true;
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
            'data' => '数据',
            'children' => '子权限',
            'createdAt' => '创建时间',
        ];
    }

    public function init()
    {
        $this->manager = Yii::$app->authManager;

        if ($this->oldName) {
            $authItem = $this->getAuthItem($this->oldName);
            $this->name = $authItem->name;
            $this->description = $authItem->description;
            $this->children = array_keys($this->manager->getChildren($authItem->name));
        }
    }

    /**
     * @return boolean Whether role was added or not
     * @throws \Exception
     */
    public function save()
    {
        if ($this->validate() == false) {
            return false;
        }

        if ($this->oldName) {
            $this->authItem = $this->getAuthItem($this->oldName);
            $this->authItem->name = $this->name;
            $this->authItem->description = $this->description;
            $this->authItem->data = $this->data == null ? null : Json::decode($this->data);
            $this->authItem->ruleName = empty($this->rule) ? null : $this->rule;
            $this->manager->update($this->oldName, $this->authItem);
        } else {
            $authItem = $this->createAuthItem($this->name);
            $this->manager->add($authItem);
        }

        $this->saveChildren();

        return true;
    }

    public function getOldChildren()
    {
        return $this->manager->getChildren($this->oldName);
    }

    protected function saveChildren()
    {
        $authItem = $this->getAuthItem($this->name);
        if (is_array($this->children)) {
            foreach (array_diff(array_keys($this->oldChildren), $this->children) as $item) {
                $this->manager->removeChild($authItem, $this->oldChildren[$item]);
            }
            foreach (array_diff($this->children, array_keys($this->oldChildren)) as $item) {
                $this->manager->addChild($authItem, $this->getAuthItem($item));
            }
        } else {
            $this->manager->removeChildren($authItem);
        }
    }
}
