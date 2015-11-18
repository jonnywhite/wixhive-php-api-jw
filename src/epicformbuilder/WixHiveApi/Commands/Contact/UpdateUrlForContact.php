<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/29/15
 * Time: 12:03 PM
 */
namespace Epicformbuilder\WixHiveApi\Commands\Contact;

use Epicformbuilder\Wix\Models\Address;
use Epicformbuilder\Wix\Models\ContactUrl;
use Epicformbuilder\WixHiveApi\Commands\Command;
use Epicformbuilder\WixHiveApi\ResponseProcessors\Contact;
use Epicformbuilder\WixHiveApi\ResponseProcessors\Processor;
use Epicformbuilder\WixHiveApi\Signature;

class UpdateUrlForContact extends Command
{
    /** @var  string */
    protected $command = "/contacts/{contact_id}/url/{urlId}";

    /** @var string */
    protected $httpMethod = "PUT";

    /**
     * @param string      $contactId
     * @param string      $urlId
     * @param ContactUrl  $url
     * @param \DateTime   $modifiedAt
     */
    public function __construct($contactId, $urlId, ContactUrl $url, \DateTime $modifiedAt)
    {
        $this->command = str_replace(['{contact_id}', '{urlId}'], [$contactId, $urlId], $this->command);
        $this->getParams['modifiedAt'] = $modifiedAt->format(Signature::TIME_FORMAT);
        $this->requestBodyObject = $url;
    }

    /**
     * @return Processor|Contact
     */
    public function getResponseProcessor()
    {
        return new Contact();
    }
}