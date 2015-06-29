<?php

class Excel extends CFormModel {

    public $excelfile;

    // ... other attributes

    public function rules() {
        return array(
            array('excelfile', 'file', 'types' => 'xlsx,xls'),
        );
    }

    public function attributeLabels() {
        return array(
            'excelfile' => 'Upload File (.xlsx)',
        );
    }

}

?>