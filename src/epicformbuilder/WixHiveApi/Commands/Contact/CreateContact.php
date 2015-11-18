<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/20/15
 * Time: 4:55 PM
 */
namespace Epicformbuilder\WixHiveApi\Commands\Contact;

use Epicformbuilder\WixHiveApi\Commands\Command;
use Epicformbuilder\WixHiveApi\ResponseProcessors\ContactResult;
use Epicformbuilder\Wix\Models\CreateContact as CreateContactModel;

class CreateContact extends Command
{
    /** @var  string */
    protected $command = "/contacts";

    /** @var string */
    protected $httpMethod = "POST";

    public function __construct(CreateContactModel $createContact){
        $this->requestBodyObject = $createContact;
    }

    /**
     * @return ContactResult
     */
    public function getResponseProcessor()
    {
        return new ContactResult();
    }
}