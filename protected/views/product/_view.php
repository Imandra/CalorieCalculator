<?php
/* @var $this ProductController */
/* @var $data Product */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('calories')); ?>:</b>
	<?php echo CHtml::encode($data->calories); ?>
	<br />


</div>