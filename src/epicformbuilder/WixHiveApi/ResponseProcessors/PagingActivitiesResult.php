<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/27/15
 * Time: 1:32 PM
 */
namespace Epicformbuilder\WixHiveApi\ResponseProcessors;

use Epicformbuilder\Wix\Models\Activity as ActivityModel;
use Epicformbuilder\Wix\Models\ActivityDetails;
use Epicformbuilder\WixHiveApi\Response;
use Epicformbuilder\Wix\Models\PagingActivitiesResult as PagingActivitiesResultModel;

class PagingActivitiesResult implements Processor
{
    /**
     * @param Response $response
     *
     * @return PagingActivitiesResultModel
     */
    public function process(Response $response)
    {
        $results = [];
        foreach($response->getResponseData()->results as $result){

            $activity = new ActivityModel(
                $result->id,
                new \DateTime($result->createdAt),
                $result->activityType,
                $result->activityInfo ,
                $result->activityLocationUrl,
                new ActivityDetails($result->activityDetails->additionalInfoUrl, $result->activityDetails->summary)
            );

            $results[] = $activity;
        }

        return new PagingActivitiesResultModel($response->getResponseData()->pageSize, $response->getResponseData()->previousCursor, $response->getResponseData()->nextCursor, $results);
    }
}