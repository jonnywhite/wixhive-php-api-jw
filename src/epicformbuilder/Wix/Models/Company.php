<?php
/**
 * User: EpicFormBuilder
 * Email: support@Epicformbuilder.com
 * Date: 3/18/15
 * Time: 9:13 PM
 */
namespace Epicformbuilder\Wix\Models;

class Company extends Model
{
    /** @var  string */
    public $role;

    /** @var  string */
    public $name;

    /**
     * @param string $role
     * @param string $name
     */
    public function __construct($role=null, $name=null)
    {
        $this->role = $role;
        $this->name = $name;
    }

}