<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'user-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="help-block"><?php echo Yii::t('default', 'Fields with') ?><span
                class="required">*</span><?php echo Yii::t('default', ' are required.') ?></p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model, 'username', array('span' => 5, 'maxlength' => 40)); ?>

    <?php echo $form->passwordFieldControlGroup($model, 'new_password', array('span' => 5, 'maxlength' => 40)); ?>

    <?php echo $form->passwordFieldControlGroup($model, 'new_confirm', array('span' => 5, 'maxlength' => 40)); ?>

    <?php echo $form->textFieldControlGroup($model, 'email', array('span' => 5, 'maxlength' => 40)); ?>

    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? Yii::t('default', 'Create') : Yii::t('default', 'Save'), array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'size' => TbHtml::BUTTON_SIZE_LARGE,
        )); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->