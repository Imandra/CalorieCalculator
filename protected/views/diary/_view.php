<?php
/* @var $this DiaryController */
/* @var $data Diary */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('day_of_week')); ?>:</b>
	<?php echo CHtml::encode($data->day_of_week); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calories_per_day')); ?>:</b>
	<?php echo CHtml::encode($data->calories_per_day); ?>
	<br />


</div>