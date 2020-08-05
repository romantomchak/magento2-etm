<?php
/*
 * Do not edit or add to this file if you wish to upgrade Entity Type Manager to newer
 * versions in the future.
 *
 * @category  Ainnomix
 * @package   Ainnomix\EtmCore
 * @author    Roman Tomchak <roman@ainnomix.com>
 * @copyright 2020 Ainnomix
 * @license   Open Software License ("OSL") v. 3.0
 */

declare(strict_types=1);

namespace Ainnomix\EtmCore\Model\EntityType\Command;

use Ainnomix\EtmCore\Api\Data\EntityTypeInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Get Entity Type by typeId command (Service Provider Interface - SPI)
 *
 * @category Ainnomix
 * @package  Ainnomix\EtmCore
 */
interface GetByIdInterface
{

    /**
     * Get Entity type by given entityTypeId
     *
     * @param int $entityTypeId
     *
     * @return EntityTypeInterface
     *
     * @throws NoSuchEntityException
     */
    public function execute(int $entityTypeId): EntityTypeInterface;
}
