<?php
/* @var $this MealController */
/* @var $data Meal */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('proteins')); ?>:</b>
	<?php echo CHtml::encode($data->proteins); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fats')); ?>:</b>
	<?php echo CHtml::encode($data->fats); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('carbohydrates')); ?>:</b>
	<?php echo CHtml::encode($data->carbohydrates); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('calories')); ?>:</b>
	<?php echo CHtml::encode($data->calories); ?>
	<br />

	*/ ?>

</div>