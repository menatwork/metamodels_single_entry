<?php



$GLOBALS['TL_DCA']['tl_metamodel_attribute']['metapalettes']['_base_ extends default']['advanced'][] = 'use_for_single_item';

$GLOBALS['TL_DCA']['tl_metamodel_attribute']['fields']['use_for_single_item'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_metamodel_attribute']['use_for_single_item'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array
    (
        'tl_class' => 'cbx w50'
    ),
);
