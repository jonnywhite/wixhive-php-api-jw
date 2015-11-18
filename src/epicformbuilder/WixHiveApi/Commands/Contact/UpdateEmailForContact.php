<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/29/15
 * Time: 12:03 PM
 */
namespace Epicformbuilder\WixHiveApi\Commands\Contact;

use Epicformbuilder\Wix\Models\Address;
use Epicformbuilder\Wix\Models\ContactEmail;
use Epicformbuilder\WixHiveApi\Commands\Command;
use Epicformbuilder\WixHiveApi\ResponseProcessors\Contact;
use Epicformbuilder\WixHiveApi\ResponseProcessors\Processor;
use Epicformbuilder\WixHiveApi\Signature;

class UpdateEmailForContact extends Command
{
    /** @var  string */
    protected $command = "/contacts/{contact_id}/email/{emailId}";

    /** @var string */
    protected $httpMethod = "PUT";

    /**
     * @param string       $contactId
     * @param string       $emailId
     * @param ContactEmail $email
     * @param \DateTime    $modifiedAt
     */
    public function __construct($contactId, $emailId, ContactEmail $email, \DateTime $modifiedAt)
    {
        $this->command = str_replace(['{contact_id}', '{emailId}'], [$contactId, $emailId], $this->command);
        $this->getParams['modifiedAt'] = $modifiedAt->format(Signature::TIME_FORMAT);
        $this->requestBodyObject = $email;
    }

    /**
     * @return Processor|Contact
     */
    public function getResponseProcessor()
    {
        return new Contact();
    }
}