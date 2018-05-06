<?php
/* @var $this DailyReportController */
/* @var $model DailyReport */

$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('dailyReport', 'Daily Report');

$this->breadcrumbs = array(
    Yii::t('dailyReport', 'Daily Report')
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$('#daily-report-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>
    <h1><?php echo Yii::t('dailyReport', 'Daily Report') . ': ' . ucfirst(Yii::app()->user->name); ?></h1>

    <p>
        <?php echo Yii::t('default', 'You may optionally enter a comparison operator (<, <=, >, >=, <> or =)' .
            ' at the beginning of each of your search values to specify how the comparison should be done.') ?>
    </p>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'daily-report-grid',
    'dataProvider' => $model->search(),
    'type' => TbHtml::GRID_TYPE_BORDERED,
    'filter' => $model,
    'template' => "<div class=\"table-container\">{items}\n</div><div class=\"row-fluid\"><div class=\"span8\">{pager}</div><div class=\"span4\">{summary}</div></div>",
    'pager' => array(
        'class' => 'bootstrap.widgets.TbPager',
        'maxButtonCount' => 4
    ),
    'columns' => array(
        array(
            'name' => 'date',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->date. ", " . $data->dayOfWeek),array("meal/admin","date"=>$data->date))'
        ),
        array(
            'name' => 'proteins_per_day',
            'type' => 'raw',
            'value' => '$data->proteins_per_day',
        ),
        array(
            'name' => 'fats_per_day',
            'type' => 'raw',
            'value' => '$data->fats_per_day',
        ),
        array(
            'name' => 'carbohydrates_per_day',
            'type' => 'raw',
            'value' => '$data->carbohydrates_per_day',
        ),
        array(
            'name' => 'calories_per_day',
            'type' => 'raw',
            'value' => '$data->calories_per_day',
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{delete}',
        ),
    ),
)); ?>