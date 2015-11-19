<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/29/15
 * Time: 1:51 PM
 */
namespace Epicformbuilder\WixHiveApi\Commands\Contact;

use Epicformbuilder\Wix\Models\Activity;
use Epicformbuilder\WixHiveApi\Commands\Command;
use Epicformbuilder\WixHiveApi\ResponseProcessors\ActivityResult;
use Epicformbuilder\WixHiveApi\ResponseProcessors\Processor;

class AddContactActivity extends Command
{
    /** @var  string */
    protected $command = "/contacts/{contactId}/activities";

    /** @var string */
    protected $httpMethod = "POST";

    /**
     * @param string   $contactId
     * @param Activity $activity
     **/
    public function __construct($contactId, Activity $activity)
    {
        $this->command = str_replace(array('{contactId}'), array($contactId,), $this->command);
        $this->requestBodyObject = $activity;
    }

    /**
     * @return Processor|ActivityResult
     */
    public function getResponseProcessor()
    {
        return new ActivityResult();
    }
}