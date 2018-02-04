<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('product','Products'),
);

$this->menu=array(
	array('label'=>Yii::t('product','Create Product'),'url'=>array('create')),
	array('label'=>Yii::t('product','Manage Product'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('product','Products')?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>