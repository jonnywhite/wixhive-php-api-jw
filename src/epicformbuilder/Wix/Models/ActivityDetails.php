<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/21/15
 * Time: 12:14 AM
 */
namespace Epicformbuilder\Wix\Models;

class ActivityDetails extends Model
{
    /** @var string - A url linking to more specific contextual information about the activity for use in the Dashboard, */
    public $additionalInfoUrl;

    /** @var string - A short description about the activity for use in the Dashboard */
    public $summary;

    /**
     * @param string $additionalInfoUrl
     * @param string $summary
     */
    public function __construct($additionalInfoUrl=null, $summary=null)
    {
        $this->additionalInfoUrl = $additionalInfoUrl;
        $this->summary = $summary;
    }

}
