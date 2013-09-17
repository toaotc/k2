<?php

namespace Kimai\Bundle\CoreBundle\Doctrine;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;

/**
 * TablePrefixSubscriber
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 */
class TablePrefixSubscriber implements EventSubscriber
{
    /** @var string */
    private $prefix;

    /**
     * @param string $prefix
     */
    public function __construct($prefix)
    {
        $this->prefix = (string) $prefix;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubscribedEvents()
    {
        return array('loadClassMetadata');
    }

    /**
     * @param LoadClassMetadataEventArgs $args
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $args)
    {
        $classMetadata = $args->getClassMetadata();
        $classMetadata->setTableName($this->prefix . $classMetadata->getTableName());

        foreach ($classMetadata->getAssociationMappings() as $fieldName => $mapping) {
            if ($mapping['type'] == ClassMetadataInfo::MANY_TO_MANY
              && isset($classMetadata->associationMappings[$fieldName]['joinTable']['name'])) {
                $mappedTableName = $classMetadata->associationMappings[$fieldName]['joinTable']['name'];
                $classMetadata->associationMappings[$fieldName]['joinTable']['name'] = $this->prefix . $mappedTableName;
            }
        }
    }
}
