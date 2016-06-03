<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Src
	'MetaModels\DCA\ContentSingle'                      => 'system/modules/metamodels_single_entry/src/MetaModels/DCA/ContentSingle.php',
	'MetaModels\FrontendIntegration\Content\SingleItem' => 'system/modules/metamodels_single_entry/src/MetaModels/FrontendIntegration/Content/SingleItem.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_metamodel_content_single' => 'system/modules/metamodels_single_entry/templates',
));
