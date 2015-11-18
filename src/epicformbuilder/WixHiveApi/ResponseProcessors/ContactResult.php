<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/27/15
 * Time: 2:59 PM
 */
namespace Epicformbuilder\WixHiveApi\ResponseProcessors;

use Epicformbuilder\WixHiveApi\Response;
use Epicformbuilder\Wix\Models\ContactResult as ContactResultModel;

class ContactResult implements Processor
{
    /**
     * @param Response $response
     *
     * @return ContactResultModel
     */
    public function process(Response $response)
    {
        return new ContactResultModel($response->getResponseData()->contactId);
    }
}