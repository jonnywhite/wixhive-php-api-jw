<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/27/15
 * Time: 2:15 PM
 */
namespace Epicformbuilder\Wix\Models;

class ActivityTypes extends Model
{
    /** @var array */
    public $types;

    /**
     * @param array $types
     */
    public function __construct(array $types=null)
    {
        $this->types = $types;
    }

}