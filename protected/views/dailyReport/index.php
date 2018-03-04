<?php
/* @var $this DailyReportController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Daily Reports',
);

$this->menu=array(
array('label'=>'Create DailyReport','url'=>array('create')),
array('label'=>'Manage DailyReport','url'=>array('admin')),
);
?>

<h1>Daily Reports</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>