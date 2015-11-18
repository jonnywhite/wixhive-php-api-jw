<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/27/15
 * Time: 2:14 PM
 */
namespace Epicformbuilder\WixHiveApi\ResponseProcessors;

use Epicformbuilder\WixHiveApi\Response;
use Epicformbuilder\Wix\Models\ActivityTypes as ActivityTypesModel;

class ActivityTypes implements Processor
{
    /**
     * @param Response $response
     *
     * @return ActivityTypesModel
     */
    public function process(Response $response)
    {
        $types = (array)$response->getResponseData()->types;
        return new ActivityTypesModel($types);
    }
}