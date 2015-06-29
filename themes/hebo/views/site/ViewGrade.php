    <h1>Grafik Harian</h1>
<?php
    $this->widget(
    'bootstrap.widgets.TbTabs',
    array(
    'type' => 'pills', // 'tabs', 'pills', or 'list'
     
    'tabs' => array(
    array(
    'label' => 'Choose sorting by : ',
    'content' => 'Messages Content',
    'itemOptions' => array('class' => 'disabled')
    ),
    array('label' => 'Sort By Session', 'content' => $this->renderPartial('', null, true, true)),
    array('label' => 'Sort By Class', 'content' =>$this->renderPartial('ViewLaporanHarian',array('wow' => $wew), null, true, true)),
    
    ),
    )
    );
?>
