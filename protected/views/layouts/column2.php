<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div class="row">
        <div class="span3" style="margin-top: 20px">
            <?php $this->widget('bootstrap.widgets.TbNav', array(
                'type' => TbHtml::NAV_TYPE_TABS,
                'stacked' => true,
                'items' => $this->menu,
            )); ?>
        </div>
        <div class="span9">
            <?php echo $content; ?>
        </div>
    </div><!--row-->
<?php $this->endContent(); ?>