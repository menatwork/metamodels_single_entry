<?php
/**
 * Created by PhpStorm.
 * User: stefan.heimes
 * Date: 02.06.2016
 * Time: 12:32
 */

namespace MetaModels\DCA;

use MetaModels\IItem;

class ContentSingle extends Content
{
    /**
     * Fetch all attribute names for the current MetaModel.
     *
     * @param \DC_Table $objDc The data container calling this method.
     *
     * @return string[] array of all attributes as colName => human name
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     * @SuppressWarnings(PHPMD.CamelCaseVariableName)
     */
    public function getDataRows(\DC_Table $objDc)
    {
        $return = array();

        $factory       = $this->getServiceContainer()->getFactory();
        $metaModelName = $factory->translateIdToMetaModelName($objDc->activeRecord->metamodel);
        $objMetaModel  = $factory->getMetaModel($metaModelName);
        
         // Check if we have a metamodels.
        if ($objMetaModel == null) {
            return $return;
        }

        $attributes = $this->getDatabase()
            ->prepare('SELECT * FROM tl_metamodel_attribute WHERE pid=? AND use_for_single_item = 1 ORDER BY sorting')
            ->execute($objMetaModel->get('id'));

        if ($objMetaModel) {
            $items = $objMetaModel->findByFilter($objMetaModel->getEmptyFilter());
            /** @var IItem $item */
            foreach ($items as $item) {
                $id     = $item->get('id');
                $titles = array();

                while ($attributes->next()) {
                    $parsedValue = $item->parseAttribute($attributes->colname, 'text');
                    $titles[]    = $parsedValue['text'];
                }

                if (empty($titles)) {
                    $titles[] = 'Datarow';
                }

                $return[$id] = sprintf('%s (ID:%s)', implode(' ', $titles), $id);
            }
        }

        return $return;
    }
}
