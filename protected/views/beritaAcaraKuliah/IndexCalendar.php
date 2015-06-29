<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<h1>Berita Acara Harian tanggal ".$message."</h1><br/>";
$criteria=new CDbCriteria;
$criteria->condition='TANGGAL = "'.$message.'"';
$gridDataProvider = new CActiveDataProvider('BeritaAcaraKuliah', array('criteria'=>$criteria));

$this->widget(
        'booster.widgets.TbTabs', array(
    'type' => 'tabs',
    'justified' => true,
    'tabs' => array(
        array(
            'label' => 'Sort By Session',
            'content' => $this->renderPartial('SortBySession', null, true, true),
            'active' => true
        ),
        array(
            'label' => 'Sort By Class',
            'content' => $this->renderPartial('SortBySession', null, true, true),
        ),
    ),)
);
?>