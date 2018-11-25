<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->params['breadcrumbs'][] = '授权管理';
?>

<h1>授权管理</h1>

<?= Html::a('授权管理', ['assignment/index'], ['class' => 'btn btn-warning']) ?>

<?= Html::a('权限管理', ['permission/index'], ['class' => 'btn btn-success']) ?>

<?= Html::a('角色管理', ['role/index'], ['class' => 'btn btn-info']) ?>

<?= Html::a('规则管理', ['rule/index'], ['class' => 'btn btn-primary']) ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'id',
            'options' => ['width' => 100],
        ],
        'username',
        [
            'attribute' => 'created_at',
            'options' => ['width' => 200],
            'format' => ['date', 'php:y-m-d H:i:s'],
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => '操作',
            'options' => ['width' => 60],
            'template' => '{update}',
            'buttons' => [
                'update' => function ($url, $model, $key) {
                    return Html::a('授权', ['update', 'id' => $model->id]);
                },
            ],
        ],
    ],
    'layout' => "{items}\n{pager}",
    'pager'=>[
        'linkContainerOptions' => ['class' => 'page-item'],
        'linkOptions' => ['class' => 'page-link'],
        'disabledListItemSubTagOptions' => ['class' => 'page-link'],
    ],
]); ?>