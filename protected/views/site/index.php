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


    <?php echo CHtml::beginForm(array('site/addToCalculator'), 'post'); ?>
    <?php echo TbHtml::label('Выберите продукт:', 'id'); ?>
    <?php echo TbHtml::dropDownList('id', '', $list, array('empty' => '', 'onchange' => 'this.form.submit()')); ?>
    <?php echo CHtml::endForm(); ?>

</div>

<div>
    <?php
    if (!empty($positions)) {
        echo '<table class="table table-bordered"><thead><tr><th width="20%">Наименование продукта</th><th width="15%">Вес&nbsp;продукта, г</th>
            <th width="15%">Белки, г</th><th width="15%">Жиры, г</th><th width="15%">Углеводы, г</th>
            <th width="15%">Калории, Ккал</th><th width="5%"></th></tr></thead><tbody>';
        foreach ($positions as $position) {
            echo '<tr><td>' . $position->calcName . '</td><td>' ?>

            <?php echo CHtml::beginForm(array('site/changeProductWeight'), 'post', array('style' => 'margin: 0')); ?>
            <span class="minus"><i class="fa fa-caret-left fa-lg" aria-hidden="true"></i></span>
            <input type="text" name="weight" class="input-mini" title="Вес продукта"
                   value="<?php echo $position->weight ?>" readonly
                   style="background-color: #fff; border: none; cursor: auto; box-shadow: none; text-align: center; width: 2em; padding: 0; margin: 0;">
            <input type="hidden" name="idp" value="<?php echo $position->id ?>">
            <span class="plus"><i class="fa fa-caret-right fa-lg" aria-hidden="true"></i></span>
            <?php echo CHtml::endForm(); ?>

            <?php echo '</td><td>' . $position->calcProteins . '</td><td>' . $position->calcFats . '</td><td>' .
                $position->calcCarbohydrates . '</td><td>' . $position->calcCalories . '</td><td>'; ?>
            <?php echo CHtml::beginForm(array('site/removeFromCalculator'), 'post', array('style' => 'margin: 0')); ?>
            <?php echo CHtml::tag('button', array('name' => 'delete', 'type' => 'submit', 'value' => $position->id,
                'class' => 'btn btn-xs', 'title' => 'Удалить'), '<i class="fa fa-times" aria-hidden="true"></i>') ?>
            <?php echo CHtml::endForm(); ?>
            <?php echo '</td></tr>';
        }
        echo '</tbody><tfoot><tr class="info"><td>Итого</td><td>' . Yii::app()->calculator->totalWeight . '</td><td>' . Yii::app()->calculator->totalProteins . '</td><td>' .
            Yii::app()->calculator->totalFats . '</td><td>' . Yii::app()->calculator->totalCarbohydrates . '</td><td>' . Yii::app()->calculator->totalCalories . '</td><td>' ?>

        <?php if (!Yii::app()->user->isGuest) :
            echo '<div style="display:none">';
            $this->beginWidget('system.zii.widgets.jui.CJuiDialog',
                array(
                    'id' => 'saveDialog',
                    'options' => array(
                        'title' => Yii::t('product', 'Save'),
                        'width' => '300px',
                        'modal' => true,
                        'buttons' => array(
                            'Добавить' => 'js:function() {$("#Save").submit();}',
                            'Отмена' => 'js:function() {$(this).dialog("close");}'),
                        'autoOpen' => false,
                    ))); ?>
            <?php echo Yii::t('product', 'Enter product name:'); ?><br/><br/>

            <form id="Save" name="save"
                  action="<?php echo $this->createUrl('product/saveAsProduct'); ?>"
                  method="post">
                <input type="text" name="Save" style="width: 100%;" title="Название продукта">
            </form>

            <?php $this->endWidget();
            echo '</div>';

            echo CHtml::tag('button', array('name' => 'save', 'title' => 'Сохранить как продукт', 'class' => 'btn btn-primary btn-xs',
                'onclick' => '$("#saveDialog").dialog("open"); return false;', 'ontouchstart' => '$("#saveDialog").dialog("open"); return false;'),
                '<i class="fa fa-check" aria-hidden="true"></i>');
        endif;

        echo '</td></tr></tfoot></table>';
        ?>
        <?php if (!Yii::app()->user->isGuest) : ?>
            <?php echo TbHtml::linkButton('Сохранить в дневник', array('submit' => array('meal/save',
                'proteins' => Yii::app()->calculator->totalProteins, 'fats' => Yii::app()->calculator->totalFats,
                'carbohydrates' => Yii::app()->calculator->totalCarbohydrates, 'calories' => Yii::app()->calculator->totalCalories),
                'name' => 'save', 'class' => 'btn btn-primary', 'title' => 'Сохранить в дневник')) ?>
        <?php endif;
    }
    ?>
</div>

<script>
    $(document).ready(function () {
        $('.minus').click(function () {
            var $input = $(this).parent().find('input:text');
            var count = parseInt($input.val()) - 5;
            count = count < 1 ? 5 : count;
            $input.val(count);
            $input.change();
            $(this).closest('form').submit();
            return false;
        });
        $('.plus').click(function () {
            var $input = $(this).parent().find('input:text');
            var count = parseInt($input.val()) + 5;
            count = count > 2000 ? 2000 : count;
            $input.val(count);
            $input.change();
            $(this).closest('form').submit();
            return false;
        });
    });
</script>
