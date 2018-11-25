<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name') ?>

<?= $form->field($model, 'ruleName') ?>

<?= $form->field($model, 'description') ?>

<?= Html::submitButton('添加') ?>

<?php ActiveForm::end(); ?>
