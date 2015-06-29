<?php

        $this->widget(
    'bootstrap.widgets.TbHighCharts',
    array(
    'options' => array(
    'title' => array(
    'text' => 'Grafik Kehadiran Mahasiswa Bulanan',
    'x' => -20 //center
    ),
    'xAxis' => array(
    'categories' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']
    ),
    'yAxis' => array(
    'title' => array(
    'text' => 'jumlah mahasiswa',
    ),
    'plotLines' => [
    [
    'value' => 0,
    'width' => 1,
    'color' => '#808080'
    ]
    ],
    ),
    'tooltip' => array(
    'valueSuffix' => ' Mahasiswa'
    ),
    'legend' => array(
    'layout' => 'vertical',
    'align' => 'right',
    'verticalAlign' => 'middle',
    'borderWidth' => 0
    ),
    'series' => array(
    [
    'name' => 'Session 1',
    'data' => [7.0, 6.9, 9.5, 14.5, 18.2]
    ],
    [
    'name' => 'Session 2',
    'data' => [-0.2, 0.8, 5.7, 11.3, 17.0]
    ],
    [
    'name' => 'Session 3',
    'data' => [-0.9, 0.6, 3.5, 8.4, 13.5]
    ],
    [
    'name' => 'Session 4',
    'data' => [3.9, 4.2, 5.7, 8.5, 11.9,]
    ],
            [
    'name' => 'Session 5',
    'data' => [1.7, 2.5, 9.11, 5.2, 9.3,]
    ],
            [
    'name' => 'Session 6',
    'data' => [ 8.5, 11.9,3.9, 4.2, 5.7]
    ],
            [
    'name' => 'Session 7',
    'data' => [11.9,3.9, 4.2, 5.7, 8.5]
    ],
            [
    'name' => 'Session 8',
    'data' => [2.1, 2.4,4.2, 5.8, 6.0]
    ]


        


    )
    ),
    'htmlOptions' => array(
    'style' => 'min-width: 310px; height: 400px; margin: 0 auto'
    )
    )
    );
?>

