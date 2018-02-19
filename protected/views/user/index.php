<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('user','Users');
?>

<?php
$this->breadcrumbs=array(
    Yii::t('user','Users'),
);

$this->menu=array(
    array('label'=>Yii::t('user','Create User'),'url'=>array('create')),
    array('label'=>Yii::t('user','Manage User'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('user','Users')?></h1>

<?php $this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'template' => "{items}\n<div class=\"row-fluid\"><div class=\"span8\">{pager}</div><div class=\"span4\">{summary}</div></div>",
    'pager' => array('class' => 'bootstrap.widgets.TbPager',
        'maxButtonCount' => 5),
)); ?>