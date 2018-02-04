<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('default', 'Login');
$this->breadcrumbs=array(
    Yii::t('default', 'Login'),
);
?>
<div>

    <h1><?php echo Yii::t('default', 'Login');?></h1>

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>

	<!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

</div>
<div>
    <?php echo $form->labelEx($model,'username'); ?>
    <?php echo $form->textField($model,'username'); ?>
    <?php echo $form->error($model,'username'); ?>
</div>

<div>
    <?php echo $form->labelEx($model,'password'); ?>
    <?php echo $form->passwordField($model,'password'); ?>
    <?php echo $form->error($model,'password'); ?>
</div>

<div>
    <?php //echo $form->checkBox($model,'rememberMe'); ?>
    <?php //echo $form->label($model,'rememberMe'); ?>
    <?php //echo $form->error($model,'rememberMe'); ?>
</div>

<div>
    <?php echo TbHtml::submitButton(Yii::t('default', 'Login')); ?>
</div>

<?php $this->endWidget(); ?>

