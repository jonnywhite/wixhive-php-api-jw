<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/20/15
 * Time: 11:58 PM
 */
namespace Epicformbuilder\WixHiveApi\Commands\Contact;

use Epicformbuilder\WixHiveApi\Commands\Command;
use Epicformbuilder\WixHiveApi\ResponseProcessors\PagingContactsResult;

class GetContacts extends Command
{

    /** @var  string */
    protected $command = "/contacts";

    /** @var string */
    protected $httpMethod = "GET";

    /**
     * @param string $tag
     * @param string $cursor
     * @param string $pageSize
     */
    public function __construct($tag, $cursor, $pageSize){
        $this->getParams = array("tag" => $tag, "cursor" => $cursor, "pageSize" => $pageSize);
    }


    /**
     * @return PagingContactsResult
     */
    public function getResponseProcessor()
    {
        return new PagingContactsResult();

    }
}