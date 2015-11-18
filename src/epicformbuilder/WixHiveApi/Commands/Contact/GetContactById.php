<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/31/15
 * Time: 8:14 PM
 */
namespace Epicformbuilder\WixHiveApi\Commands\Contact;

use Epicformbuilder\WixHiveApi\Commands\Command;
use Epicformbuilder\WixHiveApi\ResponseProcessors\Contact;

class GetContactById extends Command
{
    /** @var  string */
    protected $command = "/contacts/{contactId}";

    /** @var string */
    protected $httpMethod = "GET";

    /**
     * @param $contactId
     */
    public function __construct($contactId){
        $this->command = str_replace(['{contactId}'], [$contactId], $this->command);
    }

    /**
     * @return Contact
     */
    public function getResponseProcessor()
    {
        return new Contact();

    }
}