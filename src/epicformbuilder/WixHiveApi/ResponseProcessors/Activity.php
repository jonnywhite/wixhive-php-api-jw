<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/27/15
 * Time: 1:50 PM
 */
namespace Epicformbuilder\WixHiveApi\ResponseProcessors;

use Epicformbuilder\Wix\Models\ActivityDetails;
use Epicformbuilder\Wix\Models\Activity as ActivityModel;
use Epicformbuilder\WixHiveApi\Response;

class Activity implements Processor
{
    /**
     * @param Response $response
     *
     * @return ActivityModel
     */
    public function process(Response $response)
    {
        $activityModel = new ActivityModel(
            $response->getResponseData()->id,
            new \DateTime($response->getResponseData()->createdAt),
            $response->getResponseData()->activityType,
            $response->getResponseData()->activityInfo,
            $response->getResponseData()->activityLocationUrl,
            new ActivityDetails($response->getResponseData()->activityDetails->additionalInfoUrl, $response->getResponseData()->activityDetails->summary)
        );

        return $activityModel;
    }
}