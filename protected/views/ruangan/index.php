<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('ruangan-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Daftar Ruangan</h1>


<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'ruangan-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'ID',
        'SHORT_NAME',
        'NAME',
        'KAPASITAS',
        'KET',
        'STATUS',
        /*
          'LAST_UPDATE',
          'USER_ID',
          'WS',
          'RFID',
         */
        array(
            'class' => 'booster.widgets.TbButtonColumn',
        ),
    ),
));
?>
