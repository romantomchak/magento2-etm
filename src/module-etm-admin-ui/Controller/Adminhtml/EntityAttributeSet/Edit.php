<?php
/**
 * Do not edit or add to this file if you wish to upgrade Entity Type Manager to newer
 * versions in the future.
 *
 * @category  Ainnomix
 * @package   Ainnomix\EtmAdminUi
 * @author    Roman Tomchak <romantomchak@gmail.com>
 * @copyright 2020 Ainnomix
 * @license   Open Software License ("OSL") v. 3.0
 */

declare(strict_types=1);

namespace Ainnomix\EtmAdminUi\Controller\Adminhtml\EntityAttributeSet;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class Edit extends AbstractAction implements HttpGetActionInterface
{

    /**
     * Execute controller action
     *
     * @return ResultInterface
     *
     * @throws NoSuchEntityException
     */
    public function execute(): ResultInterface
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $entityType = $this->getEntityType();
        $attributeSet = $this->getAttributeSet();

        $currentMenu = $this->nameProvider->getAttributeSetsNodeId($entityType);
        $resultPage->setActiveMenu($currentMenu);

        $resultPage->getConfig()->getTitle()->prepend(
            __('Manage "%1" Attribute Sets', $entityType->getEntityTypeName())
        );
        $resultPage->getConfig()->getTitle()->prepend(
            $attributeSet->getAttributeSetId() ?
            __('Edit "%1" Attribute Set', $attributeSet->getAttributeSetName()) :
            __('New Attribute Set')
        );

        return $resultPage;
    }
}
