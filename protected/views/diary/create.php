<?php
/* @var $this DiaryController */
/* @var $model Diary */
?>

<?php
$this->breadcrumbs=array(
	'Diaries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Diary', 'url'=>array('index')),
	array('label'=>'Manage Diary', 'url'=>array('admin')),
);
?>

<h1>Create Diary</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>