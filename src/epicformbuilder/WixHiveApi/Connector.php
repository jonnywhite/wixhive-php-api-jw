<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/18/15
 * Time: 11:04 PM
 */
namespace Epicformbuilder\WixHiveApi;

class Connector{

    /**
     * @param Request $wixHiveRequest
     *
     * @return Response
     * @throws WixHiveException
     */
    public function execute(Request $wixHiveRequest){


        $resource = curl_init();
        curl_setopt($resource, CURLOPT_URL, $wixHiveRequest->endpoint );

        $this->setHttpMethod($resource, $wixHiveRequest);
        if ($this->isBodyRequired($wixHiveRequest->httpMethod)) {
            $this->setRequestBody($resource, $wixHiveRequest);
        }

        if (!empty($wixHiveRequest->headers)){
            $headers = array();
            foreach($wixHiveRequest->headers as $key => $value){
                $headers[] = "$key: $value";
            }
            curl_setopt($resource, CURLOPT_HTTPHEADER, $headers);

        }
        curl_setopt($resource, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($resource, CURLOPT_VERBOSE, 1);
        curl_setopt($resource, CURLOPT_HEADER, 0);

        $result = curl_exec($resource);
        $status = curl_getinfo($resource);
        curl_close($resource);

        //TODO process the case when there is no response from the service
        if (false === $result) {
        }

        //$response = http_parse_message($result);

        if (strpos($status['content_type'], "application/json") === false){
            throw new WixHiveException("Response content type is not supported", "415");
        }

        return new Response(json_decode($result));

    }

    private function setHttpMethod($resource, Request $wixHiveRequest) {
        switch ($wixHiveRequest->httpMethod) {
            case "POST":
                curl_setopt($resource, CURLOPT_POST, 1);
                break;
            case "PUT":
            case "DELETE":
                curl_setopt($resource, CURLOPT_CUSTOMREQUEST, $wixHiveRequest->httpMethod);
                break;
            case "GET":
            default:
                // nothing by default
        }
    }

    private function isBodyRequired($httpMethod) {
        return $httpMethod === "POST" || $httpMethod === "PUT";
    }

    private function setRequestBody($resource, Request $wixHiveRequest) {
        curl_setopt($resource, CURLOPT_POSTFIELDS, $wixHiveRequest->body);
    }



}