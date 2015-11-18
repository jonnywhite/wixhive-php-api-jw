<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/21/15
 * Time: 12:18 AM
 */
namespace Epicformbuilder\WixHiveApi\Commands\Activity;

use Epicformbuilder\WixHiveApi\Commands\Command;
use Epicformbuilder\WixHiveApi\ResponseProcessors\ActivityResult;

class CreateActivity extends Command
{
    /** @var  string */
    protected $command = "/activities";

    /** @var string */
    protected $httpMethod = "POST";

    /**
     * @param \Epicformbuilder\Wix\Models\CreateActivity $createActivity
     */
    public function __construct( \Epicformbuilder\Wix\Models\CreateActivity $createActivity)
    {
        $this->requestBodyObject = $createActivity;
    }

    /**
     * @return ActivityResult
     */
    public function getResponseProcessor()
    {
        return new ActivityResult();

    }

}