<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/26/15
 * Time: 3:29 PM
 */
namespace Epicformbuilder\WixHiveApi\Commands\Contact;

use Epicformbuilder\WixHiveApi\Commands\Command;
use Epicformbuilder\Wix\Models\UpsertContact as UpsertContactModel;
use Epicformbuilder\WixHiveApi\ResponseProcessors\ContactResult;

class UpsertContact extends Command
{

    /** @var  string */
    protected $command = "/contacts";

    /** @var string */
    protected $httpMethod = "PUT";

    /**
     * @param UpsertContactModel $upsertContact
     */
    public function __construct(UpsertContactModel $upsertContact){
        $this->requestBodyObject = $upsertContact;
    }

    /**
     * @return ContactResult
     */
    public function getResponseProcessor()
    {
        return new ContactResult();
    }

}