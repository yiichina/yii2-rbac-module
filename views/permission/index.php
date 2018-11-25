<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>

<div class="page-header">
    <h1>权限</h1>
    <?= Html::a('添加权限', ['create']) ?>
</div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'name',
        [
            'attribute' => 'createdAt',
            'options' => ['width' => 120],
        ],
        [
            'class' => 'components\ActionColumn',
            'header' => '操作',
            'options' => ['width' => 100],
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a('修改', ['update', 'name' => $model->name]);
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