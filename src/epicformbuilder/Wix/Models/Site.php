<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/29/15
 * Time: 4:08 PM
 */
namespace Epicformbuilder\Wix\Models;

class Site extends Model{

    /** @var  string */
    public $url;

    /** @var  string */
    public $status;

    /**
     * @param string $url
     * @param string $status
     */
    public function __construct($url=null, $status=null){
        $this->url = $url;
        $this->status = $status;
    }

}