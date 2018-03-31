<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('user','Create User');
?>

<?php
$this->breadcrumbs=array(
    //Yii::t('user','Users')=>array('index'),
    Yii::t('default','Create'),
);

$this->menu=array(
    array('label'=> Yii::t('user','Manage User'), 'url'=>array('admin')),
    //array('label'=> Yii::t('user','List User'), 'url'=>array('index')),
);
?>

<h1><?php echo Yii::t('user', 'Create User') ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>