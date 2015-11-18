<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/19/15
 * Time: 12:12 AM
 */
namespace Epicformbuilder\WixHiveApi;


use Epicformbuilder\WixHiveApi\Commands\Command;

class ResponseProcessor
{
    /**
     * @param Command  $command
     * @param Response $response
     *
     * @return mixed
     * @throws WixHiveException
     */
    public static function process(Command $command, Response $response)
    {

        if (isset($response->getResponseData()->errorCode)){
            $message = isset($response->getResponseData()->message) ? $response->getResponseData()->message : "No message";
            throw new WixHiveException($message, $response->getResponseData()->errorCode);
        }

        return $command->getResponseProcessor()->process($response);
    }
}

