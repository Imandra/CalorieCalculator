<?php
/* @var $this DiaryController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Diaries',
);

$this->menu=array(
	array('label'=>'Create Diary','url'=>array('create')),
	array('label'=>'Manage Diary','url'=>array('admin')),
);
?>

<h1>Diaries</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>