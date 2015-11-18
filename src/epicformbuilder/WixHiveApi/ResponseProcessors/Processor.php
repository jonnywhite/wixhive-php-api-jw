<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/27/15
 * Time: 1:07 PM
 */
namespace Epicformbuilder\WixHiveApi\ResponseProcessors;

use Epicformbuilder\WixHiveApi\Response;

interface Processor{

    public function process(Response $response);

}