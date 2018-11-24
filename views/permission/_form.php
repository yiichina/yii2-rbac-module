<?php
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name') ?>

<?= $form->field($model, 'ruleName') ?>

<?= $form->field($model, 'description') ?>

<?php ActiveForm::end(); ?>
