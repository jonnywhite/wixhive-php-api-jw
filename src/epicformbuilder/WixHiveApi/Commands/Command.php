<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/20/15
 * Time: 4:58 PM
 */
namespace Epicformbuilder\WixHiveApi\Commands;

use Epicformbuilder\WixHiveApi\ResponseProcessors\Processor;

abstract class Command{

    const WIXHIVE_HTTP_SCHEME = "https";
    const WIXHIVE_HOST = "openapi.wix.com";
    const WIXHIVE_VERSION = "v1";

    /** @var  string */
    protected $command;

    /** @var  string */
    protected $httpMethod;

    /** @var  array */
    protected $httpHeaders = array();

    /** @var  mixed */
    protected $requestBodyObject;

    /** @var array  */
    protected $getParams=array();

    /**
     * @return string
     */
    public function getEndpointUrl(array $getParams = array()){
        $url = self::WIXHIVE_HTTP_SCHEME .'://'.self::WIXHIVE_HOST.'/'.self::WIXHIVE_VERSION . $this->command;

        $getParams = $this->getParams + $getParams;

        if (!empty($getParams)){
            $url .= "?".http_build_query($getParams);
        }

        return $url;
    }

    /**
     * @return string
     */
    public function getHttpMethod(){
        return $this->httpMethod;

    }

    /**
     * @return array
     */
    public function getHttpHeaders(){
        return $this->httpHeaders;
    }

    /**
     * @return string
     */
    public function getBody(){
        $this->utf8_encode_deep($this->requestBodyObject);
        return $this->requestBodyObject ?  json_encode($this->requestBodyObject) : "";
    }

    /**
     * @return string
     */
    public function getCommand(){
        return $this->command;
    }

    /**
     * @return Processor
     */
    abstract public function getResponseProcessor();

    private function utf8_encode_deep(&$input) {
        if (is_string($input)) {
            $input = utf8_encode($input);
        } else if (is_array($input)) {
            foreach ($input as &$value) {
                $this->utf8_encode_deep($value);
            }

            unset($value);
        } else if (is_object($input)) {
            $vars = array_keys(get_object_vars($input));

            foreach ($vars as $var) {
                $this->utf8_encode_deep($input->$var);
            }
        }
    }
}