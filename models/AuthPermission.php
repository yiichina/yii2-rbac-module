<?php

namespace yiichina\modules\rbac\models;

use yii\helpers\ArrayHelper;

class AuthPermission extends AbstractAuthItem
{
    public $typeName = '权限';

    public function getAuthItems()
    {
        return $this->manager->getPermissions();
    }

    public function getAuthItem($name)
    {
        return $this->manager->getPermission($name);
    }

    /**
     * @inheritdoc
     */
    protected function createAuthItem($name)
    {
        return $this->manager->createPermission($name);
    }

    public function getChildrenList()
    {
        $permissions = $this->manager->getPermissions();
        unset($permissions[$this->oldName]);

        return ArrayHelper::map($permissions, 'name', 'description');
    }
}