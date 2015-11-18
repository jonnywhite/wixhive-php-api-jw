<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/29/15
 * Time: 12:13 PM
 */
namespace Epicformbuilder\Wix\Models;

class Picture extends Model
{

    /** @var string */
    public $picture;

    /**
     * @param string $picture
     */
    public function __construct($picture=null)
    {
        $this->picture= $picture;

    }

}