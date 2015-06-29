    <?php /** @var TbActiveForm $form */
    $form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
    'id' => 'horizontalForm',
    'type' => 'horizontal',
    )
    ); ?>
     
    <fieldset>
     
    <legend>Legend</legend>
     
    
    <?php echo $form->dropDownListGroup(
    $model,
    'dropdown',
    array(
    'wrapperHtmlOptions' => array(
    'class' => 'col-sm-5',
    ),
    'widgetOptions' => array(
    'data' => array('Something ...', '1', '2', '3', '4', '5'),
    'htmlOptions' => array(),
    )
    )
    ); ?>
    <?php echo $form->dropDownListGroup(
    $model,
    'multiDropdown',
    array(
    'wrapperHtmlOptions' => array(
    'class' => 'col-sm-5',
    ),
    'widgetOptions' => array(
    'data' => array('1', '2', '3', '4', '5'),
    'htmlOptions' => array('multiple' => true),
    )
    )
    ); ?>
    <?php echo $form->select2Group(
    $model,
    'select2',
    array(
    'wrapperHtmlOptions' => array(
    'class' => 'col-sm-5',
    ),
    'widgetOptions' => array(
    'asDropDownList' => false,
    'options' => array(
    'tags' => array('clever', 'is', 'better', 'clevertech'),
    'placeholder' => 'type clever, or is, or just type!',
    /* 'width' => '40%', */
    'tokenSeparators' => array(',', ' ')
    )
    )
    )
    );?>
    <?php
    $this->endWidget();
    unset($form);
    