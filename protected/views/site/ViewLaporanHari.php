<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//echo $wew;
$test = $wew;
echo("<br>");

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
    array('label' => 'Sort By Session', 'content' => $this->renderPartial('ViewLaporanHarianBySession', array('test2'=>$test),true, true)),
    array('label' => 'Sort By Class', 'content' =>$this->renderPartial('ViewLaporanHarianByClass',array('wow' => $wew), true, true)),
    
    ),
    )
    );
?>
