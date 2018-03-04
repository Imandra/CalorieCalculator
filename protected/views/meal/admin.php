<?php
/* @var $this MealController */
/* @var $model Meal */

$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('meal', 'Meal');

$this->breadcrumbs = array(
    Yii::t('dailyReport', 'Daily Report') => array('dailyReport/admin'),
    $model->date,
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#meal-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>
    <h1><?php echo Yii::t('meal','Manage Meals') . ' ' . date('d.m.Y', strtotime($model->date)); ?></h1>

    <p>
        <?php echo Yii::t('default','You may optionally enter a comparison operator (<, <=, >, >=, <> or =)'.
            ' at the beginning of each of your search values to specify how the comparison should be done.') ?>
    </p>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'diary-grid',
    'dataProvider' => $model->search(),
    'type' => TbHtml::GRID_TYPE_BORDERED,
    'filter' => $model,
    'template' => "{items}\n<div class=\"row-fluid\"><div class=\"span8\">{pager}</div><div class=\"span4\">{summary}</div></div>",
    'pager' => array('class' => 'bootstrap.widgets.TbPager',
        'maxButtonCount' => 5),
    'columns' => array(
        array(
            'name' => 'datetime',
            'type' => 'raw',
            'value' => '$data->datetime . ", " . $data->dayOfWeek',
        ),
        array(
            'name' => 'proteins',
            'type' => 'raw',
            'value' => '$data->proteins',
        ),
        array(
            'name' => 'fats',
            'type' => 'raw',
            'value' => '$data->fats',
        ),
        array(
            'name' => 'carbohydrates',
            'type' => 'raw',
            'value' => '$data->carbohydrates',
        ),
        array(
            'name' => 'calories',
            'type' => 'raw',
            'value' => '$data->calories',
        ),

        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template' => '{delete}',
        ),

    ),
)); ?>