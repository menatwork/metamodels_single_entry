<?php
/**
 * Created by PhpStorm.
 * User: stefan.heimes
 * Date: 02.06.2016
 * Time: 12:14
 */

namespace MetaModels\FrontendIntegration\Content;


use MetaModels\Filter\Rules\StaticIdList;
use MetaModels\FrontendIntegration\HybridList;
use MetaModels\ItemList;

class SingleItem extends HybridList
{
    /**
     * The Template instance.
     *
     * @var string
     */
    protected $strTemplate = 'ce_metamodel_content_single';

    /**
     * The link to use in the wildcard.
     *
     * @var string
     */
    protected $wildCardLink = 'contao/main.php?do=page&amp;table=tl_content&amp;act=edit&amp;id=%s';

    /**
     * The link to use in the wildcard.
     *
     * @var string
     */
    protected $typePrefix = 'ce_';

    /**
     * Compile the content element.
     *
     * @return void
     */
    protected function compile()
    {
        // Setup the list.
        $objItemRenderer = new ItemList();
        $objItemRenderer
            ->setServiceContainer($this->getServiceContainer())
            ->setMetaModel($this->metamodel, $this->metamodel_rendersettings)
            ->setLimit(true, 0, 1)
            ->setPageBreak(1)
            ->setMetaTags($this->metamodel_meta_title, $this->metamodel_meta_description);

        // Add the id to the filter.
        if (!empty($this->metamodels_data_id)) {
            $objItemRenderer->addFilterRule(new StaticIdList(array($this->metamodels_data_id)));
        }

        // Add all to the template.
        $this->Template->searchable = !$this->metamodel_donotindex;
        $this->Template->item       = $objItemRenderer->render($this->metamodel_noparsing, $this);
    }
}
