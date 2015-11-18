<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/29/15
 * Time: 12:03 PM
 */
namespace Epicformbuilder\WixHiveApi\Commands\Contact;

use Epicformbuilder\Wix\Models\Address;
use Epicformbuilder\WixHiveApi\Commands\Command;
use Epicformbuilder\WixHiveApi\ResponseProcessors\Contact;
use Epicformbuilder\WixHiveApi\ResponseProcessors\Processor;
use Epicformbuilder\WixHiveApi\Signature;

class UpdateAddressForContact extends Command
{
    /** @var  string */
    protected $command = "/contacts/{contact_id}/address/{address_id}";

    /** @var string */
    protected $httpMethod = "PUT";

    /**
     * @param string    $contactId
     * @param string    $addressId
     * @param Address   $address
     * @param \DateTime $modifiedAt
     */
    public function __construct($contactId, $addressId, Address $address, \DateTime $modifiedAt)
    {
        $this->command = str_replace(['{contact_id}', '{address_id}'], [$contactId, $addressId], $this->command);
        $this->getParams['modifiedAt'] = $modifiedAt->format(Signature::TIME_FORMAT);
        $this->requestBodyObject = $address;
    }

    /**
     * @return Processor|Contact
     */
    public function getResponseProcessor()
    {
        return new Contact();
    }
}