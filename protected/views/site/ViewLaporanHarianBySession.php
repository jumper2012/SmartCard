<br/>
<p>
    <b>Tabel di bawah ini berdasarkan data bulan ini.</b>
</p>
<?php $collapse = $this->beginWidget('bootstrap.widgets.TbCollapse'); ?>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    31A
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <?php
                //echo $wow;
                $tanggal = date("Y-m-d");
                $bulanTemp = explode("-", $tanggal);
                $bulan = $bulanTemp[1];
                $criteria = new CDbCriteria;
                $criteria->condition = 'TANGGAL like "%' . $test2 . '%" and KELAS like "31A"';
                $gridDataProvider = new CActiveDataProvider('BeritaAcaraKuliah', array('criteria' => $criteria));

                $details = "Details";
                $this->widget(
                        'bootstrap.widgets.TbGridView', array(
                    'type' => 'striped',
                    'dataProvider' => $gridDataProvider,
                    'template' => "{items}",
                    'columns' => array('TANGGAL', 'WEEK', 'SESSION', 'KODE_MK', 'KELAS', 'RUANGAN', 'PIC', 'START_TIME', 'END_TIME'
                    ),)
                );
                ?>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    31B
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
            <?php
                $tanggal = date("Y-m-d");
                $bulanTemp = explode("-", $tanggal);
                $bulan = $bulanTemp[1];
                $criteria = new CDbCriteria;
                $criteria->condition = 'TANGGAL like "%' . $test2 . '%" and KELAS like "31B"';
                $gridDataProvider = new CActiveDataProvider('BeritaAcaraKuliah', array('criteria' => $criteria));

                $details = "Details";
                $this->widget(
                        'bootstrap.widgets.TbGridView', array(
                    'type' => 'striped',
                    'dataProvider' => $gridDataProvider,
                    'template' => "{items}",
                    'columns' => array('TANGGAL', 'WEEK', 'SESSION', 'KODE_MK', 'KELAS', 'RUANGAN', 'PIC', 'START_TIME', 'END_TIME'
                    ),)
                );
                ?>
            </div>
        </div>
    </div>
    
</div>
<?php $this->endWidget(); ?>
