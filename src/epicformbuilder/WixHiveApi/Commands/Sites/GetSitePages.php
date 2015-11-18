<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/29/15
 * Time: 4:04 PM
 */
namespace Epicformbuilder\WixHiveApi\Commands\Sites;

use Epicformbuilder\WixHiveApi\Commands\Command;
use Epicformbuilder\WixHiveApi\ResponseProcessors\Processor;
use Epicformbuilder\WixHiveApi\ResponseProcessors\Site;
use Epicformbuilder\WixHiveApi\ResponseProcessors\SitePages;

class GetSitePages extends Command
{
    /** @var  string */
    protected $command = "/sites/site/pages";

    /** @var string */
    protected $httpMethod = "GET";

    public function __construct()
    {
    }

    /**
     * @return Processor|Site
     */
    public function getResponseProcessor()
    {
        return new SitePages();
    }

}