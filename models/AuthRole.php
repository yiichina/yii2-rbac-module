<?php

namespace yiichina\modules\rbac\models;

use yii\helpers\ArrayHelper;
use yii\rbac\Item;

class AuthRole extends AbstractAuthItem
{
    public function getAuthItems()
    {
        return $this->manager->getRoles();
    }

    public function getAuthItem($name)
    {
        return $this->manager->getRole($name);
    }

    /**
     * @inheritdoc
     */
    protected function createAuthItem($name)
    {
        return $this->manager->createRole($name);
    }

    public function getChildrenList()
    {
        $roles = $this->manager->getRoles();
        unset($roles[$this->oldName]);
        $permissions = $this->manager->getPermissions();

        return ArrayHelper::map(array_merge($roles, $permissions), 'name', 'description');
    }
}