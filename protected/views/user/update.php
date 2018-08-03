<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('default', 'Update') . ' ' . CHtml::encode($model->username);
?>

<?php
$this->breadcrumbs = array(
    //Yii::t('user','Users')=>array('index'),
    CHtml::encode($model->username) => array('view', 'id' => $model->id),
    Yii::t('default', 'Update'),
);

$this->menu = array(
    array('label' => CHtml::encode($model->username), 'url' => array('view', 'id' => $model->id)),
    //array('label'=>Yii::t('user','List User'), 'url'=>array('index')),
    array('label' => Yii::t('user', 'Create User'), 'url' => array('create')),
    array('label' => Yii::t('user', 'Manage User'), 'url' => array('admin')),
);
?>

    <h1><?php echo Yii::t('default', 'Update') . ' ' . CHtml::encode($model->username); ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>