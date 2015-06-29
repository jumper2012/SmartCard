<?php
$this->beginWidget(
        'booster.widgets.TbJumbotron', array(
    'heading' => 'Create Jadwal',
        )
);
?>
<?php $this->endWidget(); ?>


<BR><BR>

<?php echo $this->renderPartial('_form2', array('model' => $model)); ?>