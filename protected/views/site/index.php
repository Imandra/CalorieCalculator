<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>

<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/css/custom.css"); ?>

<div>

    <?php if (Yii::app()->user->hasFlash('success')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::app()->user->hasFlash('error')): ?>
        <div class="flash-error">
            <?php echo Yii::app()->user->getFlash('error'); ?>
        </div>
    <?php endif; ?>

    <h1><?php echo Yii::app()->name ?></h1>


    <?php echo CHtml::beginForm(array('site/addPosition'), 'post'); ?>
    <?php echo TbHtml::hiddenField('type', 'Product'); ?>
    <?php echo TbHtml::label('Выберите продукт:', 'id'); ?>
    <?php echo Chosen::dropDownList('id', '', $list,
        array('empty' => '', 'onchange' => 'this.form.submit()', 'class' => 'chosen-select', 'data-placeholder' => ' ',
            'style' => 'width:230px')); ?>
    <?php echo CHtml::endForm(); ?>

</div>

<div id="calculator">
    <?php $this->renderPartial('_calculator', array('positions' => $positions), false, true); ?>
</div>

<?php if (!Yii::app()->user->isGuest && !empty($positions)) : ?>
    <?php echo CHtml::beginForm(array('meal/save'), 'post'); ?>
    <?php echo CHtml::tag('button', array('name' => 'save', 'type' => 'submit', 'class' => 'btn btn-primary',
        'title' => 'Сохранить в дневник'), 'Сохранить в дневник') ?>
    <?php echo CHtml::endForm(); ?>
<?php endif; ?>
