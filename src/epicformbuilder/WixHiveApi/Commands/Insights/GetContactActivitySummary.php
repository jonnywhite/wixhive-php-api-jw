<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/29/15
 * Time: 3:58 PM
 */
namespace Epicformbuilder\WixHiveApi\Commands\Insights;

use Epicformbuilder\Wix\Scope;
use Epicformbuilder\WixHiveApi\Commands\Command;
use Epicformbuilder\WixHiveApi\ResponseProcessors\ActivitySummary;
use Epicformbuilder\WixHiveApi\ResponseProcessors\Processor;
use Epicformbuilder\WixHiveApi\Signature;

class GetContactActivitySummary extends Command
{
    /** @var  string */
    protected $command = "/insights/contacts/{contactId}/activities/summary";

    /** @var string */
    protected $httpMethod = "GET";

    /**
     * @param string $scope, use Scope constants
     */
    public function __construct($contactId, $scope=Scope::SITE, \DateTime $form, \DateTime $until)
    {
        $this->command = str_replace(['{contactId}'], [$contactId], $this->command);

        $this->getParams['scope'] = $scope;
        $this->getParams['form'] = $form->format(Signature::TIME_FORMAT);
        $this->getParams['until'] = $until->format(Signature::TIME_FORMAT);
    }

    /**
     * @return Processor|ActivitySummary
     */
    public function getResponseProcessor()
    {
        return new ActivitySummary();
    }
}