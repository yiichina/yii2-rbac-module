<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->params['breadcrumbs'][] = $model->typeName . '管理';
?>

<h1><?= $model->typeName ?>管理</h1>
<?= Html::a('添加' . $model->typeName, ['create'], ['class' => 'btn btn-primary']) ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'name',
            'label' => '名称',
            'options' => ['width' => 100],
        ],
        [
            'label' => '描述',
            'attribute' => 'description',
        ],
        [
            'label' => '添加时间',
            'attribute' => 'createdAt',
            'format' => ['date', 'php:y-m-d H:i:s'],
            'options' => ['width' => 180],
        ],
        [
            'label' => '修改时间',
            'attribute' => 'updatedAt',
            'format' => ['date', 'php:y-m-d H:i:s'],
            'options' => ['width' => 180],
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => '操作',
            'options' => ['width' => 100],
            'template' => '{update} {delete}',
            'buttons' => [
                'update' => function ($url, $model, $key) {
                    return Html::a('修改', ['update', 'name' => $model->name]);
                },
                'delete' => function ($url, $model, $key) {
                    return Html::a('删除', ['delete', 'name' => $model->name]);
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