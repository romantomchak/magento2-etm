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

namespace Ainnomix\EtmCore\Model\EntityType\Validator;

use Zend_Validate_NotEmpty;
use Magento\Framework\Validation\ValidationResult;
use Magento\Framework\Validation\ValidationResultFactory;
use Ainnomix\EtmCore\Api\Data\EntityTypeInterface;
use Ainnomix\EtmCore\Model\EntityTypeValidatorInterface;

class NameValidator implements EntityTypeValidatorInterface
{

    /**
     * @var ValidationResultFactory
     */
    private $resultFactory;

    public function __construct(ValidationResultFactory $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }

    public function validate(EntityTypeInterface $entityType): ValidationResult
    {
        $errors = [];

        $notEmptyValidator = new Zend_Validate_NotEmpty();
        if (!$notEmptyValidator->isValid($entityType->getEntityTypeName())) {
            $errors[] = __('Entity type name value is required and can\'t be empty');
        }

        return $this->resultFactory->create(['errors' => $errors]);
    }
}
