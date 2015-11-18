<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/27/15
 * Time: 1:00 PM
 */
namespace Epicformbuilder\WixHiveApi\ResponseProcessors;

use Epicformbuilder\WixHiveApi\Response;
use Epicformbuilder\Wix\Models\ActivityResult as ActivityResultModel;

class ActivityResult implements Processor
{
    /**
     * @param Response $response
     *
     * @return ActivityResultModel
     */
    public function process(Response $response)
    {
        return new ActivityResultModel($response->getResponseData()->activityId, $response->getResponseData()->contactId);
    }
}