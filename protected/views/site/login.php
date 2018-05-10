<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('default', 'Login');
$this->breadcrumbs = array(
    Yii::t('default', 'Login'),
);
?>
<div>

    <h1><?php echo Yii::t('default', 'Login'); ?></h1>

</div>

<div class="form">

    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
        ),
        'enableAjaxValidation' => false,
    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model, 'username', array('span' => 3, 'maxlength' => 30,
        'labelOptions' => array('label' => Yii::t('user', 'Email or Login')))); ?>

    <?php echo $form->passwordFieldControlGroup($model, 'password', array('span' => 3, 'maxlength' => 30)); ?>

    <div>
        <?php echo TbHtml::submitButton(Yii::t('default', 'Login'), array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'size' => TbHtml::BUTTON_SIZE_LARGE,
        )); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->