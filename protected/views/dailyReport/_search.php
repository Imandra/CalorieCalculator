<?php
/* @var $this DailyReportController */
/* @var $model DailyReport */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'user_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'date',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'proteins_per_day',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'fats_per_day',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'carbohydrates_per_day',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'calories_per_day',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->