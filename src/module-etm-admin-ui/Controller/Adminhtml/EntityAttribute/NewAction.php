<?php
/**
 * Do not edit or add to this file if you wish to upgrade Entity Type Manager to newer
 * versions in the future.
 *
 * @category  Ainnomix
 * @package   Ainnomix\EtmAdminUi
 * @author    Roman Tomchak <romantomchak@gmail.com>
 * @copyright 2021 Ainnomix
 * @license   Open Software License ("OSL") v. 3.0
 */

declare(strict_types=1);

namespace Ainnomix\EtmAdminUi\Controller\Adminhtml\EntityAttribute;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\Result\Forward;
use Magento\Framework\App\Action\HttpGetActionInterface;

class NewAction extends AbstractAction implements HttpGetActionInterface
{

    /**
     * Execute controller action
     *
     * @return Forward
     */
    public function execute(): Forward
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);
        return $resultPage->forward('edit');
    }
}
