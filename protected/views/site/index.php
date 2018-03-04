<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>

<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/css/custom.css"); ?>

<div>

    <?php if(Yii::app()->user->hasFlash('success')):?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <h1><?php echo Yii::app()->name ?></h1>


    <?php echo CHtml::beginForm(array('site/addToCalculate'), 'post'); ?>
    <?php echo TbHtml::label('Выберите продукт:', 'id'); ?>
    <?php echo TbHtml::dropDownList('id', '', $list, array('empty' => '', 'onchange' => 'this.form.submit()')); ?>
    <?php echo CHtml::endForm(); ?>

</div>

<div>
    <?php
    if (!empty($calculate)) {
        $sum_weight = 0;
        $sum_proteins = 0;
        $sum_fats = 0;
        $sum_carbohydrates = 0;
        $sum_calories = 0;
        echo '<table class="table table-bordered"><thead><tr><th width="20%">Наименование продукта</th><th width="15%">Вес&nbsp;продукта, г</th>
            <th width="15%">Белки, г</th><th width="15%">Жиры, г</th><th width="15%">Углеводы, г</th>
            <th width="15%">Калории, Ккал</th><th width="5%"></th></tr></thead><tbody>';
        foreach ($calculate as $id => $product) {
            $sum_weight += $product['weight'];
            $sum_proteins += $product['proteins'];
            $sum_fats += $product['fats'];
            $sum_carbohydrates += $product['carbohydrates'];
            $sum_calories += $product['calories'];
            echo '<tr><td>' . $product['name'] . '</td><td>' ?>

            <?php echo CHtml::beginForm(array('site/changeProductWeight'), 'post', array('style' => 'margin: 0')); ?>
            <span class="minus">&#9668;</span>
            <input type="text" name="weight" class="input-mini" title="Вес продукта"
                   value="<?php echo $product['weight'] ?>" readonly
                   style="background-color: #fff; border: none; cursor: auto; box-shadow: none; text-align: center; width: 2em; padding: 0; margin: 0;">
            <input type="hidden" name="idp" value="<?php echo $id ?>">
            <span class="plus">&#9658;</span>
            <?php echo CHtml::endForm(); ?>

            <?php echo '</td><td>' . $product['proteins'] . '</td><td>' . $product['fats'] . '</td><td>' .
                $product['carbohydrates'] . '</td><td>' . $product['calories'] . '</td><td>'; ?>
            <?php echo CHtml::beginForm(array('site/deleteFromCalculate'), 'post', array('style' => 'margin: 0')); ?>
            <?php echo CHtml::tag('button', array('name' => 'delete', 'type' => 'submit', 'style' => 'color:#f00', 'value' => $id, 'class' => 'btn btn-default btn-xs'), '&#10005;') ?>
            <?php echo CHtml::endForm(); ?>
            <?php echo '</td></tr>';
        }
        echo '</tbody><tfoot><tr class="info"><td>Итого</td><td>' . $sum_weight . '</td><td>' . $sum_proteins . '</td><td>' .
            $sum_fats . '</td><td>' . $sum_carbohydrates . '</td><td>' . $sum_calories . '</td><td></td></tr></tfoot></table>';
        ?>
        <?php if (!Yii::app()->user->isGuest) : ?>
            <?php echo TbHtml::linkButton('Сохранить в дневник', array('submit' => array('meal/save',
                'proteins' => $sum_proteins, 'fats' => $sum_fats, 'carbohydrates' => $sum_carbohydrates, 'calories' => $sum_calories),
                'name' => 'save', 'class' => 'btn btn-primary'))?>
        <?php endif;
    }
    ?>
</div>

<script>
    $(document).ready(function () {
        $('.minus').click(function () {
            var $input = $(this).parent().find('input:text');
            var count = parseInt($input.val()) - 10;
            count = count < 1 ? 10 : count;
            $input.val(count);
            $input.change();
            $(this).closest('form').submit();
            return false;
        });
        $('.plus').click(function () {
            var $input = $(this).parent().find('input:text');
            var count = parseInt($input.val()) + 10;
            count = count > 2000 ? 2000 : count;
            $input.val(count);
            $input.change();
            $(this).closest('form').submit();
            return false;
        });
    });
</script>
