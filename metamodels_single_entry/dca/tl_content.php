<?php


$GLOBALS['TL_DCA']['tl_content']['palettes']['metamodel_content_single'] =
    '{type_legend},type,headline,name;' .
    '{mm_config_legend},metamodel,metamodels_data_id;' .
    '{mm_rendering},metamodel_layout,metamodel_rendersettings,metamodel_noparsing;' .
    '{mm_meta_legend},metamodel_meta_title,metamodel_meta_description;' .
    '{protected_legend:hide},protected;' .
    '{expert_legend:hide},guests,cssID,space;' .
    '{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields']['metamodels_data_id'] = array(
    'label'            => &$GLOBALS['TL_LANG']['tl_content']['metamodels_data_id'],
    'exclude'          => true,
    'inputType'        => 'select',
    'options_callback' => array('MetaModels\DCA\ContentSingle', 'getDataRows'),
    'eval'             => array
    (
        'mandatory'          => true,
        'includeBlankOption' => true,
        'chosen'             => true,
        'tl_class'           => 'w50'
    )
);
