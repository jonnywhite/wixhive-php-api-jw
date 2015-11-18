<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/29/15
 * Time: 4:08 PM
 */
namespace Epicformbuilder\Wix\Models;

class SitePages extends Model
{
    /** @var  Site */
    public $siteUrl;

    /** @var  array, item has Page type */
    public $pages;

    /**
     * @param Site  $siteUrl
     * @param array $pages
     */
    public function __construct(Site $siteUrl=null, array $pages=null)
    {
        $this->siteUrl = $siteUrl;
        $this->pages = $pages;
    }


}