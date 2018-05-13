<?php
/* @var $this SiteController */
/* @var $model User */
/* @var $form CActiveForm */
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('default', 'Sign Up');
$this->breadcrumbs = array(
    Yii::t('default', 'Sign Up'),
);
?>
<div>

    <h1><?php echo Yii::t('default', 'Sign Up'); ?></h1>

</div>

<div class="form">

    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'registration-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
        ),
        'enableAjaxValidation' => false,
    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model, 'username', array('span' => 3, 'maxlength' => 40)); ?>

    <?php echo $form->passwordFieldControlGroup($model, 'new_password', array('span' => 3, 'maxlength' => 40)); ?>

    <?php echo $form->passwordFieldControlGroup($model, 'new_confirm', array('span' => 3, 'maxlength' => 40,
        'labelOptions' => array('label' => 'Подтвердите пароль <span class="required">*</span>'))); ?>

    <?php echo $form->textFieldControlGroup($model, 'email', array('span' => 3, 'maxlength' => 40)); ?>

    <div>
        <?php echo TbHtml::submitButton(Yii::t('default', 'Sign Up'), array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'size' => TbHtml::BUTTON_SIZE_LARGE,
        )); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->