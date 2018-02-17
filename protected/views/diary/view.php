<?php
/* @var $this DiaryController */
/* @var $model Diary */
?>

<?php
$this->breadcrumbs=array(
	'Diaries'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Diary', 'url'=>array('index')),
	array('label'=>'Create Diary', 'url'=>array('create')),
	array('label'=>'Update Diary', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Diary', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Diary', 'url'=>array('admin')),
);
?>

<h1>View Diary #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'user_id',
		'date',
		'day_of_week',
		'calories_per_day',
	),
)); ?>