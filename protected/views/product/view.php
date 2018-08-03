<?php
/* @var $this ProductController */
/* @var $model Product */

$this->pageTitle = Yii::app()->name . ' - ' . CHtml::encode($model->name);
?>

<?php
$this->breadcrumbs = array(
    //Yii::t('product','Products')=>array('index'),
    CHtml::encode($model->name),
);

$this->menu = array(
    array('label' => Yii::t('product', 'Update Product'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('product', 'Delete Product'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id),
        'confirm' => Yii::t('default', 'Are you sure you want to delete this item?'))),
    array('label' => Yii::t('product', 'Create Product'), 'url' => array('create')),
    //array('label'=>Yii::t('product','List Product'), 'url'=>array('index')),
    array('label' => Yii::t('product', 'Manage Product'), 'url' => array('admin')),
);
?>

    <h1><?php echo CHtml::encode($model->name); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'htmlOptions' => array(
        'class' => 'table',
    ),
    'data' => $model,
    'attributes' => array(
        //'id',
        'name',
        'proteins',
        'fats',
        'carbohydrates',
        'calories',
    ),
)); ?>