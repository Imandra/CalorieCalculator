<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle=Yii::app()->name . ' - ' . $model->username;
?>

<?php
$this->breadcrumbs=array(
    Yii::t('user','Users')=>array('index'),
    $model->username,
);

$this->menu=array(
    array('label'=>Yii::t('user','Update User'), 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>Yii::t('user','Delete User'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),
        'confirm'=>Yii::t('default','Are you sure you want to delete this item?'))),
    array('label'=>Yii::t('user','Create User'), 'url'=>array('create')),
    array('label'=>Yii::t('user','List User'), 'url'=>array('index')),
    array('label'=>Yii::t('user','Manage User'), 'url'=>array('admin')),
);
?>

<h1><?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
	),
)); ?>