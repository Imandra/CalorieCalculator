<?php
/* @var $this ProductController */
/* @var $model Product */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('product','Products')=>array('index'),
    Yii::t('default','Create'),
);

$this->menu=array(
    array('label'=> Yii::t('product','Manage Product'), 'url'=>array('admin')),
	array('label'=> Yii::t('product','List Product'), 'url'=>array('index')),
);
?>

<h1><?php echo Yii::t('product','Create Product')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>