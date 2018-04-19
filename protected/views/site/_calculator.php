<?php echo CHtml::beginForm(array('site/addPosition'), 'post'); ?>
<?php echo TbHtml::hiddenField('type', 'Product'); ?>
<?php echo TbHtml::label('Выберите продукт:', 'id'); ?>
<?php echo Chosen::dropDownList('id', '', $list,
    array('empty' => '', 'class' => 'chosen-select', 'data-placeholder' => ' ',
        'style' => 'width:230px')); ?>
<?php echo CHtml::endForm(); ?>

<?php if (!empty($positions)) {
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
        <?php echo TbHtml::hiddenField('del-key', $position->getId()); ?>
        <?php echo CHtml::tag('button', array('name' => 'remove', 'type' => 'submit', 'class' => 'btn btn-xs',
            'title' => 'Удалить', 'id' => 'del' . $position->id), '<i class="fa fa-times" aria-hidden="true"></i>') ?>
        <?php echo CHtml::endForm(); ?>

        <?php echo '</td></tr>';
    }
    echo '</tbody><tfoot><tr class="info"><td>Итого</td><td>' . Yii::app()->calculator->totalWeight . '</td><td>' . Yii::app()->calculator->totalProteins . '</td><td>' .
        Yii::app()->calculator->totalFats . '</td><td>' . Yii::app()->calculator->totalCarbohydrates . '</td><td>' . Yii::app()->calculator->totalCalories . '</td><td>' ?>

    <?php if (!Yii::app()->user->isGuest) : ?>
        <?php echo CHtml::tag('button', array('name' => 'save', 'title' => 'Сохранить как продукт', 'class' => 'btn btn-primary btn-xs',
            'onclick' => '$("#saveDialog").dialog("open"); return false;', 'ontouchstart' => '$("#saveDialog").dialog("open"); return false;'),
            '<i class="fa fa-check" aria-hidden="true"></i>'); ?>
    <?php endif; ?>

    <?php echo '</td></tr></tfoot></table>';
} ?>

<?php if (!Yii::app()->user->isGuest && !empty($positions)) : ?>
    <?php echo CHtml::beginForm(array('meal/save'), 'post'); ?>
    <?php echo CHtml::tag('button', array('name' => 'save', 'type' => 'submit', 'class' => 'btn btn-primary',
        'title' => 'Сохранить в дневник'), 'Сохранить в дневник') ?>
    <?php echo CHtml::endForm(); ?>
<?php endif; ?>

<script>
    $(document).ready(function () {
        $('.minus').click(function () {
            var $input = $(this).parent().find('.weight');
            var weight = parseInt($input.val()) - 5;
            weight = weight < 5 ? 5 : weight;
            $input.val(weight);
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
            var weight = parseInt($input.val()) + 5;
            weight = weight > 2000 ? 2000 : weight;
            $input.val(weight);
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

        $('.chosen-select').change(function () {
            var form = $(this).parents('form');
            var formData = form.serialize();
            $.ajax({
                url: '/site/addPosition',
                type: 'post',
                cache: false,
                data: formData,
                success: function (data) {
                    $('#calculator').html(data);
                }
            });
            return false;
        });

        $('[id*=del]').click(function () {
            var btnID = $(this).attr('id');
            var form = $('#' + btnID).parents('form');
            var formData = form.serialize();
            $.ajax({
                url: '/site/removePosition',
                type: 'post',
                cache: false,
                data: formData,
                success: function (data) {
                    $('#calculator').html(data);
                }
            });
            return false;
        });
    });
</script>