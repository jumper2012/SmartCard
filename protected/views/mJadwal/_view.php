<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id' => $data->ID)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('WEEK')); ?>:</b>
    <?php echo CHtml::encode($data->WEEK); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL')); ?>:</b>
    <?php echo CHtml::encode($data->TANGGAL); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('TA')); ?>:</b>
    <?php echo CHtml::encode($data->TA); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('ID_KUR')); ?>:</b>
    <?php echo CHtml::encode($data->ID_KUR); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('KELAS')); ?>:</b>
    <?php echo CHtml::encode($data->KELAS); ?>
    <br />


</div>