<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <?php //echo $form->textFieldControlGroup($model, 'id', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'name', array('span' => 5, 'maxlength' => 128)); ?>

    <?php echo $form->textFieldControlGroup($model, 'proteins', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'fats', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'carbohydrates', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'calories', array('span' => 5)); ?>

    <div class="form-actions">
        <?php echo TbHtml::submitButton(Yii::t('default', 'Search'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY,)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->