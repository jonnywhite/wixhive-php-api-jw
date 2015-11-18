<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/25/15
 * Time: 9:27 PM
 */
namespace Epicformbuilder\WixHiveApi\Commands\Activity;

use Epicformbuilder\WixHiveApi\Commands\Command;
use Epicformbuilder\WixHiveApi\ResponseProcessors\ActivityTypes;

class GetActivityTypes extends Command
{
    /** @var  string */
    protected $command = "/activities/types";

    /** @var string */
    protected $httpMethod = "GET";

    public function __construct(){}

    /**
     * @return ActivityTypes
     */
    public function getResponseProcessor()
    {
        return new ActivityTypes();

    }

}