<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/29/15
 * Time: 12:03 PM
 */
namespace Epicformbuilder\WixHiveApi\Commands\Contact;

use Epicformbuilder\Wix\Models\ContactPhone;
use Epicformbuilder\WixHiveApi\Commands\Command;
use Epicformbuilder\WixHiveApi\ResponseProcessors\Contact;
use Epicformbuilder\WixHiveApi\ResponseProcessors\Processor;
use Epicformbuilder\WixHiveApi\Signature;

class UpdatePhoneForContact extends Command
{
    /** @var  string */
    protected $command = "/contacts/{contactId}/phone/{phoneId}";

    /** @var string */
    protected $httpMethod = "PUT";

    /**
     * @param string    $contactId
     * @param string    $phoneId
     * @param ContactPhone   $phone
     * @param \DateTime $modifiedAt
     */
    public function __construct($contactId, $phoneId, ContactPhone $phone, \DateTime $modifiedAt)
    {
        $this->command = str_replace(['{contactId}', '{phoneId}'], [$contactId, $phoneId], $this->command);
        $this->getParams['modifiedAt'] = $modifiedAt->format(Signature::TIME_FORMAT);
        $this->requestBodyObject = $phone;
    }

    /**
     * @return Processor|Contact
     */
    public function getResponseProcessor()
    {
        return new Contact();
    }
}