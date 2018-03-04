<?php
/* @var $this DailyReportController */
/* @var $model DailyReport */
?>

<?php
$this->breadcrumbs=array(
	'Daily Reports'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List DailyReport', 'url'=>array('index')),
array('label'=>'Create DailyReport', 'url'=>array('create')),
array('label'=>'Update DailyReport', 'url'=>array('update', 'id'=>$model->id)),
array('label'=>'Delete DailyReport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage DailyReport', 'url'=>array('admin')),
);
?>

<h1>View DailyReport #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
'htmlOptions' => array(
'class' => 'table table-striped table-condensed table-hover',
),
'data'=>$model,
'attributes'=>array(
		'id',
		'user_id',
		'date',
		'proteins_per_day',
		'fats_per_day',
		'carbohydrates_per_day',
		'calories_per_day',
),
)); ?>