<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/25/15
 * Time: 9:33 PM
 */
namespace Epicformbuilder\WixHiveApi\Commands\Activity;

use Epicformbuilder\WixHiveApi\Commands\Command;
use Epicformbuilder\WixHiveApi\ResponseProcessors\Activity;

class GetActivityById extends Command
{
    /** @var  string */
    protected $command = "/activities";

    /** @var string */
    protected $httpMethod = "GET";

    /**
     * @param string $id
     */
    public function __construct($id){
        $this->command.="/$id";
    }

    /**
     * @return Activity
     */
    public function getResponseProcessor()
    {
        return new Activity();

    }

}