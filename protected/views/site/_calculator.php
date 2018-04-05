<?php
if (!empty($positions)) {
    echo '<table class="table table-bordered"><thead><tr><th width="20%">Наименование продукта</th><th width="15%">Вес&nbsp;продукта, г</th>
            <th width="15%">Белки, г</th><th width="15%">Жиры, г</th><th width="15%">Углеводы, г</th>
            <th width="15%">Калории, Ккал</th><th width="5%"></th></tr></thead><tbody>';
    foreach ($positions as $position) {
        echo '<tr><td>' . $position->calcName . '</td><td>' ?>

        <form method="post" style="margin: 0;">
            <span class="minus"><i class="fa fa-caret-left fa-lg" aria-hidden="true"></i></span>
            <span class="display"><?php echo $position->weight ?></span>
            <input type="hidden" name="weight" class="weight" value="<?php echo $position->weight ?>">
            <input type="hidden" name="key" value="<?php echo $position->getId() ?>">
            <span class="plus"><i class="fa fa-caret-right fa-lg" aria-hidden="true"></i></span>
        </form>

        <?php echo '</td><td>' . $position->calcProteins . '</td><td>' . $position->calcFats . '</td><td>' .
            $position->calcCarbohydrates . '</td><td>' . $position->calcCalories . '</td><td>'; ?>
        <?php echo CHtml::beginForm(array('site/removePosition'), 'post', array('style' => 'margin: 0')); ?>
        <?php echo CHtml::tag('button', array('name' => 'del-key', 'type' => 'submit', 'value' => $position->getId(),
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
} ?>

<script>
    $(document).ready(function () {
        $('.minus').click(function () {
            var $input = $(this).parent().find('.weight');
            var count = parseInt($input.val()) - 5;
            count = count < 1 ? 5 : count;
            $input.val(count);
            $input.change();
            var form = $(this).parents('form');
            var formData = form.serialize();
            $.ajax({
                url: '/site/changePositionWeight',
                type: 'post',
                cache: false,
                data: formData,
                success: function (data) {
                    $('#calculator').html(data);
                }
            });
            return false;
        });

        $('.plus').click(function () {
            var $input = $(this).parent().find('.weight');
            var count = parseInt($input.val()) + 5;
            count = count > 2000 ? 2000 : count;
            $input.val(count);
            $input.change();
            var form = $(this).parents('form');
            var formData = form.serialize();
            $.ajax({
                url: '/site/changePositionWeight',
                type: 'post',
                cache: false,
                data: formData,
                success: function (html) {
                    $('#calculator').html(html);
                }
            });
            return false;
        });
    });
</script>