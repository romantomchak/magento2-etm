<?php
/**
 * Do not edit or add to this file if you wish to upgrade Entity Type Manager to newer
 * versions in the future.
 *
 * @category  Ainnomix
 * @package   Ainnomix\EtmCore
 * @author    Roman Tomchak <romantomchak@gmail.com>
 * @copyright 2019 Ainnomix
 * @license   Open Software License ("OSL") v. 3.0
 */

declare(strict_types=1);

namespace Ainnomix\EtmCore\Model\Entity\Type\Command;

use Ainnomix\EtmApi\Api\Data\EntityTypeInterfaceFactory;
use Ainnomix\EtmCore\Model\ResourceModel\Entity\Type as Resource;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;

/**
 * Delete Entity Type by typeId command
 *
 * @category Ainnomix
 * @package  Ainnomix\EtmCore
 */
class DeleteById implements DeleteByIdInterface
{

    /**
     * @var EntityTypeInterfaceFactory
     */
    protected $entityTypeFactory;

    /**
     * @var Resource
     */
    protected $entityTypeResource;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * DeleteById Command constructor
     *
     * @param EntityTypeInterfaceFactory $entityTypeFactory
     * @param Resource $entityTypeResource
     * @param LoggerInterface $logger
     */
    public function __construct(
        EntityTypeInterfaceFactory $entityTypeFactory,
        Resource $entityTypeResource,
        LoggerInterface $logger
    ) {
        $this->entityTypeFactory = $entityTypeFactory;
        $this->entityTypeResource = $entityTypeResource;
        $this->logger = $logger;
    }

    /**
     * {@inheritDoc}
     */
    public function execute(int $entityTypeId): void
    {
        $entityType = $this->entityTypeFactory->create();
        $this->entityTypeResource->load($entityType, $entityTypeId, 'entity_type_id');

        if (null === $entityType->getId()) {
            throw new NoSuchEntityException(
                __(
                    'There is no entity type with "%fieldValue" for "%fieldName". Verify and try again.',
                    [
                        'fieldName' => 'entity_type_id',
                        'fieldValue' => $entityTypeId
                    ]
                )
            );
        }

        try {
            $this->entityTypeResource->delete($entityType);
        } catch (\Exception $exception) {
            $this->logger->error($exception->getMessage());
            throw new CouldNotDeleteException(__('Could not delete Entity type'), $exception);
        }
    }
}