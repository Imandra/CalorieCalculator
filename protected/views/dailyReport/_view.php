<?php
/* @var $this DailyReportController */
/* @var $data DailyReport */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proteins_per_day')); ?>:</b>
	<?php echo CHtml::encode($data->proteins_per_day); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fats_per_day')); ?>:</b>
	<?php echo CHtml::encode($data->fats_per_day); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('carbohydrates_per_day')); ?>:</b>
	<?php echo CHtml::encode($data->carbohydrates_per_day); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('calories_per_day')); ?>:</b>
	<?php echo CHtml::encode($data->calories_per_day); ?>
	<br />

	*/ ?>

</div>