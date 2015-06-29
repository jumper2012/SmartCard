<?php
?>
<div id="sidebar"><h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<BR>
<BR>
<BR>
<TABLE>
  <TR>
      <TD>
          <?php $this->widget('ext.simple-calendar.SimpleCalendarWidget'); ?>
      </TD>
      <TD>
              
      <TD>
      <TD>
     <?php $collapse = $this->beginWidget('bootstrap.widgets.TbCollapse'); ?>
    <div class="panel-group" id="accordion">
    <div class="panel panel-default">
    <div class="panel-heading">
    <h4 class="panel-title">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
    Berita Acara Hari ini
    </a>
    </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
    <div class="panel-body">
        <?php
        $gridDataProvider = new CActiveDataProvider('BeritaAcaraKuliah');
            $this->widget(
    'bootstrap.widgets.TbGridView',
    array(
    'dataProvider' => $gridDataProvider,
    'template' => "{items}",
    'columns' => array('ID','WEEK','SESSION','TA','ID_KUR','KODE_MK','KELAS','TANGGAL','TOPIK'),
    )
    );
        ?>
         
    </div>
    </div>
    </div>
    <div class="panel panel-default">
    <div class="panel-heading">
    <h4 class="panel-title">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
    Berita Acara Kemarin
    </a>
    </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
    <div class="panel-body">
        <?php
        $gridDataProvider = new CActiveDataProvider('BeritaAcaraKuliah');
            $this->widget(
    'bootstrap.widgets.TbGridView',
    array(
    'dataProvider' => $gridDataProvider,
    'template' => "{items}",
    'columns' => array('ID','WEEK','SESSION','TA','ID_KUR','KODE_MK','KELAS','TANGGAL','TOPIK'),
    )
    );
        ?>
    
    </div>
    </div>
    </div>
    <div class="panel panel-default">
    <div class="panel-heading">
    <h4 class="panel-title">
    
    </div>
    </div>
    </div>
    </div>
    <?php $this->endWidget(); ?>

      </TD>
  </TR>
</TABLE>
<!--
<div id="sidebar">

	</div><!-- footer -->



       
