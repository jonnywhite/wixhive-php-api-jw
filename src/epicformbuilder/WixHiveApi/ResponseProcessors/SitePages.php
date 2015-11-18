<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/29/15
 * Time: 4:06 PM
 */
namespace Epicformbuilder\WixHiveApi\ResponseProcessors;

use Epicformbuilder\Wix\Models\Page;
use Epicformbuilder\WixHiveApi\Response;
use Epicformbuilder\Wix\Models\SitePages as SitePagesModel;
use Epicformbuilder\Wix\Models\Site as SiteModel;

class SitePages implements Processor
{
    /**
     * @param Response $response
     *
     * @return SitePagesModel
     */
    public function process(Response $response)
    {
        $siteUrl = new SiteModel($response->getResponseData()->siteUrl->url, $response->getResponseData()->siteUrl->status);

        $pages = [];
        foreach($response->getResponseData()->pages as $page){
            $pages[] = new Page($page->path, $page->wixPageId, $page->appPageId);
        }

        return  new SitePagesModel($siteUrl, $pages);
    }
}