<?php

$this->beginWidget(
        'booster.widgets.TbJumbotron', array(
    'heading' => 'Update Jadwal',
        )
);
?>
<?php $this->endWidget(); ?>


<?php echo $this->renderPartial('_formUpdate', array('model' => $model)); ?>