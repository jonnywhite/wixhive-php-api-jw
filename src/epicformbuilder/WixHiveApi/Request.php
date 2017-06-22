<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/18/15
 * Time: 9:42 PM
 */
namespace Epicformbuilder\WixHiveApi;

class Request{

    /** @var  string */
    public $endpoint;

    /** @var  string */
    public $httpMethod;

    /** @var array  */
    public $headers =[];

    /** @var  string */
    public $body;

    /**
     * @param string $endpoint
     * @param string $httpMethod
     * @param array  $headers
     * @param string $body
     */
    public function __construct($endpoint="", $httpMethod="GET",  array $headers=[], $body = ""){
        $this->endpoint = $endpoint;
        $this->httpMethod = $httpMethod;
        $this->headers = $headers;
        $this->body = $body;
    }

}