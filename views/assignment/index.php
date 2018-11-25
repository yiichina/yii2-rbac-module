<?php
use yii\helpers\Html;
use yii\grid\GridView;

?>

<h1>RBAC 管理模块</h1>

<?= Html::a('权限管理', ['permission/index']) ?>

<?= Html::a('角色管理', ['role/index']) ?>

<?= Html::a('规则管理', ['rule/index']) ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'id',
            'options' => ['width' => 60],
        ],
        [
            'attribute' => 'username',
            'options' => ['width' => 200],
        ],
        'email',
        [
            'attribute' => 'created_at',
            'options' => ['width' => 140],
            'format' => ['date', 'php:y-m-d H:i'],
        ],
        [
            'class' => 'components\ActionColumn',
            'header' => '操作',
            'options' => ['width' => 100],
        ],
    ],
    'layout' => "{items}\n{pager}",
    'pager'=>[
        'linkContainerOptions' => ['class' => 'page-item'],
        'linkOptions' => ['class' => 'page-link'],
        'disabledListItemSubTagOptions' => ['class' => 'page-link'],
    ],
]); ?>